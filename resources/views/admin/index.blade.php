@extends('app')

@section('content')
<h1>List of journals</h1><br />
<table class="table table-striped table-hover">
	<tr>
		<th class="col-md-1">ID</th>
		<th class="col-md-8">Name</th>
		<th class="col-md-3">Actions</th>
	</tr>
	@foreach ($journals as $journal)
	<tr>
		<td ><a href="administration/{{$journal->slug}}">{{$journal->id}}</a></td>
		<td><a href="administration/{{$journal->slug}}">{{$journal->name}}</a></td>
		<td>
		<a class="btn btn-info btn-sm" href="administration/{{$journal->slug}}/edit" role="button"><img src="{{ asset('/img/edits.png') }}"> Edit</a> 
		<a class="btn btn-danger btn-sm" href="administration/{{$journal->slug}}/edit" role="button"><img src="{{ asset('/img/deletes.png') }}"> Delete</a>
		</td>
	</tr>
	@endforeach
</table>
@endsection