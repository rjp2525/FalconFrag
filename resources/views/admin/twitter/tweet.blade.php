@extends('layout.admin')

@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                View Tweet <small>Respond to Tweets</small>
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Twitter</li>
                <li>Tweet</li>
            </ol>
        </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <?php $d = json_decode($tweet->data); ?>
            <div class="block block-link-hover3" href="{{ Twitter::linkUser($d->user) }}" target="_blank">
                <div class="block-content block-content-full text-center bg-image" style="background-image: url('{{ $d->user->profile_background_image_url_https }}');">
                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ $d->user->profile_image_url_https }}" alt="{{ $d->user->name }}">
                </div>
                <!--<div class="block-content block-content-full text-center">
                    <div>
                        <img class="img-avatar img-avatar96" src="{{ $d->user->profile_image_url_https }}" alt="{{ $d->user->name }}">
                        @if($d->user->protected)
                            <i class="fa fa-lock text-danger" style=""></i>
                        @endif
                    </div>
                    <div class="h5 push-15-t push-5">{{ $d->user->name }}</div>
                </div>-->
                <div class="block-content block-content-mini block-content-full bg-gray-lighter">
                    <div class="text-center text-muted"><i>{{ '@'.$d->user->screen_name }}</i></div>
                </div>
                <div class="block-content">
                    <div class="row items-push text-center">
                        <div class="col-xs-6">
                            <div class="push-5"><i class="fa fa-line-chart"></i></div>
                            <div class="h5 font-w300 text-muted">{{ $d->user->followers_count }} Followers</div>
                        </div>
                        <div class="col-xs-6">
                            <div class="push-5"><i class="fa fa-comment"></i></div>
                            <div class="h5 font-w300 text-muted">{{ $d->user->statuses_count }} Tweets</div>
                        </div>
                    </div>
                </div>
                <div class="js-chat-talk overflow-y-auto block-content block-content-full" data-chat-id="3" style="height: 200px;">
                    <div class="font-s12 text-muted text-center push-20-t push-15"><em>{{ Carbon::createFromFormat('D M d H:i:s O Y', $d->created_at)->setTimezone('EST')->diffForHumans() }}</em></div>
                    <div class="block block-rounded block-transparent push-15 push-50-l">
                        <div class="block-content block-content-full block-content-mini bg-gray-lighter">{!! Twitter::linkify(e($d->text)) !!}</div>
                    </div>
                    <!--<div class="font-s12 text-muted text-center push-20-t push-10"><em>Today</em></div>
                    <div class="block block-rounded block-transparent push-15 push-50-r">
                        <div class="block-content block-content-full block-content-mini bg-gray-light">Hi!!!</div>
                    </div>-->
                </div>
                <div class="js-chat-form block-content block-content-full block-content-mini">
                    <form action="{{ route('admin.social.twitter.tweet.reply', $tweet->id) }}" method="POST">
                        <input class="js-chat-input form-control" id="message" name="message" type="text" data-target-chat-id="5" placeholder="Respond to {{ '@'.$d->user->screen_name }}">
                    </form>
                </div>
            </div>
        </div>
        <!--<div class="col-sm-6 col-lg-3">
            <div class="block">
                <div class="block-content">
                    <ul class="nav-users push">
                        <li>
                            <a href="{{ Twitter::linkUser($d->user) }}" target="_blank">
                                <img class="img-avatar" src="{{ $d->user->profile_image_url_https }}" alt="{{ $d->user->name }}">
                                @if($d->user->protected)
                                    <i class="fa fa-lock text-danger"></i>
                                @endif
                                {{ $d->user->name }}
                                <div class="font-w400 text-muted"><small>{{ $d->user->screen_name }}</small></div>
                            </a>
                            <div class="block-content block-content-mini block-content-full bg-gray-lighter">
                                <div class="text-center text-muted">Web Developer</div>
                            </div>
                            <div class="block-content block-content-full block-content-mini text-center">
                                <strong>{{ $d->user->followers_count }}</strong> Followers
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>-->
        <!--<div class="col-sm-6 col-lg-3">
            <a class="block block-link-hover1 text-center" href="javascript:void(0)">
                <div class="block-content block-content-full bg-info">
                    <i class="fa fa-twitter fa-2x text-white"></i>
                </div>
                <div class="block-content block-content-full block-content-mini">
                    <strong>{{ $d->user->followers_count }}</strong> Followers
                </div>
            </a>
        </div>-->
    </div>
</div>
@stop
