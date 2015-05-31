@extends('app')

@section('content')
<div class="col-md-8"><h1>List of articles listed for - {{$journal->name}}</h1><br /></div>
<div class="col-md-4">
	<a class="btn btn-info btn-sm" style="margin-top: 20px;" href="{{$journal->slug}}/article/create" role="button"><img src="{{ asset('/img/create.png') }}"> Create a new article</a> 
	<a class="btn btn-info btn-sm" style="margin-top: 20px;" href="{{$journal->slug}}/edit" role="button"><img src="{{ asset('/img/edit.png') }}"> Edit this journal</a> 
</div> 
<table class="table table-striped table-hover">
	<tr>
		<th class="col-md-1">ID</th>
		<th class="col-md-4">Title</th>
		<th class="col-md-3">Users</th>
		<th class="col-md-2">Last update</th>
		<th class="col-md-2">Actions</th>
	</tr>
	@foreach ($articles as $article)
	<tr>
		<td ><a href="{{$journal->slug}}/{{$article->slug}}/edit">{{$article->id}}</a></td>
		<td><a href="{{$journal->slug}}/{{$article->slug}}/edit" title="Edit this article">{{$article->title}}</a></td>
		<td>
			@foreach ($article->users as $user)
				{{$user->name}}
			@endforeach
		</td>
		<td >{{$article->updated_at}}</td>
		<td>
		<a class="btn btn-info btn-sm" href="{{$journal->slug}}/{{$article->slug}}/edit" role="button"><img src="{{ asset('/img/edits.png') }}"> Edit</a> 
	    {!! Form::open(array('id' => 'deleteform'.$article->id, 'class' => 'form-inline', 'style' => 'display: inline;', 'method' => 'delete', 'route' => array('administration.destroyarticle', $journal->slug, $article->slug))) !!}
			<a class="btn btn-danger btn-sm" href="#" role="button" onClick="deletearticle({{$article->id}})"><img src="{{ asset('/img/deletes.png') }}"> Delete</a>
		{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
</table>
@endsection

@section('scripts')
<script type="text/javascript">
function deletearticle(article_id) {
	var r = confirm("Are you sure you want to delete this article?");
		if (r == true) {
			var articleform = '#deleteform'+article_id;
		    $(articleform).submit();
		    console.log(articleform);

		}
}
</script>
@endsection