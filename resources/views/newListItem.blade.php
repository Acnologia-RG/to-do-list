@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<br>
		@auth
			<div class="col">
			<form action="{{url('/createNewListItem')}}" method='POST'>
			@csrf
			@method('POST')
				<h5>List name</h5>
				<input class="text" type="text" name="listName">
				<h5>description</h5>
				<input class="text" type="text" name="description">
				<input type="hidden" type="number" name="List_id" value="{{$id}}">
				<input class="btn btn-secondary" type="submit" value="make new list item">
			</div>
		@else
			<p>please login to make a list item for the selected list. <br>
			you can login from the top right</p>
			<p>BTW how the fuck did you get here?</p>
		@endauth
	</div>
</div>

@endsection