<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Flasher\Toastr\Prime\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;

class HomeController extends Controller
{
    //

    public function home()
    {
        $data=Product::all();
        return view('home.index',compact('data'));
    }
    public function login_home()
    {
        $data=Product::all();
        $user=Auth::user();
        $user_id=$user->id;
        $count= Cart::where('user_id',$user_id)->count();
        return view('home.index',compact('data','count'));
    }
    public function product_details($id){
        $product=Product::find($id);
        if (Auth::check()) {
            $user=Auth::user();
            $user_id=$user->id;
            $count= Cart::where('user_id',$user_id)->count();
        }
        else{
            $count='';
        }

        return view('home.product_details',compact('product','count'));
    }
    public function add_to_cart($id)
    {
       $product_id=$id;
       $user=Auth::user();
       $user_id=$user->id;
       $data= new Cart;
       $data->user_id=$user_id;
       $data->product_id=$product_id;
       $data->save();
       toastr()->success('Product added to cart successfully!');
       return redirect()->back();
    }
    public function my_cart()
    {
        if(Auth::id()){
            $user=Auth::user();
            $user_id= $user->id;
            $count=Cart::where('user_id',$user_id)->count();
            $carts=Cart::where('user_id',$user_id)->get();
        }
        return view('home.my_cart',compact('count','carts'));
    }
    public function remove_from_cart($id){
        Cart::destroy($id);
        toastr()->success('Product removed from cart successfully!');
        return redirect()->back();

    }

    public function confirm_order()
    {
        $name=Auth::user()->name;
        $address=Auth::user()->address;
        $phone=Auth::user()->phone;
        $user_id=Auth::user()->id;
        $carts=Cart::where('user_id',$user_id)->get();
        foreach($carts as $cart){
            $order=new Order;
            $order->name=$name;
            $order->rec_address=$address;
            $order->phone=$phone;
            $order->user_id=$user_id;
            $order->product_id=$cart->product_id;
            $order->save();
        }
        $cart_remove=Cart::where('user_id',$user_id)->get();
        foreach($cart_remove as $remove){
           $data=Cart::find($remove->id);
           $data->delete();
        }
        return redirect()->back();


    }
    public function my_orders(){
        $user_id=Auth::user()->id;
        $count=Cart::where('user_id',$user_id)->count();
        $orders=Order::where('user_id',$user_id)->get();
        return view('home.my_orders',compact('count','orders'));
    }
    public function stripe($value)
    {
        return view('home.stripe',compact('value'));
    }
    public function stripePost(Request $request,$value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $value * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from complete"
        ]);
        $name=Auth::user()->name;
        $address=Auth::user()->address;
        $phone=Auth::user()->phone;
        $user_id=Auth::user()->id;
        $carts=Cart::where('user_id',$user_id)->get();
        foreach($carts as $cart){
            $order=new Order;
            $order->name=$name;
            $order->rec_address=$address;
            $order->phone=$phone;
            $order->user_id=$user_id;
            $order->payment_status="paid";
            $order->product_id=$cart->product_id;
            $order->save();
        }
        $cart_remove=Cart::where('user_id',$user_id)->get();
        foreach($cart_remove as $remove){
            $data=Cart::find($remove->id);
            $data->delete();
        }
        toastr()->success('Order placed successfully!');
        return redirect('/my_cart');
    }
    public function shop()
    {
        $data=Product::all();
        if (Auth::id()){
        $user=Auth::user();
        $user_id=$user->id;
        $count= Cart::where('user_id',$user_id)->count();
        }
        else{
            $count='';
        }
        return view('home.shop',compact('data','count'));
    }
    public function why(){
        if (Auth::id()){
            $user=Auth::user();
            $user_id=$user->id;
            $count= Cart::where('user_id',$user_id)->count();
        }
        else{
            $count='';
        }
        return view('home.why',compact('count'));
    }
    public function testimonial(){
        if (Auth::id()){
            $user=Auth::user();
            $user_id=$user->id;
            $count= Cart::where('user_id',$user_id)->count();
        }
        else{
            $count='';
        }
        return view('home.testimonial',compact('count'));
    }
    public function contact(){
        if (Auth::id()){
            $user=Auth::user();
            $user_id=$user->id;
            $count= Cart::where('user_id',$user_id)->count();
        }
        else{
            $count='';
        }
        return view('home.contact',compact('count'));
    }

}
