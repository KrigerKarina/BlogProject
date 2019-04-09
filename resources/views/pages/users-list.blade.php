@extends('layout')

@section('content')
<div class="main-content">
    <div class="container">
    	<div class="box-header">
            <h3 class="box-title">Пользователи блога</h3>
        </div>
        <div class="row">
            <div class="col-md-8">
				<dl class="dl-horizontal">
	              <table id="example1" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Имя</th>
	                  <th>E-mail</th>
	                  <th>Аватар</th>
	                </tr>
	                </thead>
	                <tbody>
	                @foreach($lists as $list)
		                <tr>
		                  <td>{{$list->id}}</td>
		                  <td>{{$list->name}}</td>
		                  <td>{{$list->email}}</td>
		                  <td>
		                    <img src="{{$list->getImage()}}" alt="" class="img-responsive" width="150">
		                  </td>
		                </tr>
	                @endforeach
	            </table>
			</div>
 			@include('pages._sidebar')
		</div>
	</div>
</div>
@endsection