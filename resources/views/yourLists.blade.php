@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		@if (empty($lists[0]))
			<p>you don't seem to have any lists yet</p>
		@endif
		
		@foreach ($lists as $list)
		<div class="col" style="border-style:solid; border-color:red;">
			<h2>{{$list->name}}</h2>
			<a href="{{url('/')}}/newListItem/{{$list->id}}"><button class="btn btn-secondary">New list item</button></a><br><br>
			
			@foreach ($listItems as $listItem)
			@if ($listItem->List_id == $list->id)
				<div style="border-style:solid; border-color:red;">
				<p>{{$listItem->name}}</p>
				<p>{{$listItem->description}}</p>
				
				<input type="checkbox" id={{$listItem->id}} @if ($listItem->status == 1)
				checked
				@endif
				><label for="status">DONE</label><br>
				
				<a href="{{ url('/')}}/editListItem/{{$listItem->id}}"><button class="btn btn-secondary">Edit item</button></a>
				<a href="{{ url('/')}}/deleteListItem/{{$listItem->id}}"><button class="btn btn-secondary">Delete item</button></a><br><br>
				</div>
			@endif
			@endforeach
			<br>
			<a href="{{ url('/')}}/deleteList/{{$list->id}}"><button class="btn btn-secondary">Delete list</button></a><br><br>
		</div>
		@endforeach
		
	</div>
	<a class="nav-link" href="{{ url('/newList') }}"><button class="btn btn-secondary">make a new list</button></a><br><br>
</div>

@endsection