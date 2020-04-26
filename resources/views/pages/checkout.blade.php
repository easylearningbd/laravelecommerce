@extends('layouts.app')

@section('content')
@include('layouts.menubar')

@php
$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge; 
$vat = $setting->vat; 
@endphp

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css') }}">
	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart_container">
						<div class="cart_title">Checkout</div>
						<div class="cart_items">
							<ul class="cart_list">
                              
                              @foreach($cart as $row)

		<li class="cart_item clearfix">
			<div class="cart_item_image text-center"><br><img src="{{ asset($row->options->image) }} " style="width: 70px; width: 70px;" alt=""></div>
			<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
				<div class="cart_item_name cart_info_col">
					<div class="cart_item_title">Name</div>
					<div class="cart_item_text">{{ $row->name  }}</div>
				</div>

				@if($row->options->color == NULL)

                @else
				<div class="cart_item_color cart_info_col">
					<div class="cart_item_title">Color</div>
					<div class="cart_item_text"> {{ $row->options->color }}</div>
				</div>
				 @endif
 

                @if($row->options->size == NULL)

                @else
                <div class="cart_item_color cart_info_col">
					<div class="cart_item_title">Size</div>
					<div class="cart_item_text"> {{ $row->options->size }}</div>
				</div>
                @endif
                  

				<div class="cart_item_quantity cart_info_col">
					<div class="cart_item_title">Quantity</div><br> 

           <form method="post" action="{{ route('update.cartitem') }}">
           	@csrf
           	<input type="hidden" name="productid" value="{{ $row->rowId }}">
           	<input type="number" name="qty" value="{{ $row->qty }}" style="width: 50px;">
           	<button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check-square"></i> </button>
 
           </form>  
				</div>



				<div class="cart_item_price cart_info_col">
					<div class="cart_item_title">Price</div>
					<div class="cart_item_text">${{ $row->price }}</div>
				</div>
				<div class="cart_item_total cart_info_col">
					<div class="cart_item_title">Total</div>
					<div class="cart_item_text">${{ $row->price*$row->qty }}</div>
				</div>

                <div class="cart_item_total cart_info_col">
					<div class="cart_item_title">Action</div><br>
	 <a href="{{ url('remove/cart/'.$row->rowId ) }}" class="btn btn-sm btn-danger">x</a>
				</div>



			</div>
		</li>
								@endforeach
							</ul>
						</div>
						
						<!-- Order Total -->
					 
          <div class="order_total_content" style="padding: 15px;">
         @if(Session::has('coupon'))

         @else

          <h5 style="margin-left: 20px;"> Apply Coupon </h5>
          	<form method="post" action="{{ route('apply.coupon') }}">
          		@csrf
          		<div class="form group col-lg-4">
          			<input type="text" name="coupon" class="form-control" required="" placeholder="Enter Your Coupon"> 
          		</div><br>
         <button type="submit" class="btn btn-danger ml-2">Submit      	
         </button> 		
          	</form>
          	@endif
          	
          </div>

          <ul class="list-group col-lg-4" style="float: right;">
          	@if(Session::has('coupon'))
          	<li class="list-group-item">Subtotal : <span style="float: right;">
          	${{ Session::get('coupon')['balance'] }} </span> </li>
          	 <li class="list-group-item">Coupon : ({{ Session::get('coupon')['name'] }} )
              <a href="{{ route('coupon.remove') }}" class="btn btn-danger btn-sm">X</a>
           <span style="float: right;">${{ Session::get('coupon')['discount'] }} </span> </li>
          	@else
          	<li class="list-group-item">Subtotal : <span style="float: right;">
          	${{  Cart::Subtotal() }} </span> </li>
          	@endif
          	
          

          	<li class="list-group-item">Shiping Charge : <span style="float: right;">${{ $charge  }} </span> </li>
          	<li class="list-group-item">Vat : <span style="float: right;">${{ $vat }} </span> </li>
          	@if(Session::has('coupon'))
          	<li class="list-group-item">Total : <span style="float: right;">${{ Session::get('coupon')['balance'] + $charge + $vat }} </span> </li>
          	@else
      <li class="list-group-item">Total : <span style="float: right;">${{ Cart::Subtotal() + $charge + $vat }} </span> </li>
          	@endif
          
          	
          </ul>
           </div>
            </div>
             </div>








						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">All Cancel</button>
	 <a href="{{ route('payment.step') }}"  class="button cart_button_checkout">Final Step</a> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<script src="{{ asset('public/frontend/js/cart_custom.js') }}"></script>
@endsection