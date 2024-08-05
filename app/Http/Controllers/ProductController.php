<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\View\View as View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(): View
    {
        $items = Product::get();
        return view('product.index', compact('items'));
    }

    public function create(): View
    {
        $type = Type::all();
        return view('product.create', compact('type'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name'     => 'required|min:5',
            'type_id'   => 'required|integer',
            'detail'   => 'string|max:255',
            'stock'   => 'integer',
            'price'   => 'numeric',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/product', $image->hashName());

        //create post
        Product::create([
            'image'     => $image->hashName(),
            'name'     => $request->name,
            'type_id'   => $request->type_id,
            'detail'   => $request->detail,
            'stock'   => $request->stock,
            'price'   => $request->price,
        ]);

        //redirect to index
        return redirect()->route('product.index')->with(['success' => 'Succes Upload Your Product!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {

        $product = Product::with('types')->findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {

        $product = Product::findOrFail($id);
        $type = Type::all();
        return view('product.edit', compact('product', 'type'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'image'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'name'         => 'required|min:5',
            'type_id'   => 'required|integer',
            'detail'   => 'required|string',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        //get product by ID
        $product = Product::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/product', $image->hashName());

            //delete old image
            Storage::delete('public/product/' . $product->image);

            //update product with new image
            $product->update([
                'image'         => $image->hashName(),
                'name'         => $request->name,
                'type_id'         => $request->type_id,
                'detail'   => $request->detail,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);
        } else {

            //update product without image
            $product->update([
                'name'   => $request->name,
                'type_id'         => $request->type_id,
                'detail'         => $request->detail,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);
        }

        //redirect to index
        return redirect()->route('product.index')->with(['success' => 'Succes Change The Product!']);
    }
    public function destroy($id): RedirectResponse
    {

        $product = Product::findOrFail($id);
        Storage::delete('public/product/' . $product->image);
        $product->delete();
        return redirect()->route('product.index')->with(['success' => 'Succes Delete Product!']);
    }
}