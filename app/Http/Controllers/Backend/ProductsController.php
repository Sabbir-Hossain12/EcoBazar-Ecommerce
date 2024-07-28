<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attrvalue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Size;
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
        $uniq = rand(10000000, 99999999);
        $productSku = 'EB'.'-'.$uniq;
        return $productSku;
    }

    public function getData()
    {
        $products = Product::with('productDetail', 'weights')->get();

        return DataTables::of($products)
            ->addColumn('productImage', function ($product) {
                return '<img class="img-fluid img-thumbnail rounded" src="'.asset($product->productDetail->productThumbnail_img).'" width="65px" alt=""/>';
            })
           
            ->addColumn('available_qty', function ($product) {
                return $product->productDetail->available_qty;
            })

            ->addColumn('sold_qty', function ($product) {
                return $product->productDetail->sold_qty;
            })


            ->addColumn('sku', function ($product) {
                return $product->productDetail->SKU;
            })
            
            ->addColumn('isPopular', function ($product) {
                if ($product->isPopular == 1) {
                    return '<a class="status" id="popularStatus" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="1"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="popularStatus" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="0"> <i
                          class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('isHot', function ($product) {
                if ($product->isHot == 1) {
                    return '<a class="status" id="hotStatus" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="1"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="hotStatus" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="0"> <i
                          class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('isFeatured', function ($product) {
                if ($product->isFeatured == 1) {
                    return '<a class="status" id="featuredStatus" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="1"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="featuredStatus" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="0"> <i
                          class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('status', function ($product) {
                if ($product->status == 1) {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="'.$product->status.'"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="'.$product->status.'"> <i
                          class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('action', function ($product) {
                return '<div class="d-flex gap-2"> <a class="editButton btn btn-sm btn-primary" href="javascript:void(0)" data-id="'.$product->id.'" data-bs-toggle="modal" data-bs-target="#editProductModal"><i class="fas fa-edit"></i></a>

                                                             <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$product->id.'" id="deleteProductBtn"> <i class="fas fa-trash"></i></a>
                                                           </div>';
            })
            ->rawColumns(['action', 'productImage', 'isPopular', 'isHot', 'isFeatured', 'status', 'productImage'])
            ->addIndexColumn()
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
        $tags = Attrvalue::where('attribute_name', 'Tag')->get();

        return view('backend.pages.products.create', compact('brands', 'categories', 'subcategories', 'tags'));
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

            if ($request->has('tag')) {
                foreach ($request->tag as $tag) {
                    $tagArray[] = $tag;
                }

                $products->tag = json_encode($tagArray);
            }

            $products->save();

            $sku = $this->generateSKU();

            $productDetails = new ProductDetail();
            $productDetails->product_id = $products->id;
            $productDetails->SKU = $sku;
            $productDetails->long_desc = $request->long_desc;
            $productDetails->youtube_embed_link = $request->youtube_embed_link;

            $productDetails->meta_title = $request->meta_title;
            $productDetails->meta_key = $request->meta_key;
            $productDetails->meta_desc = $request->meta_desc;

            $productDetails->initial_stock = $request->initial_stock;
            $productDetails->total_qty = $request->initial_stock;
            $productDetails->available_qty = $request->initial_stock;


//            $imageFields = ['productImg_1', 'productImg_2', 'productImg_3'];


            $manager = new ImageManager(new Driver());

//              Store Product Thumbnail Image
            if ($request->hasFile('productThumbnail_img')) {
                $imgs = $manager->read($request->productThumbnail_img);
                $encoded = $imgs->toWebp(80);
                $encodedFilename = $request->product_name.time().'.webp';
                $encoded->save(public_path('backend/assets/images/uploads/products').'/'.$encodedFilename);
                $productDetails->productThumbnail_img = 'public/backend/assets/images/uploads/products/'.$encodedFilename;
            }

//              Store Slider Images
            if ($request->hasFile('product_img')) {
                foreach ($request->file('product_img') as $productImg) {
                    $sliderImgs = $manager->read($productImg);
                    $encodedSlider = $sliderImgs->toWebp(80);
                    $encodedSliderFilename = uniqid().$request->product_name.'-'.time().'.webp';
                    $encodedSlider->save(public_path('backend/assets/images/uploads/products').'/'.$encodedSliderFilename);
//                           $productImgPath = 'public/backend/assets/images/uploads/products/'.$encodedFilename;

                    $imageArray[] = $encodedSliderFilename;
                }
                $productDetails->product_img = json_encode($imageArray);
            }


            $productDetails->save();

            // Weight Variant if Exist
            $weightProducts = json_decode($request->weightProduct, true);

            // Loop through each product and save to the database
            if ($weightProducts) {
                foreach ($weightProducts as $weightProduct) {
                    $weight = new Weight();
                    $weight->attrvalue_id = $weightProduct['attrValueId'];
                    $weight->product_id = $products->id;
                    $weight->weight_title = $weightProduct['productWeight'];
                    $weight->productRegularPrice = $weightProduct['productRegularPrice'];
                    $weight->discount_percentage = $weightProduct['productDiscount'];
                    $weight->productSalePrice = $weightProduct['productRegularPrice'] - ($weightProduct['productRegularPrice'] * $weightProduct['productDiscount'] / 100);
                    $weight->save();
                }
            }
            
            
                //Color Variant if Exist
            $colorProducts = json_decode($request->colorProduct, true);

            if ($colorProducts) {
                foreach ($colorProducts as $colorProduct) {
                    $color = new Color();
                    $color->attrvalue_id = $colorProduct['attrValueId'];
                    $color->product_id = $products->id;
                    $color->color_title = $colorProduct['productColor'];
                    $color->productRegularPrice = $colorProduct['productRegularPrice'];
                    $color->discount_percentage = $colorProduct['productDiscount'];
                    $color->productSalePrice = $colorProduct['productRegularPrice'] - ($colorProduct['productRegularPrice'] * $colorProduct['productDiscount'] / 100);
                    $color->save();
                }
            }
            
            //Size Variant if Exist
            $sizeProducts = json_decode($request->sizeProduct, true);
            

            if ($sizeProducts) {
                foreach ($sizeProducts as $sizeProduct) {
                    $size = new Size();
                    $size->attrvalue_id = $sizeProduct['attrValueId'];
                    $size->product_id = $products->id;
                    $size->size_title = $sizeProduct['productSize'];
                    $size->productRegularPrice = $sizeProduct['productRegularPrice'];
                    $size->discount_percentage = $sizeProduct['productDiscount'];
                    $size->productSalePrice = $sizeProduct['productRegularPrice'] - ($sizeProduct['productRegularPrice'] * $sizeProduct['productDiscount'] / 100);
                    $size->save();
                }
            }

            DB::commit();

            return response()->json(['message' => 'success'], 201);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'failed', 'error' => $e->getMessage()], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public
    function show(
        Product $products
    ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(
        Product $product
    ) {
        return view('backend.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
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
    public function destroy(Product $product)
    {
        $product_details = ProductDetail::where('product_id', $product->id)->first();
        if (file_exists($product_details->productThumbnail_img)) {
            unlink($product_details->productThumbnail_img);
        }

        
        
        $sliderImg=json_decode($product_details->product_img);
            foreach ($sliderImg as $img) {
                if (file_exists($img)) {
                    unlink($img);
                }
            }

            $product_details->delete();

            Weight::where('product_id', $product->id)->delete();

            $result = $product->delete();


            return response()->json(['message' => 'success'], 200);
        
    }


    public function weightVariantInfo()
    {
        $weights = Attrvalue::where('attribute_name', 'Weight')->where('status', 1)->get(['id', 'value as text']);

        return response()->json($weights);
    }

    public function colorVariantInfo()
    {
        $colors = Attrvalue::where('attribute_name', 'Color')->where('status', 1)->get(['id', 'value as text']);

        return response()->json($colors);
    }

    public function sizeVariantInfo()
    {
        $sizes = Attrvalue::where('attribute_name', 'Size')->where('status', 1)->get(['id', 'value as text']);

        return response()->json($sizes);
    }


    public function statusUpdate(Request $request)
    {
        $id = $request->id;
        $status = $request->status;


        if ($status == 1) {
            $stat = 0;
        } else {
            $stat = 1;
        }

        $product = Product::findOrFail($id);
        $product->status = $stat;
        $product->save();

        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
    }

    public function featuredStatusUpdate(Request $request)
    {
        $id = $request->id;
        $status = $request->featuredStatus;


        if ($status == 1) {
            $stat = 0;
        } else {
            $stat = 1;
        }

        $product = Product::findOrFail($id);
        $product->isFeatured = $stat;
        $product->save();

        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
    }

    public function hotStatusUpdate(Request $request)
    {
        $id = $request->id;
        $status = $request->hotStatus;


        if ($status == 1) {
            $stat = 0;
        } else {
            $stat = 1;
        }

        $product = Product::findOrFail($id);
        $product->isHot = $stat;
        $product->save();

        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
    }

    public function popularStatusUpdate(Request $request)
    {
        $id = $request->id;
        $status = $request->popularStatus;


        if ($status == 1) {
            $stat = 0;
        } else {
            $stat = 1;
        }

        $product = Product::findOrFail($id);
        $product->isPopular = $stat;
        $product->save();
        
        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
    }
}
