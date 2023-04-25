<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{

    public function index(){

        $orders = Order::query()->where('status','<>', 1);

        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders = $orders->get();

        $reservado =       Order::where('status', 1)->count();
        $pagado        =   Order::where('status', 2)->count();
        $despachado   =    Order::where('status', 3)->count();
        $entregado   =     Order::where('status', 4)->count();
        $anulado   =       Order::where('status', 5)->count();



        return view('admin.orders.index',compact('orders','reservado','pagado','despachado','entregado','anulado'));

    }

    public function show(Order $order){


        return view('admin.orders.show', compact('order'));

    }
}
