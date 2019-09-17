<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index');
    }
    
    public function checkout()
    {
        return view('web.checkout');
    }
    
    public function subscription()
    {
        return view('web.subscription');
    }
    
    public function set_token(Request $request)
    {
        
        $pay_jp_secret = env('MIX_PAYJP_SECRET_KEY');
        \Payjp\Payjp::setApiKey($pay_jp_secret);
        
        $customer = \Payjp\Customer::create(array(
            "card" => request('token')
        ));
        
        $user = Auth::user();
        // $user->token = request('token');
        // $user->token = $customer->id;
        $user->customer_id = $customer->id;
        $user->save();
        return response()->json($user);
    }
    
    public function set_subscription(Request $request)
    {
        $pay_jp_secret = env('MIX_PAYJP_SECRET_KEY');
        
        $user = Auth::user();
        
        \Payjp\Payjp::setApiKey($pay_jp_secret);
        
        $plan_id = \Payjp\Plan::all(array("limit" => 2))->data[0]->id;
        
        \Payjp\Subscription::create(
            array(
                "customer" => $user->customer_id,
                "plan" => $plan_id
                )
            );
    }
}
