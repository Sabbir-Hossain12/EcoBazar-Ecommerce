@extends('frontend.layout.master')

@push('titles')
    EcoBazaar - Bootstrap eCommerce Template
@endpush

@push('add-css')
    <style>
        .icon-button {
            background: none;      /* Remove background */
            border: none;          /* Remove border */
            padding: 0;            /* Remove padding */
            cursor: pointer;       /* Show pointer on hover */
            color: inherit;        /* Use icon color */
            font-size: 1.5em;      /* Adjust icon size as needed */
        }
    </style>
@endpush

@section('body-content')
    


    <!-- start Wishlist section -->
    <section class="wishlist-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>My Wishlist</h2>

                    <table class="table">
                        <thead class="all_thead">
                          <tr >
                            <th scope="col"><span class="">Product</span></th>
                            <th scope="col"><span class="">Price</span></th>
                            <th scope="col"><span class="">Stock Status</span></th>
                            <th scope="col"><span class=""></span></th>
                          </tr>
                        </thead>
                        
                        <tbody>
                        @forelse($wishlists as $wishlist) 
                          <tr class="all_tr">
                            <td class="all_td">
                                <div class="wishlist-product-list">
                                    <img class="rounded" src="{{ asset($wishlist->product->productDetail->productThumbnail_img) }}" alt="">
                                    <h3 class="overflow-hidden text-truncate" style="max-width: 350px;">
                                        
                                        {{$wishlist->product->product_name}}</h3>
                                </div>
                            </td>

                            <td class="all_td" style="vertical-align: middle">
                                <div class="wishlist-product-price">
                                    @if(count($wishlist->product->weights)>0) 
                                   <p>${{ $wishlist->product->weights[0]->productSalePrice }} <del>$<span>{{ $wishlist->product->weights[0]->productRegularPrice }}</span></del></p>
                                    @elseif(count($wishlist->product->sizes)>0)
                                    <p>${{ $wishlist->product->sizes[0]->productSalePrice }} <del>$<span>{{ $wishlist->product->sizes[0]->productRegularPrice }}</span></del></p>
                                    @else
                                    <p>${{ $wishlist->product->colors[0]->productSalePrice }} <del>$<span>{{ $wishlist->product->colors[0]->productRegularPrice }}</span></del></p>
                                    @endif
                                </div>
                            </td>

                            <td class="all_td" style="vertical-align: middle">
                                <div class="wishlist-stock">
                                    @if($wishlist->product->productDetail->available_qty>0) 
                                    <span class="stock-in">In Stock</span>
                                    @else
                                    <span class="stock-out">Out of Stock</span>
                                    @endif
                                </div>
                            </td>

                           
                            <td class="all_td" style="vertical-align: middle; text-align: end;">
                                 <div class="wishlist-action">
                                    <a href="{{route('product-details',$wishlist->product->slug)}}" class="wishlist_btn">View Product</a>
                                     
                                     <form id="deleteWishForm" action="{{route('wishlist.destroy', $wishlist->id)}}" method="POST">
                                         <input type="text" name="id" value="{{$wishlist->id}}" hidden>
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" class="icon-button" >  <i class='bx bx-x'></i> </button>
                                     </form>
                                 </div>
                            </td>
                          </tr>

                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. wishlist-section -->

@endsection


@push('add-scripts')

@endpush