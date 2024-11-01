@extends('backend.layout.master')

@push('backendCss')
    <link href="{{asset('public/backend')}}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
          rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{asset('public/backend/assets/js/select2/select2.min.css')}}">

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
    <form enctype="multipart/form-data" name="form" id="createProduct">
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
                                        <select class="form-control" name="category_id" id="category_id" onchange="setSubCategories()">
                                            <option value="">Select category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Quantity *</label>
                                        <input class="form-control" type="number" name="initial_stock" min="0" placeholder="Product Name"
                                               id="initial_stock" value="">
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
                                        <label for="subcategory_id" class="form-label">Subcategory *</label>
                                        <select class="form-control" name="subcategory_id" id="subcategory_id">
                                            
                                          
                                        </select>
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
                                <textarea class="form-control" name="short_desc" id="short_desc"  rows="3"></textarea>
                            </div>
                            
                            <div class="col-lg-12 mb-3">
                                <label for="long_desc" class="form-label">Long Description</label>
                                <textarea class="form-control" id="longDesc" rows="5"></textarea>
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


                    <div class="card-body  accordion-collapse collapse" id="collapseTwo">

                        <div class="row">
                            <div class="col-lg-8 mb-3">
                                <label for="short_description" class="form-label">Product Thumbnail Image</label>
                              <input oninput="newImg1.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" name="productThumbnail_img" id="productThumbnail_img">
                                <img class="mt-2" id="newImg1" src="{{asset('public/backend/assets/images/placeholder.jpg')}}"  height="160px">
                            </div>

                            <div class="col-lg-8 mb-3">
                                <label for="product_img" class="form-label">Product Slider Images</label>
                                <input  type="file" class="form-control" name="product_img[]" id="product_img" multiple>
                                <div id="imagePreviewContainer" class="mt-2"></div>
                            </div>
                            </div>
                            

                            <div class="col-lg-12 mb-3">
                                <label for="youtube_embed_link" class="form-label">Embed Video Link</label>
                                <textarea class="form-control" name="youtube_embed_link" id="youtube_embed_link" cols="30" rows="2"></textarea>
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
                        {{-- Weight --}}
                        <div class="row border border-light">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <label for="productTable" class="form-label p-1 ">Product Weight</label>
                                <table id="weightVariantTable" style="width: 100% !important;" class="table table-bordered table-striped">
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
                                            <select id="weightVariantList" class="form-control" style="width: 100%;">
                                                
                                            </select>
                                        </td>
                                    </tr>
                                    </tfoot>

                                </table>
                                </div>
                            </div>

                        </div>
                        {{--Color--}}
                        <div class="row border border-light mt-4">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <label for="productTable" class="form-label p-1">Product Color</label>
                                    <table id="colorVariantTable" style="width: 100% !important;" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Color</th>
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
                                                <select id="colorVariantList" class="form-control" style="width: 100%;">
                                                    
                                                </select>
                                            </td>
                                        </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>



                        </div>
                        
                        {{-- Size --}}
                        <div class="row border border-light mt-4">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <label for="productTable" class="form-label p-1">Product Size</label>
                                    <table id="sizeVariantTable" style="width: 100% !important;" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Size</th>
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
                                                <select id="sizeVariantList" class="form-control" style="width: 100%;">
                                                   
                                                </select>
                                            </td>
                                        </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>



                        </div>
{{--  Tags--}}
                        <div class="row border border-light mt-4">
                            <div class="card-body">
                                <label for="productTable" class="form-label p-1">Tags</label>
                                <div class="col-lg-12">
                                    @foreach($tags as $tag)
                                            <input class="" type="checkbox" name="tag[]" id="tag" value="{{$tag->value}}">
                                            {{$tag->value}}
                                    @endforeach
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
                                    <label for="meta_key" class="form-label">Meta Key</label>
                                    <textarea class="form-control" name="meta_key" id="meta_key" cols="30" rows="2"></textarea>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="meta_desc" class="form-label">Meta Description</label>
                                    <textarea class="form-control" name="meta_desc" id="meta_desc" cols="30" rows="2"></textarea>
                                </div>
                            </div>



                        </div>
                        
                        <div class="text-center mt-4 d-grid">
                            <button id="productSubmit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </div>
            </div> <!-- end col -->
        </div>
    </form>
@endsection

