<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class RoleController extends Controller
{
    public function index(): View
    {
        $roles = Role::get();


        return view('role.index', compact('roles'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('role.create');
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
        Role::create([
            'name'     => $request->name,
        ]);

        //redirect to index
        return redirect()->route('role.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {

        $role = Role::findOrFail($id);
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name
        ]);
        return redirect()->route('role.index')->with(['success', 'data berhasil']);
    }

    public function destroy($id): RedirectResponse
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('role.index')->with(['success', 'data berhasil']);
    }
}