<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {
        $items = Product::with('types')->paginate(9);
        return view('dashboard', compact('items'));
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {

        $items = Product::with('types')->findOrFail($id);
        return view('detail', compact('items'));
    }
}
