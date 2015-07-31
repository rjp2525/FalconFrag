@extends('layout.default')

@section('content')
<div class="page-head servers">
    <div class="container">
        <div class="col-xs-12 col-sm-6">
            <h4 class="page-head-title">About</h4>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <a href="{{ route('default.home') }}">Home</a>
                    </li>
                    <li>
                        <span>About</span>
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
            <div class="col-md-9">
                <h3 class="section-title">About <span>Falcon Frag</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce egestas mollis enim quis posuere. Donec aliquam leo sapien, id feugiat dolor ullamcorper sit amet. Maecenas et diam sed dui gravida venenatis. Integer mollis dignissim tristique. Suspendisse ornare velit in orci mattis, et finibus tortor mattis. Mauris scelerisque risus sed nisi rhoncus, nec sollicitudin risus tincidunt. Sed sem velit, pulvinar vel orci vel, mollis ullamcorper nisi. Ut molestie, orci eu maximus ullamcorper, mi leo pulvinar ligula, molestie tempus ligula nulla sit amet erat. Cras accumsan, elit aliquam fermentum varius.</p>
                <p>Nam aliquam, dui id porta consectetur, tellus orci cursus neque, ut venenatis ante dolor feugiat metus. In dignissim lectus eu dictum interdum. Vestibulum facilisis nibh nisi, at tincidunt eros pulvinar vel. In cursus orci eu turpis vestibulum, ac tincidunt leo dictum. Ut ligula quam, sollicitudin at malesuada quis, dictum sit amet turpis. Maecenas vel vehicula massa. Vestibulum eget molestie justo.</p>
            </div>
            <div class="col-md-3 about-logo-lg">
                <img src="https://placehold.it/512x512&text=Hello+there!" alt="Falcon Frag" class="img-responsive img-circle">
            </div>
        </div>
    </div>
</section>
<section class="bg-alt">
    <div class="container">
        <div class="row">
            <div class="col-md-5 about-logo-lg">
                <img src="https://placehold.it/500x350&text=Probably+this+stuff." alt="Falcon Frag" class="img-responsive img-rounded">
            </div>
            <div class="col-md-7">
                <h3 class="section-title">What can <span>we</span> do for <span>you?</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce egestas mollis enim quis posuere. Donec aliquam leo sapien, id feugiat dolor ullamcorper sit amet. Maecenas et diam sed dui gravida venenatis. Integer mollis dignissim tristique. Suspendisse ornare velit in orci mattis, et finibus tortor mattis.</p>
                <ul class="list list-check">
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                    <li>Phasellus arcu mi, vehicula eget nulla quis, tristique malesuada erat</li>
                    <li>Ut at magna sed ipsum pulvinar porttitor</li>
                    <li>Nullam in neque non mauris vestibulum tincidunt</li>
                    <li>Maecenas placerat ipsum vitae viverra pulvinar</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="staff">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title center spacer-bottom-sm">Meet our <span>Awesome Staff</span></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="staff-detail">
                    <img src="https://placehold.it/300x270&text=Reno" alt="Reno P." class="img-responsive center-block staff-photo">
                    <div class="staff-info">
                        <h4>
                            <strong>Reno</strong> P.
                        </h4>
                        <div class="title">
                            <span>Chief Executive Officer</span>
                        </div>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolre eu feugiat nula faciisis at vero eros.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="staff-detail">
                    <img src="https://placehold.it/300x270&text=Jeff" alt="Jeff A." class="img-responsive center-block staff-photo">
                    <div class="staff-info">
                        <h4>
                            <strong>Jeff</strong> A.
                        </h4>
                        <div class="title">
                            <span>Technical Support</span>
                        </div>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolre eu feugiat nula faciisis at vero eros.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="staff-detail">
                    <img src="https://placehold.it/300x270&text=Joel" alt="Joel S." class="img-responsive center-block staff-photo">
                    <div class="staff-info">
                        <h4>
                            <strong>Joel</strong> S.
                        </h4>
                        <div class="title">
                            <span>Billing Specialist</span>
                        </div>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolre eu feugiat nula faciisis at vero eros.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="staff-detail">
                    <img src="https://placehold.it/300x270&text=Michael" alt="Michael H." class="img-responsive center-block staff-photo">
                    <div class="staff-info">
                        <h4>
                            <strong>Michael</strong> H.
                        </h4>
                        <div class="title">
                            <span>System Administrator</span>
                        </div>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolre eu feugiat nula faciisis at vero eros.</p>
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
