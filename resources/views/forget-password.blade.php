@extends('main')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-info">
{{ $message }}
</div>

@endif

<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card">
		<div class="card-header">Password Reset</div>
		<div class="card-body">
			
			<form action="{{ route('forget.password.post') }}" method="POST">
				@csrf
				
				<div class="form-group mb-3">
					<input type="text" name="email" class="form-control" placeholder="Email Address" />
					@if($errors->has('email'))
						<span class="text-danger">{{ $errors->first('email') }}</span>
					@endif
				</div>
				<p>We will send a link to your email</p>
				<div class="d-grid mx-auto">
					<button type="submit" class="btn btn-dark btn-block">Send</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection('content')