<?php

namespace App\Http\Controllers;

use App\ToDoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ToDoListController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$lists = DB::table('lists')->where('user_id', Auth::user()->id)
		->get();
		$listItems = DB::table('list_items')->where('user_id', Auth::user()->id)
		->get();
		return view('yourLists', compact('lists','listItems'));
	}

	/**
	 * Show the form for creating a new List.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function newList()
	{
		return view('newList');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function createNewList(Request $request)
	{
		//dd($request->listName);
		DB::table('lists')->insertOrIgnore([
			"name" => $request->listName,
			"user_id" => Auth::user()->id
		]);
		return redirect(url('/yourLists'));
	}

	/**
	 * Show the form for creating a new List.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function newListItem($id)
	{
		return view('newListItem', compact("id"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function createNewListItem(Request $request)
	{
		$user = Auth::user()->id;
		//DB::table('lists')->where('user_id', Auth::user()->id)
		$list = DB::table('lists')->find($request->List_id);

		//dd($user,$list);

		if ($list == null || $user == null) {
			return redirect(url('/yourLists'));

		} elseif ($user == $list->user_id) {
			DB::table('list_items')->insertOrIgnore([
				"name" => $request->listItemName,
				"description" => $request->description,
				"List_id" => $request->List_id,
				"user_id" => Auth::user()->id
			]);
			return redirect(url('/yourLists'));

		} else {
			return redirect(url('/yourLists'));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\ToDoList  $toDoList
	 * @return \Illuminate\Http\Response
	 */
	public function show(ToDoList $toDoList)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\ToDoList  $toDoList
	 * @return \Illuminate\Http\Response
	 */
	public function edit(ToDoList $toDoList)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\ToDoList  $toDoList
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, ToDoList $toDoList)
	{
		$status;
		if ($request->status === 'true') {
			$status = 1;
		} elseif ($request->status === 'false') {
			$status = 0;
		}
		DB::table('list_items')
			->where('id', $request->id)
			->update(['status' => $status]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\ToDoList  $toDoList
	 * @return \Illuminate\Http\Response
	 */
	public function destroyList(ToDoList $toDoList)
	{
		DB::table('lists')->where()->delete();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\ToDoList  $toDoList
	 * @return \Illuminate\Http\Response
	 */
	public function destroyListItem(ToDoList $toDoList)
	{
		DB::table('list_items')->where()->delete();
	}
}
