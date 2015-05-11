<div class="form-group">
    {!! Form::label('title', 'Title: ') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('keywords', 'Keywords: ') !!}
    {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('desc', 'Description: ') !!}
    {!! Form::text('desc', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Article body: ') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('category', 'Category: ') !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>