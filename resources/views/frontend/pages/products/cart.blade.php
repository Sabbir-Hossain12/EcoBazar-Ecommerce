@extends('frontend.layout.master')

@push('titles')
    EcoBazaar - Bootstrap eCommerce Template
@endpush

@push('add-css')

@endpush

@section('body-content')

    <!-- start Breadcrumb section -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-details">
                        <ul>
                            <li>
                                <a href="">
                                    <i class='bx bx-home'></i>  <i class='bx bx-chevron-right'></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    Shopping Cart
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- start Cart section -->
    <section class="cart-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>My Shopping Cart</h2>

                    <div class="cart-container">
                        <div class="cart-table">
                            <table class="table">
                                <thead class="all_thead">
                                  <tr>
                                    <th scope="col"><span class="">Product</span></th>
                                    <th scope="col"><span class="">Price</span></th>
                                    <th scope="col"><span class="">Quantity</span></th>
                                    <th scope="col"><span class="">Sub-Total</span></th>
                                    <th scope="col"><span class=""></span></th>
                                  </tr>
                                </thead>
                                
                                <tbody id="cartContentList">

                                
                                </tbody>
                            </table>

                            <div class="coupon-details">
                                <h3>Coupon Code</h3>

                                <div class="coupon-code">
                                    <form action="">
                                        <input type="text" class="coupon-form" placeholder="Enter Code">
                                        <i class='bx bx-purchase-tag-alt'></i>
                                        <button class="coupon-btn">Apply Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <aside class="cart-calculation">
                            <h2>Cart Total</h2>

                            <div class="cart-calc-details">
                                <p>Subtotal:</p>
                                <span >৳ <span id="subTotal"> 0</span></span>
                            </div>

{{--                            <div class="cart-calc-details">--}}
{{--                                <p>Shipping:</p>--}}
{{--                                <span>Free</span>--}}
{{--                            </div>--}}

                            <div class="cart-calc-details">
                                <p>Total:</p>
                                <span >৳ <span id="total">0</span> </span>
                            </div>

                            <a href="{{route('checkout.index')}}" class="cart-to-checkout">Proceed to checkout</a>
                        </aside>
                    </div>
                </div>
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. cart-section -->

@endsection


@push('add-scripts')
<script>
    cartContent();
    function cartContent() {
        $.ajax(
            {
                type: 'GET',
                url: '{{route('cart-data')}}',

                success: function (res) {
                    $('#cartContentList').empty();

                    Object.values(res.data).forEach(function (item, index) {
                        let sizeInfo = item.options.size ? `<p>Size: <span>${item.options.size}</span></p>` : '';
                        let colorInfo = item.options.color ? `<p>Color: <span>${item.options.color}</span></p>` : '';
                        let weightInfo = item.options.weight ? `<p>Weight: <span>${item.options.weight}</span></p>` : '';

                        let content = `<tr class="all_tr">
                                    <td class="all_td" width="50%" style="vertical-align: middle">
                                        <div class="cart-product-list">
                                            <img src="${item.options.image}" alt="">
                                            <div class="mt-2">
                                            <h3>${item.name}</h3>
                                            
                                            ${sizeInfo}
                                            ${colorInfo}
                                            ${weightInfo}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="all_td" style="vertical-align: middle">
                                        <div class="cart-product-price">
                                           <p>৳  ${item.price}</p>
                                        </div>
                                    </td>

                                    <td class="all_td" style="vertical-align: middle">
                                        <div class="main-cart-quantity">
                                            <div class="cart-quantity">
                                                <i class='bx bx-minus'></i>
                                                <input type="number" class="quantity" readonly value="${item.qty}" min="1" max="10">
                                                <i class='bx bx-plus'></i>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="all_td" style="vertical-align: middle">
                                        <div class="cart-subTotal">
                                            <p>৳  ${item.price * item.qty}</p>
                                        </div>
                                    </td>

                                    <td class="all_td" style="vertical-align: middle; text-align: end;">
                                         <div class="cart-action">
                                            <i class='bx bx-x' onclick="removeCartContent('${item.rowId}')"></i>
                                         </div>
                                    </td>
                                  </tr>`
                        $('#cartContentList').append(content);
                    })
                    $('#cartContentList').append(` <tr class="all_tr">
                                     <td class="all_td" colspan="5">
                                         <a href="{{route('home')}}">
                                            <button class="btns secondary_btn">Return To Shop</button>
                                         </a>
                                     </td>
                                  </tr>`);
                    

                    $('#subTotal').text(res.subTotal)
                    $('#total').text(res.subTotal);


                },
                error: function (e) {

                    console.log(e)
                }
            }
        )
    }
    function removeCartContent(rowId) {

        $.ajax(
            {
                type: 'POST',
                url: '{{route('remove-cart-item')}}',
                data: {
                    rowId: rowId
                },
                success: function (res) {
                  

                    swal.fire(
                        {
                            title: 'success!',
                            text: 'Item removed from cart',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }
                    )

                    cartContent();
                },
                error: function (e) {
                    console.log(e)
                }
            }
        )
        
    }
    
    
</script>
    
@endpush