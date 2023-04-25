<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;


class OrdersPartner extends Component
{

    use WithPagination;

    public $search;


    public function index(){

        $orders = Order::query()->where('status','<>', 1);

        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders = $orders->get();
    }

    public function render()
    {
        return view('livewire.admin.orders-partner')->layout('layouts.admin');
    }
}
