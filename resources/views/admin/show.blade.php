@extends('app')

@section('content')
<h1>List of articles listed for - {{$journal->name}}</h1><br />
<table class="table table-striped table-hover">
	<tr>
		<th class="col-md-1">ID</th>
		<th class="col-md-8">Title</th>
		<th class="col-md-3">Actions</th>
	</tr>
	@foreach ($articles as $article)
	<tr>
		<td ><a href="{{$journal->slug}}/{{$article->slug}}/edit">{{$article->id}}</a></td>
		<td><a href="{{$journal->slug}}/{{$article->slug}}/edit" title="Edit this article">{{$article->title}}</a></td>
		<td>
		<a class="btn btn-info btn-sm" href="{{$journal->slug}}/{{$article->slug}}/edit" role="button"><img src="{{ asset('/img/edits.png') }}"> Edit</a> 
		<a class="btn btn-danger btn-sm" href="#" role="button"><img src="{{ asset('/img/deletes.png') }}"> Delete</a>
		</td>
	</tr>
	@endforeach
</table>
@endsection