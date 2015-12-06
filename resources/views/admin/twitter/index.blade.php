@extends('layout.admin')

@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Twitter <small>Manage Twitter interactions</small>
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Twitter</li>
            </ol>
        </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            @forelse($mentions as $mention)
                <a class="block block-rounded block-link-hover3" href="{{ route('admin.social.twitter.tweet.view', $mention->id) }}">
                    <div class="block-content block-content-full clearfix">
                        <div class="text-right pull-right push-10-t">
                            <div class="font-w600 push-5">{{ $mention->data->user->name }} <small><i>{{ $mention->data->user->screen_name }}</i></small></div>
                            <div class="text-muted">{{ $mention->data->text }}</div>
                        </div>
                        <div class="pull-left">
                            <img class="img-avatar" src="{{ $mention->data->user->profile_image_url_https }}" alt="">
                        </div>
                    </div>
                </a>
            @empty
                <a class="block block-rounded block-link-hover3" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="text-right pull-right push-10-t">
                            <div class="font-w600 push-5">Eric Lawson</div>
                            <div class="text-muted">Developer</div>
                        </div>
                        <div class="pull-left">
                            <img class="img-avatar" src="assets/img/avatars/avatar15.jpg" alt="">
                        </div>
                    </div>
                </a>
            @endif
            <!--<div class="block">
                <div class="block-content">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th>Name</th>
                                <th class="hidden-xs" style="width: 25%;">Email</th>
                                <th class="hidden-xs" style="width: 15%;">Status</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Evelyn Willis</td>
                                <td class="hidden-xs">
                                    <a href="#">demo@demo.com</a>
                                </td>
                                <td class="hidden-xs">
                                    <span class="label label-success">Active</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="View Client"><i class="gi gi-search"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Edit Client"><i class="gi gi-edit"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove Client"><i class="gi gi-close"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>Ann Parker</td>
                                <td class="hidden-xs">
                                    <a href="#">demo@example.com</a>
                                </td>
                                <td class="hidden-xs">
                                    <span class="label label-info">Staff</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="View Client"><i class="gi gi-search"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Edit Client"><i class="gi gi-edit"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove Client"><i class="gi gi-close"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>Ethan Howard</td>
                                <td class="hidden-xs">
                                    <a href="#">test@domain.com</a>
                                </td>
                                <td class="hidden-xs">
                                    <span class="label label-danger">Banned</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="View Client"><i class="gi gi-search"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Edit Client"><i class="gi gi-edit"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove Client"><i class="gi gi-close"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>Eugene Burke</td>
                                <td class="hidden-xs">
                                    <a href="#">sample@company.com</a>
                                </td>
                                <td class="hidden-xs">
                                    <span class="label label-success">Active</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="View Client"><i class="gi gi-search"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Edit Client"><i class="gi gi-edit"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove Client"><i class="gi gi-close"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>Rebecca Gray</td>
                                <td class="hidden-xs">
                                    <a href="#">user@demo.com</a>
                                </td>
                                <td class="hidden-xs">
                                    <span class="label label-warning">Flagged</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="View Client"><i class="gi gi-search"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Edit Client"><i class="gi gi-edit"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove Client"><i class="gi gi-close"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td>Megan Dean</td>
                                <td class="hidden-xs">
                                    <a href="#">test@example.com</a>
                                </td>
                                <td class="hidden-xs">
                                    <span class="label label-success">Active</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="View Client"><i class="gi gi-search"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Edit Client"><i class="gi gi-edit"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove Client"><i class="gi gi-close"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>-->
        </div>
    </div>
</div>
@stop
