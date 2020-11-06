@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		@foreach ($lists as $list)
		<div class="col-md-3" style="border-style:solid; border-color:red;">
			<h2>{{$list->name}}</h2>
			<a href="{{url('/')}}/newListItem/{{$list->id}}">New list item</a>
			@foreach ($listItems as $listItem)
			@if ($listItem->List_id == $list->id)
			<div>
			<p>{{$listItem->name}}</p>
			<p>{{$listItem->description}}</p>
			<input type="checkbox" ><label for="status">DONE</label>
			</div>
			@endif
			@endforeach
		</div>
		@endforeach

		
		<div class="col-md-12">
		@if (!empty($lists))
			<p>you dont seem to have any lists yet</p>
		@endif
		<a class="nav-link" href="{{ url('/newList') }}">make a new list</a>
		</div>
	</div>
</div>

@endsection