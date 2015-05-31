@extends('app')

@section('content')
	<h2>Create a new journal</h2>
	{!! Form::model(new App\Journal,  ['route' => ['administration.store'], 'class'=>'']) !!}
        @include('admin._journal', ['submit_text' => 'Create Journal'])
    {!! Form::close() !!}
@endsection

@section('scripts')
<script src="{{ asset('/js/ckeditor.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
	CKEDITOR.replace( 'textbody' );
	CKEDITOR.replace( 'aboutbody' );
});
</script>
@endsection