<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TypeController extends Controller
{
    public function index(): View
    {
        $types = Type::get();
        return view('type.index', compact('types'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('type.create');
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
            'name'     => 'required',
        ]);

        //create post
        Type::create([
            'name'     => $request->name,
        ]);

        //redirect to index
        return redirect()->route('type.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {

        $type = Type::findOrFail($id);
        return view('type.edit', compact('type'));
    }
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {

        $type = Type::findOrFail($id);
        return view('type.show', compact('type'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $type = Type::findOrFail($id);
        $type->update([
            'name' => $request->name
        ]);
        return redirect()->route('type.index')->with(['success', 'data berhasil']);
    }

    public function destroy($id): RedirectResponse
    {
        $type = Type::findOrFail($id);
        $type->delete();

        return redirect()->route('type.index')->with(['success', 'data berhasil']);
    }
}