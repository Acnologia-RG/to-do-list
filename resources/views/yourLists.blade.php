@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		@foreach()
		<div class="col">
			<h2>{{}}</h2>
		</div>
		@endforeach
	</div>
</div>

@endsection