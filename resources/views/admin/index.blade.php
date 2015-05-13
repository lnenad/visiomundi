@extends('app')

@section('content')
<div class="col-md-8"><h1>List of journals</h1><br /></div>
<div class="col-md-4"> 
	<a class="btn btn-info btn-sm" style="margin-top: 20px;" href="administration/journal/create" role="button"><img src="{{ asset('/img/create.png') }}"> Create a new journal</a></div>
<table class="table table-striped table-hover">
	<tr>
		<th class="col-md-1">ID</th>
		<th class="col-md-5">Name</th>
		<th class="col-md-3">Last update</th>
		<th class="col-md-3">Actions</th>
	</tr>
	@foreach ($journals as $journal)
	<tr>
		<td ><a href="administration/{{$journal->slug}}">{{$journal->id}}</a></td>
		<td><a href="administration/{{$journal->slug}}">{{$journal->name}}</a></td>
		<td >{{$journal->updated_at}}</td>
		<td>
		<a class="btn btn-info btn-sm" href="administration/{{$journal->slug}}/edit" role="button"><img src="{{ asset('/img/edits.png') }}"> Edit</a> 
	    {!! Form::open(array('id' => 'deleteform'.$journal->id, 'class' => 'form-inline', 'style' => 'display: inline;', 'method' => 'delete', 'route' => array('administration.destroy', $journal->slug))) !!}
			<a class="btn btn-danger btn-sm" href="#" role="button" onClick="deletejournal({{$journal->id}})"><img src="{{ asset('/img/deletes.png') }}"> Delete</a>
		{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
</table>
@endsection

@section('scripts')
<script type="text/javascript">
function deletejournal(journal_id) {
	var r = confirm("Are you sure you want to delete this journal?");
		if (r == true) {
			var journalform = '#deleteform'+journal_id;
		    $(journalform).submit();
		    console.log(journalform);

		}
}
</script>
@endsection