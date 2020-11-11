@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<br>
		@auth
			<div class="col">
			<form action="{{url('/updateListItem')}}" method='POST'>
			@csrf
			@method('POST')
				<h4>List name</h4>
				<input class="text" type="text" value="{{$listItem[0]->name}}" required name="listItemName"><br><br>
				<h4>description</h4>
				<textarea rows="8" cols="60" name="description">{{$listItem[0]->description}}</textarea>
				<input type="hidden" type="number" name="List_id" value="{{$listItem[0]->id}}"><br><br>
				<input class="btn btn-secondary" type="submit" value="update list item">
			</div>
		@else
			<p>please login to make a list item for the selected list. <br>
			you can login from the top right</p>
			<p>BTW how the fuck did you get here?</p>
		@endauth
	</div>
</div>

@endsection