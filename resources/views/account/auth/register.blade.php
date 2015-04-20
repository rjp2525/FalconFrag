@extends('layout.primary')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['action' => 'AuthController@postRegister', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('first_name', trans('forms.register.labels.first_name'), ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => trans('forms.register.placeholders.first_name')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('last_name', trans('forms.register.labels.last_name'), ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => trans('forms.register.placeholders.last_name')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('company', trans('forms.register.labels.company'), ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('company', old('company'), ['class' => 'form-control', 'placeholder' => trans('forms.register.placeholders.company')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('username', trans('forms.register.labels.username'), ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => trans('forms.register.placeholders.username')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('email', trans('forms.register.labels.email'), ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('forms.register.placeholders.email')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('password', trans('forms.register.labels.password'), ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('forms.register.placeholders.password')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', trans('forms.register.labels.password_repeat'), ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('forms.register.placeholders.password_repeat')]) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop