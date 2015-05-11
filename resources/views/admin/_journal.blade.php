<div class="form-group">
    {!! Form::label('name', 'Name: ') !!}
    {!! Form::text('name',null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Image: ') !!}
    {!! Form::text('image',null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('about', 'About: ') !!}
    {!! Form::textarea('about', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('contact_email', 'Contact email: ') !!}
    {!! Form::text('contact_email',null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('contact_info', 'Contact info: ') !!}
    {!! Form::textarea('contact_info',null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>