<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function NewOrder(){
    
     $order = DB::table('orders')->where('status',0)->get();
     return view('admin.order.pending',compact('order'));

    }


    public function ViewOrder($id){

    $order = DB::table('orders')
    		->join('users','orders.user_id','users.id') 	
    		->select('orders.*','users.name','users.phone')
    		->where('orders.id',$id)
    		->first();
    		// dd($order);

     $shipping = DB::table('shipping')->where('order_id',$id)->first();
     // dd($shipping);

     $details = DB::table('orders_details')
     			->join('products','orders_details.product_id','products.id')
     			->select('orders_details.*','products.product_code','products.image_one')
     			->where('orders_details.order_id',$id)
     			->get();
     			// dd($details);
     	return view('admin.order.view_order',compact('order','shipping','details'));		

    }


    public function PaymentAccept($id){
    DB::table('orders')->where('id',$id)->update(['status'=>1]);
    $notification=array(
            'messege'=>'Payment Accept Done',
            'alert-type'=>'success'
             );
           return Redirect()->route('admin.neworder')->with($notification); 
    } 


  public function PaymentCancel($id){
  	DB::table('orders')->where('id',$id)->update(['status'=>4]);
    $notification=array(
            'messege'=>'Order Cancel',
            'alert-type'=>'success'
             );
           return Redirect()->route('admin.neworder')->with($notification); 
  }
 


  public function AcceptPayment(){
  $order = DB::table('orders')->where('status',1)->get();
  // dd($order);
  return view('admin.order.pending',compact('order')); 
  }


  public function CancelOrder(){
  $order = DB::table('orders')->where('status',4)->get();
  // dd($order);
  return view('admin.order.pending',compact('order')); 
  }


    public function ProcessPayment(){
  $order = DB::table('orders')->where('status',2)->get();
  // dd($order);
  return view('admin.order.pending',compact('order')); 
  }



  public function SuccessPayment(){
  $order = DB::table('orders')->where('status',3)->get();
  // dd($order);
  return view('admin.order.pending',compact('order')); 
  }



public function DeleveryProcess($id){
    DB::table('orders')->where('id',$id)->update(['status'=>2]);
    $notification=array(
            'messege'=>'Send To Delivery',
            'alert-type'=>'success'
             );
           return Redirect()->route('admin.accept.payment')->with($notification); 
    } 




    public function DeleveryDone($id){

  $product = DB::table('orders_details')->where('order_id',$id)->get();
  foreach ($product as $row) {
   DB::table('products')
          ->where('id',$row->product_id)
          ->update(['product_quantity' => DB::raw('product_quantity-'.$row->quantity)]);
  }
 
    DB::table('orders')->where('id',$id)->update(['status'=>3]);
    $notification=array(
            'messege'=>'Product Delivery Done',
            'alert-type'=>'success'
             );
           return Redirect()->route('admin.success.payment')->with($notification); 
    } 





  public function seo(){
  	$seo = DB::table('seo')->first();
  	return view('admin.coupon.seo',compact('seo'));
  }

  
   public function UpdateSeo(Request $request){

    $id = $request->id;

   	$data = array();
   	$data['meta_title'] = $request->meta_title;
    $data['meta_author'] = $request->meta_author;
    $data['meta_tag'] = $request->meta_tag;
    $data['meta_description'] = $request->meta_description;
    $data['google_analytics'] = $request->google_analytics;
    $data['bing_analytics'] = $request->bing_analytics;
    DB::table('seo')->where('id',$id)->Update($data);
    $notification=array(
            'messege'=>'Seo Updated Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification); 
 
   }

   



}
