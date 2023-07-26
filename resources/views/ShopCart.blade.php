@extends('/LayoutDotties/layout')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('TrangChu')}}">Home</a>
                            <a href="">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                @if(Cart::count() > 0)
                    <div class="col-lg-8">
                        <div class="shopping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($carts as $cart)
                                        <tr>
                                            <td class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <img src="/WebsiteDottiesShoes/img/Ues/{{$cart -> options -> images}}" style=" width: 90px;">
                                                </div>
                                                <div class="product__cart__item__text">
                                                    <h6>{{$cart -> name}}</h6>
                                                    <h6>{{$cart -> options -> Color}}</h6>
                                                    <h6>{{number_format($cart -> price )}} VND</h6>
                                                </div>
                                            </td>
                                            <td class="quantity__item">
                                                <div class="quantity">
                                                    <div class="pro-qty-2">
                                                        <input type="text" min="1" value="{{$cart -> qty}}" data-rowid="{{$cart -> rowId}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__price">{{number_format($cart -> price * $cart -> qty, 0, ',', '.')}} VND</td>
                                            <td class="cart__close"><a href="/ShopCart/DeleteCart/{{ $cart -> rowId }}"><i class="fa fa-close"></i></a></td>
                                        </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn">
                                    <a href="{{route('Shop')}}">Continue Shopping</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn update__btn">
                                    <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-8">
                        <div class="breadcrumb__text">
                            <h5> Hiện Chưa Có Sản Phẩm Nào Trong Giỏ Hàng </h5>
                        </div>
                        <br> <br>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn">
                                    <a href="{{route('Shop')}}">Continue Shopping</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn update__btn">
                                    <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>SubTotal <span>{{ number_format($sum, 0, ',', '.') }}VNĐ</span></li>
                            <li>Total <span>{{ number_format($sum, 0, ',', '.') }}VNĐ</span></li>
                        </ul>
                        <a href="{{route('CheckOut')}}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection