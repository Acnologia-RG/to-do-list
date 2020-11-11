@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<br>
		@auth
			<div class="col">
			<form action="{{url('/createNewList')}}" method='POST'>
			@csrf
			@method('POST')
				<h5>List name</h5>
				<input class="text" type="text" required name="listName"> <br><br>
				<input class="btn btn-secondary" type="submit" value="make new list">
			</div>
		@else
			<p>please login to make a list. <br>
			you can login from the top right</p>
			<p>BTW how the fuck did you get here?</p>
		@endauth
	</div>
</div>

@endsection