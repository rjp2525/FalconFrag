@extends('layout.client')

@section('content')
<div style="padding-top: 80px;"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="js-wizard-validation block">
                <ul class="nav nav-tabs nav-tabs-alt nav-justified">
                    <li class="active">
                        <a href="#register-personal" data-toggle="tab">Personal</a>
                    </li>
                    <li>
                        <a href="#register-address" data-toggle="tab">Address</a>
                    </li>
                </ul>
                {!! Form::open(['route' => 'admin.dashboard', 'method' => 'POST', 'class' => 'js-form-register form-horizontal form-register']) !!}
                    <div class="block-content tab-content">
                        <div class="tab-pane fade fade-right in active" id="register-personal">
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="first_name" name="first_name" value="Demo">
                                        <label for="first_name">First Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="last_name" name="last_name" value="User">
                                        <label for="last_name">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="username" name="username" value="demouser">
                                        <label for="username">Username</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="email" id="email" name="email" value="demo@demo.com">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="company" name="company">
                                        <label for="company">Company</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="phone" name="phone" value="6031234567">
                                        <label for="phone">Phone</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="password" id="password" name="password" value="SamplePassword1!">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" value="SamplePassword1!">
                                        <label for="password_confirmation">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade fade-right" id="register-address">
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="address1" name="address1">
                                        <label for="address1">Address 1</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="address2" name="address2">
                                        <label for="address2">Address 2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="city" name="city">
                                        <label for="city">City</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="state" name="state">
                                        <label for="state">State/Province</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="postcode" name="postcode">
                                        <label for="postcode">Postal Code</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="country" name="country">
                                        <label for="country">Country</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="security_question" name="security_question">
                                        <label for="security_question">Security Question</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="security_answer" name="security_answer">
                                        <label for="security_answer">Security Answer</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-mini block-content-full border-t">
                        <div class="row">
                            <div class="col-xs-6">
                                <button class="wizard-prev btn btn-warning" type="button">Previous</button>
                            </div>
                            <div class="col-xs-6 text-right">
                                <button class="wizard-next btn btn-success" type="button">Next</button>
                                <button class="wizard-finish btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
