@extends('layouts.app')

@section('title')
  Login page
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8" id="login">
			<div class="card">
				<div class="card-header"><a href=""> <img id="logo" src="{{ asset('images/bigscreen_logo.png') }}"> </a></div>

				<div class="card-body">
					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group">
							<div>
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="your email" autofocus>

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group">
							<div>
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="your password">

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group mb-0">
							<div class="col-md-8">
								<button type="submit" class="btn btn-primary">
									{{ __('Login') }}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
