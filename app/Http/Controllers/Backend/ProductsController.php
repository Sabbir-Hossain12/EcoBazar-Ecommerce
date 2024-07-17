<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Subcategory;
use App\Models\Weight;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Yajra\DataTables\DataTables;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.products.index');
    }
    
    public function generateSKU()
    {
        $uniq= rand(10000000, 99999999);
        $productSku= 'EB'.'-'.$uniq;
        return $productSku;
    }

    public function getData()
    {
        $products=Product::with('productDetail')->get();
        
        return DataTables::of($products)
            ->addColumn('productImage', function ($product) {
                return '<img class="img-fluid img-thumbnail rounded" src="'.asset($product->productDetail->productImg_1).'" width="80px" alt=""/>';
            })
            
            ->addColumn('sale_price', function ($product) {
                return $product->productDetail->sale_price;
            })
            ->addColumn('available_qty', function ($product) {
                return $product->productDetail->available_qty;
            })
            ->addColumn('isPopular', function ($product) {
                if ($product->productDetail->is_popular == 1) {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="'.$product->status.'"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="'.$product->status.'"> <i
                          class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('isHot', function ($product) {
                if ($product->productDetail->isHot == 1) {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="'.$product->status.'"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="'.$product->status.'"> <i
                          class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('isFeatured', function ($product) {
                if ($product->productDetail->isFeatured == 1) {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="'.$product->status.'"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="'.$product->status.'"> <i
                          class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            
            ->addColumn('status', function ($product) {
                if ($product->status == 1) {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="'.$product->status.'"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="'.$product->status.'"> <i
                          class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('action', function ($product) {
                return '<div class="d-flex gap-2"> <a class="editButton btn btn-sm btn-primary" href="javascript:void(0)" data-id="'.$product->id.'" data-bs-toggle="modal" data-bs-target="#editBannerModal"><i class="fas fa-edit"></i></a>

                                                             <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$product->id.'" id="deleteBannerBtn"> <i class="fas fa-trash"></i></a>
                                                           </div>';

            })
            ->rawColumns(['action','productImage','isPopular','isHot','isFeatured', 'status', 'productImage'])
            ->make(true);
           
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $subcategories = Subcategory::where('category_id', request('category_id'))->where('status', 1)->get();

        return view('backend.pages.products.create', compact('brands', 'categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $products = new Product();
            $products->category_id = $request->category_id;
            $products->subcategory_id = $request->subcategory_id;
            $products->brand_id = $request->brand_id;
            $products->product_name = $request->product_name;
            $products->slug = Str::slug($request->product_name);
            $products->color = $request->color;
            $products->size = $request->size;
            $products->weight = $request->weight;
            $products->short_desc = $request->short_desc;
            

            $products->save();

            $sku= $this->generateSKU();

            $productDetails = new ProductDetail();
            $productDetails->product_id = $products->id;
            $productDetails->SKU = $sku;
            $productDetails->regular_price = $request->regular_price;
            $productDetails->sale_price = $request->sale_price;
            $productDetails->discount = $request->discount;
            $productDetails->long_desc = $request->long_desc;
            $productDetails->youtube_embed_link = $request->youtube_embed_link;
            
            $productDetails->meta_title = $request->meta_title;
            $productDetails->meta_key = $request->meta_key;
            $productDetails->meta_desc = $request->meta_desc;
            
            $productDetails->initial_stock = $request->initial_stock;
            $productDetails->total_qty = $request->initial_stock;
            $productDetails->available_qty = $request->initial_stock;
          

            $imageFields = ['productImg_1', 'productImg_2', 'productImg_3'];
            
            
            $manager = new ImageManager(new Driver());
            foreach ($imageFields as $imageField) {
                if ($request->hasFile($imageField)) {
                    $imgs = $manager->read($request->$imageField);
                    $encoded = $imgs->toWebp(80);
                    $encodedFilename = time().'.webp';
                    $encoded->save(public_path('backend/assets/images/uploads/products').'/'.$encodedFilename);
                    $productDetails->$imageField = 'public/backend/assets/images/uploads/products/'.$encodedFilename;
                }
            }

            $productDetails->save();
            
//         weight Tables
            
            $weight = new Weight();
            $weight->product_id = $products->id;
            $weight->weight = $request->weight;
            $weight->save();

            DB::commit();

            return response()->json(['message' => 'success'], 201);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'failed','error' => $e->getMessage()], 500);
        }
    }



/**
 * Display the specified resource.
 */
public
function show(Product $products)
{
    //
}

/**
 * Show the form for editing the specified resource.
 */
public
function edit(Product $product)
{
    return view('backend.pages.products.edit', compact('product'));
}

/**
 * Update the specified resource in storage.
 */
public
function update(Request $request, Product $product)
{
    $product->category_id = $request->category_id;
    $product->subcategory_id = $request->subcategory_id;
    $product->brand_id = $request->brand_id;
    $product->product_name = $request->product_name;
    $product->slug = Str::slug($request->product_name);
    $product->color = $request->color;
    $product->size = $request->size;
    $product->weight = $request->weight;
    $product->short_desc = $request->short_desc;

    $result = $product->save();


    if ($result) {
        $productDetails = ProductDetail::findOrFail('product_id', $product->id);
        $productDetails->SKU = $request->SKU;
        $productDetails->regular_price = $request->regular_price;
        $productDetails->sale_price = $request->sale_price;
        $productDetails->discount = $request->discount;
        $productDetails->long_desc = $request->long_desc;
        $productDetails->youtube_embed_link = $request->youtube_embed_link;
        $productDetails->meta_title = $request->meta_title;
        $productDetails->meta_key = $request->meta_key;
        $productDetails->meta_desc = $request->meta_desc;
        $productDetails->total_qty = $request->total_qty;
        $productDetails->available_qty = $request->available_qty;
        $productDetails->sold_qty = $request->sold_qty;

        if ($request->hasFile('productImg_1')) {
            $manager = new ImageManager(new Driver());
            $imgs = $manager->read($request->productImg_1);
            $encoded = $imgs->toWebp(80);
            $encodedFilename = time().'.webp';
            $encoded->save(public_path('backend/assets/images/uploads/products').'/'.$encodedFilename);
            $productDetails->productImg_1 = 'public/backend/assets/images/uploads/products/'.$encodedFilename;
        }
        if ($request->hasFile('productImg_2')) {
            $manager = new ImageManager(new Driver());
            $imgs = $manager->read($request->productImg_2);
            $encoded = $imgs->toWebp(80);
            $encodedFilename = time().'.webp';
            $encoded->save(public_path('backend/assets/images/uploads/products').'/'.$encodedFilename);
            $productDetails->productImg_2 = 'public/backend/assets/images/uploads/products/'.$encodedFilename;
        }
        if ($request->hasFile('productImg_3')) {
            $manager = new ImageManager(new Driver());
            $imgs = $manager->read($request->productImg_3);
            $encoded = $imgs->toWebp(80);
            $encodedFilename = time().'.webp';
            $encoded->save(public_path('backend/assets/images/uploads/products').'/'.$encodedFilename);
            $productDetails->productImg_3 = 'public/backend/assets/images/uploads/products/'.$encodedFilename;
        }
        $productDetails->save();

        return response()->json(['message' => 'success'], 201);
    }
}

/**
 * Remove the specified resource from storage.
 */
public
function destroy(Product $products)
{
    //
}
}
