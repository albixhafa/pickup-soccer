<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamGender;

class TeamGenderController extends Controller
{
    public function index()
    {
        $teamgenders = TeamGender::All();
        return view('onlyme.teamgenders.index', compact('teamgenders'));
    }

    public function store(Request $request)
    {
        TeamGender::create($request->all());
        return redirect('/onlyme/teamgenders');
    }

    public function edit($id)
    {
        $teamgender = TeamGender::findOrFail($id);
        return view('onlyme.teamgenders.edit', compact('teamgender'));
    }

    public function update(Request $request, $id)
    {
        TeamGender::findOrFail($id)->update($request->all());
        return redirect('/onlyme/teamgenders');
    }

    public function destroy($id)
    {
        TeamGender::findOrFail($id)->delete();
        return redirect('/onlyme/teamgenders');
    }
}
