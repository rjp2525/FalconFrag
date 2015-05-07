@extends('layout.primary')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            @include('layout.partial.messages.notice')

            {!! Form::open(['action' => 'AuthController@postLogin', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('email', trans('forms.login.labels.email'), ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('forms.login.placeholders.email')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('password', trans('forms.login.labels.password'), ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('forms.login.placeholders.password')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        {!! Form::checkbox('remember', 'yes', old('remember')) !!} {!! trans('forms.login.remember') !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        {!! Form::submit(trans('forms.login.login_button'), ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
