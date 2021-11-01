<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamNumber;

class TeamController extends Controller
{
    public function index()
    {
        $teams = TeamNumber::All();
        return view('onlyme.teams.index', compact('teams'));
    }

    public function store(Request $request)
    {
        TeamNumber::create($request->all());
        return redirect('/onlyme/teams');
    }

    public function edit($id)
    {
        $team = TeamNumber::findOrFail($id);
        return view('onlyme.teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        TeamNumber::findOrFail($id)->update($request->all());
        return redirect('/onlyme/teams');
    }

    public function destroy($id)
    {
        TeamNumber::findOrFail($id)->delete();
        return redirect('/onlyme/teams');
    }
}
