@extends('backend.layout.master')

@push('backendCss')
    <link href="{{asset('public/backend')}}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
          rel="stylesheet" type="text/css">

@endpush

@section('contents')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Create Product</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    {{--    Form Starts--}}
    <form method="post">
        @csrf
        <div class="row">
{{--   General Information   --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Product General Information</h4>

                    </div>
                    <div class="card-body p-4">

                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Product Name *</label>
                                        <input class="form-control" type="text" name="product_name" placeholder="Product Name"
                                               id="product_name" value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="brand_id" class="form-label">Category *</label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option value="">Select category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Regular Price </label>
                                        <input class="form-control" type="text" name="product_name" placeholder="Product Name"
                                               id="product_name" value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Sale Price *</label>
                                        <input class="form-control" type="text" name="product_name" placeholder="Product Name"
                                               id="product_name" value="">
                                    </div>
                                   
                                    
                                    


                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mt-3 mt-lg-0">

                                    <div class="mb-3">
                                        <label for="brand_id" class="form-label">Brand *</label>
                                        <select class="form-control" name="brand_id" id="brand_id">
                                            <option value="">Select Brand</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                   
                                  

                                    <div class="mb-3">
                                        <label for="brand_id" class="form-label">Subcategory *</label>
                                        <select class="form-control" name="brand_id" id="brand_id">
                                            <option value="">Select Subcategory</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Quantity *</label>
                                        <input class="form-control" type="number" name="product_name" min="0" placeholder="Product Name"
                                               id="product_name" value="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Discount Percent (%)</label>
                                        <input class="form-control" type="number" name="product_name" min="0" placeholder="Product Name"
                                               id="product_name" value="">
                                    </div>
                                    
                                

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
{{--    Product Descriotion    --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Product Description</h4>

                    </div>


                    <div class="card-body p-4">

                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="short_description" class="form-label">Short Description</label>
                                <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="5"></textarea>
                            </div>
                            
                            <div class="col-lg-12 mb-3">
                                <label for="short_description" class="form-label">Long Description</label>
                                <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="10"></textarea>
                            </div>

                           
                        </div>
                        
                    </div>

                </div>
            </div> <!-- end col -->
        </div>
        
{{--     Product Images   --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
{{--                        <h4 class="card-title text-center">Product Images and Videos</h4>--}}
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span class="h4 card-title text-center">Product Images and Videos</span>
                        </button>

                    </div>


                    <div class="card-body p-4 accordion-collapse collapse" id="collapseTwo">

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="short_description" class="form-label">Image 1</label>
                              <input oninput="newImg1.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" name="productImg_1" id="productImg_1">
                                <img class="mt-2" id="newImg1" src="{{asset('public/backend/assets/images/placeholder.jpg')}}"  height="200px">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="short_description" class="form-label">Image 2</label>
                                <input oninput="newImg2.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" name="productImg_2" id="productImg_1">
                                <img class="mt-2" id="newImg2" src="{{asset('public/backend/assets/images/placeholder.jpg')}}"  height="200px">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="short_description" class="form-label">Image 3</label>
                                <input oninput="newImg3.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" name="productImg_3" id="productImg_1">
                                <img class="mt-2" id="newImg3" src="{{asset('public/backend/assets/images/placeholder.jpg')}}"  height="200px">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="short_description" class="form-label">Image 4</label>
                                <input oninput="newImg4.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" name="productImg_4" id="productImg_1">
                                <img class="mt-2" id="newImg4" src="{{asset('public/backend/assets/images/placeholder.jpg')}}"  height="200px">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="short_description" class="form-label">Embed Video Link</label>
                                <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="2"></textarea>
                            </div>
                            


                        </div>
                    </div>

                </div>
            </div> <!-- end col -->
        </div>
{{--    Product Variant    --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Product Variant</h4>

                    </div>


                    <div class="card-body p-4">

                        <div class="row">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <label for="productTable" class="form-label p-1">Product Weight</label>
                                <table id="productTable" style="width: 100% !important;" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Weight</th>
                                        <th>Regular Price</th>
                                        <th>Discount</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            <select id="productID" class="form-control" style="width: 100%;">
                                                <option value="">Select Weight</option>
                                            </select>
                                        </td>
                                    </tr>
                                    </tfoot>

                                </table>
                                </div>
                            </div>



                        </div>
                       
                    </div>

                </div>
            </div> <!-- end col -->
        </div>
{{--     Meta Information   --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Meta Information</h4>

                    </div>


                    <div class="card-body p-4">

                        <div class="row">
                            <div class="card-body">
                                <div class="col-lg-12 mb-3">
                                    <label for="meta_title" class="form-label">Meta Title</label>
                                    <textarea class="form-control" name="meta_title" id="meta_title" cols="30" rows="2"></textarea>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="meta_title" class="form-label">Meta Key</label>
                                    <textarea class="form-control" name="meta_title" id="meta_title" cols="30" rows="2"></textarea>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description" cols="30" rows="2"></textarea>
                                </div>
                            </div>



                        </div>
                        
                        <div class="text-center mt-4 d-grid">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </div>
            </div> <!-- end col -->
        </div>
    </form>
@endsection

@push('backendJs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        
        
    </script>
    
@endpush