@extends('app')

@section('content')
	<h2>Edit "<i>{{$article->title}}</i>" article</h2>
	{!! Form::model($article, ['method' => 'PATCH', 'route' => ['administration.updatearticle', $journal, $article->slug]]) !!}
        @include('admin._article', ['submit_text' => 'Edit Article'])
    {!! Form::close() !!}
@endsection

@section('scripts')
<script src="{{ asset('/js/ckeditor.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
	CKEDITOR.replace( 'textbody' );
});
</script>
@endsection