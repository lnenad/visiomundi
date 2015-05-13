@extends('app')

@section('content')
	<h2>Edit "<i>{{$journal->name}}</i>" journal</h2>
	{!! Form::model($journal, ['method' => 'PATCH', 'route' => ['administration.update', $journal->slug]]) !!}
        @include('admin._journal', ['submit_text' => 'Edit Journal'])
    {!! Form::close() !!}
@endsection