@push('backendJs')
    <script src="{{asset('https://cdn.jsdelivr.net/npm/sweetalert2@11')}}"></script>
    <script src="{{asset('https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js')}}"></script>
    <script src="{{asset('public/backend/assets/js/select2/select2.min.js')}}"></script>



    <script>
           
            $(document).ready(function() {

                // $('#sizeVariantList').select2(); 
                // $('#weightVariantList').select2(); 
                // $('#colorVariantList').select2(); 
                
                //Store Products
                $('#createProduct').submit(function(e)
                {
                    e.preventDefault();
                    let long_desc= jReq.getData();
                    // Weight variants store
                    var wProduct = [];
                    var wProductCount = 0 ;
                    $("#weightVariantTable tbody tr").each(function (index, value) {
                        var currentRow = $(this);
                        var obj = {};
                        obj.attrValueId = currentRow.find(".attrValueId").text();
                        obj.productWeight = currentRow.find(".productWeight").text();
                        obj.productRegularPrice = currentRow.find(".productRegularPrice").val();
                        obj.productDiscount = currentRow.find(".productDiscount").val();
                        wProduct.push(obj);
                        wProductCount++;
                    });
                    
                    //Size variants store
                    var sProduct = [];
                    var sProductCount = 0 ;
                    $("#sizeVariantTable tbody tr").each(function (index, value) {
                        var currentRow = $(this);
                        var obj = {};
                        obj.attrValueId = currentRow.find(".attrValueId").text();
                        obj.productSize = currentRow.find(".productSize").text();
                        obj.productRegularPrice = currentRow.find(".productRegularPrice").val();
                        obj.productDiscount = currentRow.find(".productDiscount").val();
                        sProduct.push(obj);
                        sProductCount++;
                    });
                    
                    //Color Variant Store
                    var cProduct = [];
                    var cProductCount = 0 ;
                    $("#colorVariantTable tbody tr").each(function (index, value) {
                        var currentRow = $(this);
                        var obj = {};
                        obj.attrValueId = currentRow.find(".attrValueId").text();
                        obj.productColor = currentRow.find(".productColor").text();
                        obj.productRegularPrice = currentRow.find(".productRegularPrice").val();
                        obj.productDiscount = currentRow.find(".productDiscount").val();
                        cProduct.push(obj);
                        cProductCount++;
                    });

                    // console.log(wProduct);
                    // console.log(cProduct);
                    // console.log(sProduct);
                    
                   
                    var formData = new FormData(this);
                    formData.append('long_desc', long_desc);
                    // Appending Weight variant data
                    formData.append('weightProduct', JSON.stringify(wProduct)); 
                    // Appending Color variant data
                    formData.append('colorProduct', JSON.stringify(cProduct)); 
                    // Appending Size variant data
                    formData.append('sizeProduct', JSON.stringify(sProduct));
                    
                    if ( $('#weightVariantList').val() == null && $('#sizeVariantList').val() == null && $('#colorVariantList').val() == null) {
                        
                        swal.fire({
                            title: "Failed",
                            text: "At least One Variant is Needed" ,
                            icon: "error"
                        })
                    }
                    else {


                        $.ajax(
                            {
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: "{{route('admin.product.store')}}",
                                data: formData,
                                processData: false,  // Prevent jQuery from processing the data
                                contentType: false,  // Prevent jQuery from setting contentType

                                success: function (res) {
                                    if (res.message === 'success') {
                                        // $('#createAdminModal').modal('hide');
                                        $('#createProduct')[0].reset();

                                        swal.fire({
                                            title: "Success",
                                            text: "Product Created !",
                                            icon: "success"
                                        })


                                    }
                                },
                                error: function (e) {
                                    swal.fire({
                                        title: "Failed",
                                        text: "Something Went Wrong !",
                                        icon: "error"
                                    })
                                }
                            }
                        )
                    }

                })
                
                
            //  CKEditor on Products Desctription
                let jReq;
                ClassicEditor
                    .create(document.querySelector('#longDesc'),{
                        
                        ckfinder:
                            {
                                uploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",
                            }
                        
                        
                    })
                    .then(newEditor => {
                        jReq = newEditor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
                
            // Show  Slider Images 
            $('#product_img').on('change', function(event) {
                var imagePreviewContainer = $('#imagePreviewContainer');
                imagePreviewContainer.empty(); // Clear existing images

                $.each(event.target.files, function(index, file) {
                    var imgElement = $('<img>', {
                        src: URL.createObjectURL(file),
                        height: 200,
                        class: 'mx-2 mt-2' // Add some margin for better layout
                    });
                    imagePreviewContainer.append(imgElement);
                });
            });
            
        
        });
            
         


                //   Show/Set Subcategory
                function setSubCategories() {
                    var cat_id = $('#category_id').val();
                    $.ajax({
                        type: 'GET',
                        url: '{{url('/admin/get-subcategory')}}/' + cat_id,

                        success: function(data) {
                            $('#subcategory_id').html('');

                            for (var i = 0; i < data.data.length; i++) {
                                $('#subcategory_id').append(`
                            <option value="` + data.data[i].id + `" >` + data.data[i].subcategory_name + `</option>
                        `)
                            }
                        },
                        error: function(error) {
                            console.log('error');
                        }
                    });
                }
                
                
            //  Weight Select 2 trigger
            $("#weightVariantList").select2({
                placeholder: "Select Weight",
                templateResult: function (state) {
                    if (!state.id) {
                        return state.text;
                    }
                    var $state = $(
                        '<span>' +
                        state.text +
                        "</span>"
                    );
                    return $state;
                },
                ajax: {
                    type:'GET',
                    url: '{{url('admin/weight-variant-info')}}',
                    processResults: function (data) {
                        // var data = $.parseJSON(data);
                        return {
                            results: data
                        };
                    }
                }
            }).trigger("change").on("select2:select", function (e) {
             
                $("#weightVariantTable tbody").append(
                    "<tr>" +
                    '<td><span class="attrValueId">' + e.params.data.id + '</span></td>' +
                    '<td><span class="productWeight">' + e.params.data.text + '</span></td>' +
                    '<td class="align-items-center"><input type="number" class="productRegularPrice form-control" style="width:80px;" value="1" min="1"></td>' +
                    '<td class="align-items-center"><input type="number" class="productDiscount form-control" style="width:80px;" min="1" value="1"></td>' +


                    '<td><button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button></td>\n' +
                    "</tr>"
                );
                
                
                

            });
                
            //  Color Select2 Trigger
            
            $("#colorVariantList").select2({
                placeholder: "Select Color",
                templateResult: function (state) {
                    if (!state.id) {
                        return state.text;
                    }
                    var $state = $(
                        '<span>' +
                        state.text +
                        "</span>"
                    );
                    return $state;
                },
                ajax: {
                    type:'GET',
                    url: '{{url('admin/color-variant-info')}}',
                    processResults: function (data) {
                        // var data = $.parseJSON(data);
                        return {
                            results: data
                        };
                    }
                }
            }).trigger("change").on("select2:select", function (e) {

                $("#colorVariantTable tbody").append(
                    "<tr>" +
                    '<td><span class="attrValueId">' + e.params.data.id + '</span></td>' +
                    '<td><span class="productColor">' + e.params.data.text + '</span></td>' +
                    '<td class="align-items-center"><input type="number" class="productRegularPrice form-control" style="width:80px;" value="1" min="1"></td>' +
                    '<td class="align-items-center"><input type="number" class="productDiscount form-control" style="width:80px;" min="1" value="1"></td>' +


                    '<td><button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button></td>\n' +
                    "</tr>"
                );




            });
            //   Size Select2 Trigger

            $("#sizeVariantList").select2({
                placeholder: "Select Size",
                templateResult: function (state) {
                    if (!state.id) {
                        return state.text;
                    }
                    var $state = $(
                        '<span>' +
                        state.text +
                        "</span>"
                    );
                    return $state;
                },
                ajax: {
                    type:'GET',
                    url: '{{url('admin/size-variant-info')}}',
                    processResults: function (data) {
                        // var data = $.parseJSON(data);
                        return {
                            results: data
                        };
                    }
                }
            }).trigger("change").on("select2:select", function (e) {

                $("#sizeVariantTable tbody").append(
                    "<tr>" +
                    '<td><span class="attrValueId">' + e.params.data.id + '</span></td>' +
                    '<td><span class="productSize">' + e.params.data.text + '</span></td>' +
                    '<td class="align-items-center"><input type="number" class="productRegularPrice form-control" style="width:80px;" value="1" min="1"></td>' +
                    '<td class="align-items-center"><input type="number" class="productDiscount form-control" style="width:80px;" min="1" value="1"></td>' +


                    '<td><button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button></td>\n' +
                    "</tr>"
                );

            });
                //    Delete Button
                $(document).on("click", ".delete-btn", function () {
                    $(this).closest("tr").remove();

                });


            
           
            
    </script> 
        
   
    
@endpush