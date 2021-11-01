<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::All();
        return view('onlyme.status.index', compact('statuses'));
    }

    public function store(Request $request)
    {
        Status::create($request->all());
        return redirect('/onlyme/status');
    }

    public function edit($id)
    {
        $status = Status::findOrFail($id);
        return view('onlyme.status.edit', compact('status'));
    }

    public function update(Request $request, $id)
    {
        Status::findOrFail($id)->update($request->all());
        return redirect('/onlyme/status');
    }

    public function destroy($id)
    {
        Status::findOrFail($id)->delete();
        return redirect('/onlyme/status');
    }
}