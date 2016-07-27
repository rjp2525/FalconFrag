@extends('layout.admin')

@section('content')
<div class="content bg-image overflow-hidden" style="background-image: url('{{ url('img/admin/colocation.jpg') }}');">
    <div class="push-50-t push-15">
        <h1 class="h2 text-white animated zoomIn">Dashboard</h1>
        <h2 class="h5 text-white-op animated zoomIn">Welcome Demo</h2>
    </div>
</div>
<div class="content bg-white border-b">
    <div class="row items-push text-uppercase">
        <div class="col-xs-6 col-sm-3">
            <div class="text-gray-darker animated fadeIn">Product Sales</div>
            <div class="text-muted animated fadeIn">
                <small>
                    <i class="gi gi-time"></i> Today
                </small>
            </div>
            <a class="h2 text-primary animated flipInX" href="#">$300</a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="text-gray-darker animated fadeIn">Income</div>
            <div class="text-muted animated fadeIn">
                <small>
                    <i class="gi gi-calendar"></i> This Month
                </small>
            </div>
            <a class="h2 text-primary animated flipInX" href="#">$12,790</a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="text-gray-darker animated fadeIn">Open Tickets</div>
            <div class="text-muted animated fadeIn">
                <small>
                    <i class="gi gi-help"></i> Awaiting Reply
                </small>
            </div>
            <a class="h2 text-danger animated flipInX" href="#">18</a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="text-gray-darker animated fadeIn">Pending Orders</div>
            <div class="text-muted animated fadeIn">
                <small>
                    <i class="gi gi-alert-triangle"></i> Manual Activation
                </small>
            </div>
            <a class="h2 text-warning animated flipInX" href="#">6</a>
        </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo">
                                <i class="gi gi-refresh"></i>
                            </button>
                        </li>
                    </ul>
                    <h3 class="block-title">Weekly Overview</h3>
                </div>
                <div class="block-content block-content-full bg-gray-lighter text-center">
                    <div style="height: 425px;">
                        <canvas class="dashboard-income-chart"></canvas>
                    </div>
                </div>
                <div class="block-content text-center">
                    <div class="row items-push text-center">
                        <div class="col-xs-6 col-lg-3">
                            <div class="push-10">
                                <i class="gi gi-trending-up gi-2x"></i>
                            </div>
                            <div class="h5 font-w300 text-muted">+205 Sales</div>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <div class="push-10">
                                <i class="gi gi-accounts gi-2x"></i>
                            </div>
                            <div class="h5 font-w300 text-muted">+25 Clients</div>
                        </div>
                        <div class="col-xs-6 col-lg-3 visible-lg">
                            <div class="push-10">
                                <i class="gi gi-star gi-2x"></i>
                            </div>
                            <div class="h5 font-w300 text-muted">+10 Reviews</div>
                        </div>
                        <div class="col-xs-6 col-lg-3 visible-lg">
                            <div class="push-10">
                                <i class="gi gi-receipt gi-2x"></i>
                            </div>
                            <div class="h5 font-w300 text-muted">+14 Services</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="test">
                                <i class="gi gi-refresh"></i>
                            </button>
                        </li>
                    </ul>
                    <h3 class="block-title">Recent Orders</h3>
                </div>
                <div class="block-content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-xs-4">
                            <div class="text-muted">
                                <small>
                                    <i class="gi gi-time"></i> 24 hrs
                                </small>
                            </div>
                            <div class="font-w600">18 Sales</div>
                        </div>
                        <div class="col-xs-4">
                            <div class="text-muted">
                                <small>
                                    <i class="gi gi-calendar"></i> 7 days
                                </small>
                            </div>
                            <div class="font-w600">41 Sales</div>
                        </div>
                        <div class="col-xs-4 h1 font-w300 text-right">$865</div>
                    </div>
                </div>
                <div class="block-content">
                    <div class="pull-t pull-r-l">
                        <div class="js-slider remove-margin-b" data-slider-autoplay="true" data-slider-autoplay-speed="2500">
                            <div>
                                <table class="table remove-margin-b font-s13">
                                    <tbody>
                                        <tr>
                                            <td class="font-w600">
                                                <a href="javascript:void(0)">Minecraft Server</a>
                                            </td>
                                            <td class="hidden-xs text-muted text-right" style="width: 70px;">23:01</td>
                                            <td class="font-w600 text-success text-right" style="width: 70px;">+ $21</td>
                                        </tr>
                                        <tr>
                                            <td class="font-w600"><a href="javascript:void(0)">Minecraft Server</a></td>
                                            <td class="hidden-xs text-muted text-right">22:15</td>
                                            <td class="font-w600 text-success text-right">+ $52</td>
                                        </tr>
                                        <tr>
                                            <td class="font-w600"><a href="javascript:void(0)">Web Hosting</a></td>
                                            <td class="hidden-xs text-muted text-right">22:01</td>
                                            <td class="font-w600 text-success text-right">+ $16</td>
                                        </tr>
                                        <tr>
                                            <td class="font-w600"><a href="javascript:void(0)">Virtual Private Server</a></td>
                                            <td class="hidden-xs text-muted text-right">21:45</td>
                                            <td class="font-w600 text-success text-right">+ $23</td>
                                        </tr>
                                        <tr>
                                            <td class="font-w600"><a href="javascript:void(0)">Dedicated Server</a></td>
                                            <td class="hidden-xs text-muted text-right">21:15</td>
                                            <td class="font-w600 text-success text-right">+ $48</td>
                                        </tr>
                                        <tr>
                                            <td class="font-w600"><a href="javascript:void(0)">Minecraft Server</a></td>
                                            <td class="hidden-xs text-muted text-right">20:11</td>
                                            <td class="font-w600 text-success text-right">+ $23</td>
                                        </tr>
                                        <tr>
                                            <td class="font-w600"><a href="javascript:void(0)">Voice Server</a></td>
                                            <td class="hidden-xs text-muted text-right">20:01</td>
                                            <td class="font-w600 text-success text-right">+ $50</td>
                                        </tr>
                                        <tr>
                                            <td class="font-w600"><a href="javascript:void(0)">Voice Server</a></td>
                                            <td class="hidden-xs text-muted text-right">19:35</td>
                                            <td class="font-w600 text-success text-right">+ $16</td>
                                        </tr>
                                        <tr>
                                            <td class="font-w600"><a href="javascript:void(0)">Dedicated Server</a></td>
                                            <td class="hidden-xs text-muted text-right">19:17</td>
                                            <td class="font-w600 text-success text-right">+ $60</td>
                                        </tr>
                                        <tr>
                                            <td class="font-w600"><a href="javascript:void(0)">Add Funds</a></td>
                                            <td class="hidden-xs text-muted text-right">17:49</td>
                                            <td class="font-w600 text-success text-right">+ $59</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo">
                                <i class="gi gi-refresh"></i>
                            </button>
                        </li>
                    </ul>
                    <h3 class="block-title">Security <small class="text-muted">({{ count($history) }} audits in the past 24 hours)</small></h3>
                </div>
                <div class="block-content">
                <div class="block-content block-content-full">
                    <div data-toggle="slimscroll">
                        <ul class="list list-activity push">
                            @forelse($history as $item)
                                <li>
                                    @if($item->key == 'created_at' && !$item->old_value)
                                        <i class="fa fa-plus text-success"></i>
                                        <div class="font-w600">{{ $item->userResponsible()->name or 'System' }} created a resource</div>
                                        <div><a href="javascript:void(0)">{{ $item->revisionable_type }}</a></div>
                                        <div><small title="{{ $item->created_at }}" class="text-muted">{{ $item->created_at->diffForHumans() }}</small></div>
                                    @elseif($item->key == 'deleted_at' || is_null($item->new_value))
                                        <i class="fa fa-times text-danger"></i>
                                        <div class="font-w600">{{ $item->userResponsible()->name or 'System' }} deleted a resource</div>
                                        <div><a href="javascript:void(0)">{{ $item->revisionable_type }}</a></div>
                                        <div><small title="{{ $item->created_at }}" class="text-muted">{{ $item->created_at->diffForHumans() }}</small></div>
                                    @else
                                        <i class="fa fa-pencil text-primary"></i>
                                        <div class="font-w600">{{ $item->userResponsible()->name or 'System' }} edited a resource</div>
                                        <div><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Modified '{{ $item->fieldName() }}' field">{{ $item->revisionable_type }}</a></div>
                                        <div><small title="{{ $item->created_at }}" class="text-muted">{{ $item->created_at->diffForHumans() }}</small></div>
                                    @endif
                                </li>
                            @empty
                                <li>
                                    <i class="fa fa-exclamation-triangle text-warning"></i>
                                    <div class="font-w600">No history available for the past 24 hours.</div>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
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
                {!! Form::open(['route' => 'admin.dashboard', 'method' => 'POST', 'class' => 'js-form-register form-horizontal']) !!}
                    <div class="block-content tab-content">
                        <div class="tab-pane fade fade-right in push-30-t push-50 active" id="register-personal">
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
                        <div class="tab-pane fade fade-right push-30-t push-50" id="register-address">
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
@stop

@section('scripts')
{!! HTML::script(elixir('js/admin/pages/dashboard.js')) !!}
@stop
