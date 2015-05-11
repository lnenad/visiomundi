@extends('app')

@section('content')
	<h2>Create a new article for "<i>{{$journal->name}}</i>" journal</h2>
	{!! Form::model(new App\Article,  ['method' => 'post', 'url' => $gen_url, 'class'=>'']) !!}
		@include('admin._article', ['submit_text' => 'Create Article'])
    {!! Form::close() !!}
@endsection