<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Helper;
use App\Models\Order;
use App\Models\Product;
use Google\Auth\CredentialsLoader;
use Google_Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use function auth;
use function view;

class DashboardController extends Controller
{
    public function index(){
        if(auth()->check()){



            $numberOrderWaiting = Order::where('order_status_id', 1)->count();
            $numberOrderShipping = Order::where('order_status_id', 2)->count();
            $numberOrderCancel = Order::where('order_status_id', 4)->count();
            $numberOrderRefund = Order::where('order_status_id', 5)->count();
            $revenue = Order::sum('amount');

            return view('administrator.dashboard.index', compact('numberOrderCancel','numberOrderRefund','numberOrderShipping','numberOrderWaiting','revenue'));


        }
        return redirect()->to('/admin');
    }
}
