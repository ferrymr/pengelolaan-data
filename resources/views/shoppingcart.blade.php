@extends('layouts.app')

@section('content')

    <!-- wrap main content -->
	<div class="site-content">
		<main class="site-main  main-container no-sidebar">
			<div class="container">

				<!-- breadcrumb -->
				<div class="breadcrumb-trail breadcrumbs">
					<ul class="trail-items breadcrumb">
						<li class="trail-item trail-begin">
							<a href="">
								<span>
									Home
								</span>
							</a>
						</li>
						<li class="trail-item trail-end active">
							<span>
								Shopping Cart
							</span>
						</li>
					</ul>
				</div>

				<!-- main content -->
				<div class="row">
					<div class="main-content-cart main-content col-sm-12">
						<h3 class="custom_blog_title">#Shopping Cart</h3>

						<div class="page-main-content">
							<div class="shoppingcart-content">
								<form action="shoppingcart.html" class="cart-form">
									<table class="shop_table">
										<thead>
											<tr>
												<th class="product-remove"></th>
												<th class="product-thumbnail"></th>
												<th class="product-name"></th>
												<th class="product-price"></th>
												<th class="product-quantity"></th>
												<th class="product-subtotal"></th>
											</tr>
										</thead>
										<tbody>
											<tr class="cart_item">
                                                @foreach($items as $item )
                                                <td class="product-remove">
													<a href="{{ url('shoppingcart/delete', $item->id) }}" class="remove"></a>
												</td>
												<td class="product-thumbnail">
													<a href="#">
														<img src="assets/images/cart-item-2.jpg" alt="" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
													</a>
												</td>
												<td class="product-name" data-title="Product">
													<a href="#" class="title">{{ $item->nama }}</a>
													<span class="attributes-select attributes-color">{{ $item->jenis }}</span>
													{{-- <span class="attributes-select attributes-size">XXL</span> --}}

												</td>
												<td class="product-quantity" data-title="Quantity">
													<div class="quantity">
													<div class="control">
														<a class="btn-number qtyminus quantity-minus" href="#">-</a>
														<input type="text" data-step="1" data-min="0" value="{{ $item->quantity }}" title="Qty" class="input-qty qty" size="4">
														<a href="#" class="btn-number qtyplus quantity-plus">+</a>
													</div>
												</div>
												</td>
												<td class="product-price" data-title="Price">
													<span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">
															€
														</span>
														{{ $item->h_nomem }}
													</span>
												</td>
                                                @endforeach
                                            </tr>
                                            <tr>
												<td class="actions">
													{{-- <div class="coupon">
														<label class="coupon_code">Coupon Code:</label>
														<div class="coupon-wrapp">
															<input type="text" class="input-text" placeholder="Promotion code here">
															<a href="#"  class="button"></a>
														</div>
													</div> --}}
													<div class="order-total">
														<span class="title">
															Total Price:
														</span>
														<span class="total-price">
															€{{ $totals }}
														</span>
													</div>
												</td>
											</tr>
											{{-- <tr class="cart_item">
												<td class="product-remove">
													<a href="#" class="remove"></a>
												</td>
												<td class="product-thumbnail">
													<a href="#">
														<img src="assets/images/cart-item-3.jpg" alt="" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
													</a>
												</td>
												<td class="product-name" data-title="Product">
													<a href="#" class="title">Pecan Coffee Beard Oil – 10ml</a>
													<span class="attributes-select attributes-color">White,</span>
													<span class="attributes-select attributes-size">M</span>

												</td>
												<td class="product-quantity" data-title="Quantity">
													<div class="quantity">
													<div class="control">
														<a class="btn-number qtyminus quantity-minus" href="#">-</a>
														<input type="text" data-step="1" data-min="0" value="1" title="Qty" class="input-qty qty" size="4">
														<a href="#" class="btn-number qtyplus quantity-plus">+</a>
													</div>
												</div>
												</td>
												<td class="product-price" data-title="Price">
													<span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">
															€
														</span>
														45
													</span>
												</td>
											</tr>
											<tr class="cart_item">
												<td class="product-remove">
													<a href="#" class="remove"></a>
												</td>
												<td class="product-thumbnail">
													<a href="#">
														<img src="assets/images/cart-item-1.jpg" alt="" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
													</a>
												</td>
												<td class="product-name" data-title="Product">
													<a href="#" class="title">Beard Tumbleweed Oil</a>
													<span class="attributes-select attributes-color">Brown,</span>
													<span class="attributes-select attributes-size">XS</span>

												</td>
												<td class="product-quantity" data-title="Quantity">
													<div class="quantity">
													<div class="control">
														<a class="btn-number qtyminus quantity-minus" href="#">-</a>
														<input type="text" data-step="1" data-min="0" value="1" title="Qty" class="input-qty qty" size="4">
														<a href="#" class="btn-number qtyplus quantity-plus">+</a>
													</div>
												</div>
												</td>
												<td class="product-price" data-title="Price">
													<span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">
															€
														</span>
														45
													</span>
												</td>
											</tr>
											<tr>
												<td class="actions">
													<div class="coupon">
														<label class="coupon_code">Coupon Code:</label>
														<div class="coupon-wrapp">
															<input type="text" class="input-text" placeholder="Promotion code here">
															<a href="#"  class="button"></a>
														</div>
													</div>
													<div class="order-total">
														<span class="title">
															Total Price:
														</span>
														<span class="total-price">
															€95
														</span>
													</div>
												</td>
											</tr> --}}
										</tbody>
									</table>
								</form>
								<div class="control-cart">
									<button class="button btn-continue-shopping">
										CONTINUE SHOPPING
									</button>
									<button class="button btn-cart-to-checkout">
										CHECK OUT
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- full width layout have no sidebar-->

			</div>
		</main>
    </div>
    <br>
    <br>

    
@endsection