@extends('layouts.header')
@section('title','Registro de usuario')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registrarse</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						{!! csrf_field() !!}

						<div class="form-group">
							<label class="col-md-4 control-label">First name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Last name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="last_name" value="{{old('last_name')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">User name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="user" value="{{old('user')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Occupation</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="occupation" value="{{old('occupation')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Birthday</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="birthday" value="{{old('birthday')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">CI</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="ci" value="{{old('ci')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Address</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="address" value="{{old('address')}}">
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
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
