@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		@foreach ($lists as $list)
		<div class="col-md-3" style="border-style:solid; border-color:red;">
			<h2>{{$list->name}}</h2>
			<a href="{{url('/')}}/newListItem/{{$list->id}}">New list item</a>
		</div>
		@endforeach
	</div>
</div>

@endsection