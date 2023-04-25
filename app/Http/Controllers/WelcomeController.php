<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;

class WelcomeController extends Controller
{
    //
    public function __invoke()
    {

        if (auth()->user()) {
            $reservado =       Order::where('status', 1)->where('user_id',auth()->user()->id)->count();

            if ($reservado) {

                $mensaje = "Usted tiene $reservado ordenes reservadas. <a class='font-bold' href='" . route('orders.index') ."?status=1'>Ir a pagar</a>";

                session()->flash('flash.banner', $mensaje);
            }
        }


       // session()->flash('flash.bannerStyle','danger');

        $categories = Category::all();

        return view('welcome', compact('categories'));
    }
}
