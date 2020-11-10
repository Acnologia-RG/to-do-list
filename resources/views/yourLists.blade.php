@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		@if (empty($lists[0]))
			<p>you dont seem to have any lists yet</p>
		@endif
		
		@foreach ($lists as $list)
		<div class="col-3" style="border-style:solid; border-color:red;">
			<h2>{{$list->name}}</h2>
			<a href="{{url('/')}}/newListItem/{{$list->id}}">New list item</a>
			@foreach ($listItems as $listItem)
			@if ($listItem->List_id == $list->id)
			<div style="border-style:solid; border-color:red;">
			<p>{{$listItem->name}}</p>
			<p>{{$listItem->description}}</p>
			
			<input type="checkbox" @if ($listItem->status == 1)
			checked
			@endif
			><label for="status">DONE</label>
			
			</div>
			@endif
			@endforeach
		</div>
		@endforeach
		
		</div>
		<a class="nav-link" href="{{ url('/newList') }}">make a new list</a>
	</div>
</div>

<script src="{{ asset('js/check.js') }}" defer></script>
@endsection