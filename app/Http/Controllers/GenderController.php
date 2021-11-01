<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gender;

class GenderController extends Controller
{
    public function index()
    {
        $genders = Gender::All();
        return view('onlyme.genders.index', compact('genders'));
    }

    public function store(Request $request)
    {
        Gender::create($request->all());
        return redirect('/onlyme/genders');
    }

    public function edit($id)
    {
        $gender = Gender::findOrFail($id);
        return view('onlyme.genders.edit', compact('gender'));
    }

    public function update(Request $request, $id)
    {
        Gender::findOrFail($id)->update($request->all());
        return redirect('/onlyme/genders');
    }

    public function destroy($id)
    {
        Gender::findOrFail($id)->delete();
        return redirect('/onlyme/genders');
    }
}
