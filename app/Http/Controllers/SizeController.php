<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::All();
        return view('onlyme.sizes.index', compact('sizes'));
    }

    public function store(Request $request)
    {
        Size::create($request->all());
        return redirect('/onlyme/sizes');
    }
    
    public function edit($id)
    {
        $size = Size::findOrFail($id);
        return view('onlyme.sizes.edit', compact('size'));
    }

    public function update(Request $request, $id)
    {
        Size::findOrFail($id)->update($request->all());
        return redirect('/onlyme/sizes');
    }

    public function destroy($id)
    {
        Size::findOrFail($id)->delete();
        return redirect('/onlyme/sizes');
    }
}
