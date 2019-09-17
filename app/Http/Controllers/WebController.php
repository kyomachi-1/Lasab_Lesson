<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Http\Support\Facades\Auth;

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
    
    public function set_token(Request $request)
    {
        $pay_jp_secret = env('MIX_PAYJP_SECRET_KEY');
        \Payjp\Payjp::setApiKey($pau_jp_secret);
        $customer = \Payjp\Customer::create(array(
            "card" => request(token)
        ));
        
        $user = Auth::user();
        // $user->token = request('token');
        // $user->token = $customer->id;
        $user->customer_id = $customer->id;
        $user->save();
        return response()->json($user);
    }
}
