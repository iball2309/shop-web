<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\View\View;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(): View
    {
        $deliverys = Delivery::get();


        return view('delivery.index', compact('deliverys'));
    }
}