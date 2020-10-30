<?php

namespace App\Http\Controllers;

use App\ToDoList;
use Illuminate\Http\Request;
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
		$Lists = Lists::where('Lists.user_id', Auth::user()->id)
        ->join('categories', 'category_id', '=','categories.id')
        ->select('articles.id','name', 'price', 'description', 'category_name')
        ->first();
		return view('yourLists', compact('Lists'));
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
		DB::table('Lists')->insertOrIgnore([
			"name" => $request->listName
		]);
		return redirect(url('/yourLists'));
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\ToDoList  $toDoList
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(ToDoList $toDoList)
	{
		//
	}
}
