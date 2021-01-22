<?php

namespace App\Http\Controllers;

use App\Models\{Match, Channel};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::orderBy("date", "desc")->get();

        return view("matches", compact("matches"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $match = new Match();
        $match->date = date("Y-m-d\TH:i:s");

        $channels = Channel::all();

        return view("match", compact("match", "channels"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'team1' => 'required|min:3',
            'team2' => 'required|min:3'
        ];

        $messages = [
            'team1.min' => 'O campo Time 1 deve ter pelo menos 3 caracteres',
            'team2.min' => 'O campo Time 2 deve ter pelo menos 3 caracteres',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $match = new Match();
        $match->team1 = $request->input("team1");
        $match->team2 = $request->input("team2");
        $match->date = $request->input("date");

        $match->save();

        $match->channels()->attach($request->input("channels"));

        return redirect()->route("matches-list");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $match = Match::find($id);

        $channels = Channel::all();

        return view("match", compact("match", "channels"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'team1' => 'required|min:3',
            'team2' => 'required|min:3'
        ];

        $messages = [
            'team1.required' => 'Time 1 deve ser preenchido',
            'team1.min' => 'O campo Time 1 deve ter pelo menos 3 caracteres',
            'team2.required' => 'Time 2 deve ser preenchido',
            'team2.min' => 'O campo Time 2 deve ter pelo menos 3 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $match = Match::find($id);
        $match->team1 = $request->input("team1");
        $match->team2 = $request->input("team2");
        $match->date = $request->input("date");

        $match->save();

        $match->channels()->sync($request->input("channels"));

        return redirect()->route("matches-list");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = Match::find($id);
        $match->delete();

        return redirect()->route("matches-list");
    }
}
