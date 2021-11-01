<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Format;

class FormatController extends Controller
{
    public function index()
    {
        $formats = Format::All();
        return view('onlyme.formats.index', compact('formats'));
    }

    public function store(Request $request)
    {
        Format::create($request->all());
        return redirect('/onlyme/formats');
    }

    public function edit($id)
    {
        $format = Format::findOrFail($id);
        return view('onlyme.formats.edit', compact('format'));
    }

    public function update(Request $request, $id)
    {
        Format::findOrFail($id)->update($request->all());
        return redirect('/onlyme/formats');
    }

    public function destroy($id)
    {
        Format::findOrFail($id)->delete();
        return redirect('/onlyme/formats');
    }
}
