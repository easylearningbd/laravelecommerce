@extends('layouts.app')

@section('content')
@include('layouts.menubar')

@php
$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge; 
$vat = $setting->vat; 
@endphp
       
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }} ">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css') }}">

<div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-7" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Cart Products</div>

          
                          <div class="cart_items">
                            <ul class="cart_list">
                              
                              @foreach($cart as $row)

        <li class="cart_item clearfix">
             


            <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">

                 <div class="cart_item_name cart_info_col">
                    <div class="cart_item_title"><b>Product Image</b></div>
                    <div class="cart_item_text"><img src="{{ asset($row->options->image) }} " style="width: 70px; width: 70px;" alt=""></div>
                </div>


                <div class="cart_item_name cart_info_col">
                    <div class="cart_item_title"><b>Name</b></div>
                    <div class="cart_item_text">{{ $row->name  }}</div>
                </div>

                @if($row->options->color == NULL)

                @else
                <div class="cart_item_color cart_info_col">
                    <div class="cart_item_title"><b>Color</b></div>
                    <div class="cart_item_text"> {{ $row->options->color }}</div>
                </div>
                 @endif
 

                @if($row->options->size == NULL)

                @else
                <div class="cart_item_color cart_info_col">
                    <div class="cart_item_title"><b>Size</b></div>
                    <div class="cart_item_text"> {{ $row->options->size }}</div>
                </div>
                @endif
                  

                <div class="cart_item_quantity cart_info_col">
                    <div class="cart_item_title"><b>Quantity</b></div> 
                 <div class="cart_item_text"> {{ $row->qty }}</div>
           
                </div>



                <div class="cart_item_price cart_info_col">
                    <div class="cart_item_title"><b>Price</b></div>
                    <div class="cart_item_text">${{ $row->price }}</div>
                </div>
                <div class="cart_item_total cart_info_col">
                    <div class="cart_item_title"><b>Total</b></div>
                    <div class="cart_item_text">${{ $row->price*$row->qty }}</div>
                </div>

                 
            </div>
        </li>
                                @endforeach
                            </ul>
                        </div>

        <ul class="list-group col-lg-8" style="float: right;">
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

 
 


<div class="col-lg-5" style="border: 1px solid grey; padding: 20px; border-radius: 25px;"> 
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Shipping Address</div>

         <form action="{{ route('payment.process') }}" id="contact_form" method="post">
             @csrf
                            
          <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Full Name " name="name" required="">
         </div>


         <div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Phone " name="phone" required="">
         </div>


         <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Email " name="email" required="">
         </div>


         <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Address" name="address" required="">
         </div>



         <div class="form-group">
    <label for="exampleInputEmail1">City</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your City" name="city" required="">
         </div>

    <div class="contact_form_title text-center"> Payment By </div>
    <div class="form-group">
        <ul class="logos_list">
            <li><input type="radio" name="payment" value="stripe"><img src="{{ asset('public/frontend/images/mastercard.png') }}" style="width: 100px; height: 60px;"> </li>

             <li><input type="radio" name="payment" value="paypal"><img src="{{ asset('public/frontend/images/paypal.png') }}" style="width: 100px; height: 60px;"> </li>

              <li><input type="radio" name="payment" value="oncash"><img src="{{ asset('public/frontend/images/delivery.png') }}" style="width: 100px; height: 60px;"> </li>
            
        </ul>
        
    </div>
 
  
                            <div class="contact_form_button text-center">
        <button type="submit" class="btn btn-info">Pay Now</button>
                            </div>
                        </form>

                    </div>
                </div>







            </div>
        </div>
        <div class="panel"></div>
    </div>












@endsection
