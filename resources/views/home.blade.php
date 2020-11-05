@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Welcome to the to-do list manager</div>

				<div class="card-body">
					@auth
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
							{{ __('You are logged in!') }}
							<p>now you can make your own to-do lists and look at the ones you already made</p>
							<p><a class="nav-link" href="{{ url('/newList') }}">make a new list</a>
							or <br>
							<a href="{{ url('/yourLists') }}">look at your already made lists</a></p>
						</div>
					@else
						<div>
							<p>please login to make and see your own to-do lists</p>
						</div>
					@endauth
				</div>
			</div>
		</div>
	</div>
</div>
@endsection