@extends('layout.default')

@section('content')
<div class="page-head servers">
    <div class="container">
        <div class="col-xs-12 col-sm-6">
            <h4 class="page-head-title">Network Status</h4>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <a href="{{ route('default.home') }}">Home</a>
                    </li>
                    <li>
                        <span>Network</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title center spacer-bottom-sm"><span>Game</span> Services</h3>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <ul class="list-group">
                            <li class="list-group-item service-status">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span>
                                            <div class="service-icon online">
                                                <span class="fa fa-check fa-fw"></span>
                                            </div>
                                            Minecraft
                                        </span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="uptime">
                                            <div class="progress">
                                                <div class="progress-bar green" role="progressbar" aria-valuenow="98.5" aria-valuemin="0" aria-valuemax="100" style="width: 98.5%;"></div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item service-status">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span>
                                            <div class="service-icon high-latency">
                                                <span class="fa fa-warning fa-fw"></span>
                                            </div>
                                            Ark: Survival Evolved
                                        </span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="uptime">
                                            <div class="progress">
                                                <div class="progress-bar yellow" role="progressbar" aria-valuenow="93.5" aria-valuemin="0" aria-valuemax="100" style="width: 93.5%;"></div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item service-status">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span>
                                            <div class="service-icon offline">
                                                <span class="fa fa-times fa-fw"></span>
                                            </div>
                                            7 Days to Die
                                        </span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="uptime">
                                            <div class="progress">
                                                <div class="progress-bar red" role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100" style="width: 63%;"></div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <ul class="list-group">
                            <li class="list-group-item service-status">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span>
                                            <div class="service-icon online">
                                                <span class="fa fa-check fa-fw"></span>
                                            </div>
                                            Battlefield 4
                                        </span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="uptime">
                                            <div class="progress">
                                                <div class="progress-bar green" role="progressbar" aria-valuenow="98.5" aria-valuemin="0" aria-valuemax="100" style="width: 98.5%;"></div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item service-status">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span>
                                            <div class="service-icon online">
                                                <span class="fa fa-check fa-fw"></span>
                                            </div>
                                            Counter Strike: Global Offensive
                                        </span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="uptime">
                                            <div class="progress">
                                                <div class="progress-bar green" role="progressbar" aria-valuenow="95.8" aria-valuemin="0" aria-valuemax="100" style="width: 95.8%;"></div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item service-status">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span>
                                            <div class="service-icon online">
                                                <span class="fa fa-check fa-fw"></span>
                                            </div>
                                            DayZ Standalone
                                        </span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="uptime">
                                            <div class="progress">
                                                <div class="progress-bar green" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%;" data-toggle="tooltip" data-placement="top" title="22ms"></div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title center spacer-bottom-sm"><span>Web</span> Services</h3>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <ul class="list-group">
                            <li class="list-group-item service-status">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span>
                                            <div class="service-icon online">
                                                <span class="fa fa-check fa-fw"></span>
                                            </div>
                                            Control Panel
                                        </span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="uptime">
                                            <div class="progress">
                                                <div class="progress-bar green" role="progressbar" aria-valuenow="98.5" aria-valuemin="0" aria-valuemax="100" style="width: 98.5%;"></div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item service-status">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span>
                                            <div class="service-icon online">
                                                <span class="fa fa-check fa-fw"></span>
                                            </div>
                                            Domains
                                        </span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="uptime">
                                            <div class="progress">
                                                <div class="progress-bar green" role="progressbar" aria-valuenow="98.5" aria-valuemin="0" aria-valuemax="100" style="width: 98.5%;"></div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item service-status">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span>
                                            <div class="service-icon online">
                                                <span class="fa fa-check fa-fw"></span>
                                            </div>
                                            Email
                                        </span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="uptime">
                                            <div class="progress">
                                                <div class="progress-bar green" role="progressbar" aria-valuenow="98.5" aria-valuemin="0" aria-valuemax="100" style="width: 98.5%;"></div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <ul class="list-group">
                            <li class="list-group-item service-status">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span>
                                            <div class="service-icon online">
                                                <span class="fa fa-check fa-fw"></span>
                                            </div>
                                            MySQL
                                        </span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="uptime">
                                            <div class="progress">
                                                <div class="progress-bar green" role="progressbar" aria-valuenow="98.5" aria-valuemin="0" aria-valuemax="100" style="width: 98.5%;"></div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item service-status">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span>
                                            <div class="service-icon online">
                                                <span class="fa fa-check fa-fw"></span>
                                            </div>
                                            FTP
                                        </span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="uptime">
                                            <div class="progress">
                                                <div class="progress-bar green" role="progressbar" aria-valuenow="98.5" aria-valuemin="0" aria-valuemax="100" style="width: 98.5%;"></div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item service-status">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span>
                                            <div class="service-icon online">
                                                <span class="fa fa-check fa-fw"></span>
                                            </div>
                                            CDN
                                        </span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="uptime">
                                            <div class="progress">
                                                <div class="progress-bar green" role="progressbar" aria-valuenow="98.5" aria-valuemin="0" aria-valuemax="100" style="width: 98.5%;"></div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="call-to">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>We're hiring!</h2>
                <p>If you have experience with networking, system administration, customer service or management, send us your resume and we'd love to talk with you!</p>
            </div>
            <div class="col-md-2 button">
                <button type="button" class="btn btn-default">Apply</button>
            </div>
        </div>
    </div>
</section>
@stop
