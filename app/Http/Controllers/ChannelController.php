<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request, Response};

use App\Models\Channel;
use Illuminate\Support\Facades\Validator;

class ChannelController extends Controller
{
	public function index()
	{
		$channels = Channel::all();
		return view("channels", [
			"channels" => $channels
		]);
	}

	public function create()
	{
		return view("channel");
	}

	public function store(Request $request)
	{
		$rules = [
			'name' => 'required|min:3'
		];

		$messages = [
			'name.required' => 'O campo nome deve ser preenchido',
			'name.min' => 'O campo nome deve ter pelo menos 3 caracteres'
		];

		$validator = Validator::make($request->all(), $rules, $messages);

		if ($validator->fails()) {
			return back()->withErrors($validator);
		}

		$channel = new Channel();
		$channel->name = $request->input("name");

		if ($request->file("logo")) {
			$filename = uniqid() . "." . $request->file("logo")->extension();
			$path = $request->file("logo")->storeAs("public/channels", $filename);
			$channel->url_image = $filename;
		}

		$channel->save();
		return redirect()->route("channels-list");
	}

	public function edit($id)
	{
		$channel = Channel::find($id);
		return view("channel", [
			"channel" => $channel
		]);
	}

	public function update(Request $request, $id)
	{
		$rules = [
			'name' => 'required|min:3'
		];

		$messages = [
			'name.required' => 'O campo nome deve ser preenchido',
			'name.min' => 'O campo nome deve ter pelo menos 3 caracteres'
		];

		$validator = Validator::make($request->all(), $rules, $messages);

		if ($validator->fails()) {
			return back()->withErrors($validator);
		}

		$channel = Channel::find($id);
		$channel->name = $request->input("name");

		if ($request->file("logo")) {
			$filename = uniqid() . "." . $request->file("logo")->extension();
			$path = $request->file("logo")->storeAs("public/channels", $filename);
			$channel->url_image = $filename;
		}

		$channel->save();

		return redirect()->route("channels-list");
	}

	public function destroy($id)
	{
		$channel = Channel::find($id);
		$channel->delete();

		return redirect()->route("channels-list");
	}
}
