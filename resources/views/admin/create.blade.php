@extends('app')

@section('content')
	<h2>Create a new journal</h2>
	{!! Form::model(new App\Journal,  ['route' => ['administration.store'], 'class'=>'']) !!}
        @include('admin._journal', ['submit_text' => 'Create Journal'])
    {!! Form::close() !!}
@endsection