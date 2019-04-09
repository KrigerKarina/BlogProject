@extends('layouts.app')
@section('content')
@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif
<div class="container">


  <hr/>
   <form class="form-horizontal" action="{{route('profile.update', $user)}}" method="post">
   	 {{ method_field('PUT') }}
    {{ csrf_field() }}
	<div class="container-fluid wrapper">
	<label for="">Имя</label>
	<input type="text" class="form-control" name="name" placeholder="Имя" value="@if(old('name')){{old('name')}}@else{{$user->name or ""}}@endif" required>

	<label for="">Email</label>
	<input type="text" class="form-control" name="email" placeholder="Email" value="@if(old('email')){{old('email')}}@else{{$user->email or ""}}@endif" required>

	<label for="">Пароль</label>
	<input type="password" class="form-control" name="password">

	<label for="">Подтверждение пароля</label>
	<input type="password" class="form-control" name="password_confirmation">

	<hr/>

	<input class="btn btn-primary" type="submit" value="Сохранить">
	</div>
	</form>
</div>

@endsection