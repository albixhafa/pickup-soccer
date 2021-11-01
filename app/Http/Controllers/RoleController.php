<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::All();
        return view('onlyme.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        Role::create($request->all());
        return redirect('/onlyme/roles');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('onlyme.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        Role::findOrFail($id)->update($request->all());
        return redirect('/onlyme/roles');
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return redirect('/onlyme/roles');
    }
}
