@extends('layout.admin')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Progress Bars</div>
            </div>
            <div class="panel-body">
                <h5>The basic progress bar styles</h5>
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                <span class="sr-only">20% Complete (success)</span>
                            </div>
                        </div>
                        <br>
                        <div class="progress progress-bar-default">
                            <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                <span class="sr-only">30% Complete (default)</span>
                            </div>
                        </div>
                        <br>
                        <div class="progress progress-bar-purple">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                <span class="sr-only">40% Complete (purple)</span>
                            </div>
                        </div>
                        <br>
                        <div class="progress progress-bar-blue">
                            <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                <span class="sr-only">50% Complete (blue)</span>
                            </div>
                        </div>
                        <br>
                        <div class="progress progress-bar-red">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                <span class="sr-only">60% Complete (red)</span>
                            </div>
                        </div>
                        <br>
                        <div class="progress progress-bar-black">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                <span class="sr-only">70% Complete (black)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <h5>Striped</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="progress progress-striped">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                <span class="sr-only">40% Complete (success)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <h5>Active</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                <span class="sr-only">40% Complete (red)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <h5>Stacked</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: 15%">
                                <span class="sr-only">15% Complete (success)</span>
                            </div>
                            <div class="progress-bar progress-bar-warning" style="width: 10%">
                                <span class="sr-only">10% Complete (warning)</span>
                            </div>
                            <div class="progress-bar progress-bar-danger" style="width: 18%">
                                <span class="sr-only">18% Complete (danger)</span>
                            </div>
                            <div class="progress-bar progress-bar-info" style="width: 25%">
                                <span class="sr-only">25% Complete (info)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Buttons</div>
            <div class="panel-body">
                <h5>A bit more than a rainbow</h5>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary">Primary</button>
                        <button class="btn btn-secondary">Secondary</button>
                        <button class="btn btn-purple">Purple</button>
                        <button class="btn btn-orange">Orange</button>
                        <button class="btn btn-pink">Pink</button>
                        <button class="btn btn-turquoise">Turquoise</button>
                        <button class="btn btn-success">Green</button>
                        <button class="btn btn-info">Light Blue</button>
                        <button class="btn btn-blue">Blue</button>
                        <button class="btn btn-danger">Red</button>
                        <button class="btn btn-red">Dark Red</button>
                        <button class="btn btn-warning">Yellow</button>
                        <button class="btn btn-black">Black</button>
                        <button class="btn btn-white">White</button>
                        <button class="btn btn-gray">Gray</button>
                        <button class="btn btn-default">Default</button>
                    </div>
                </div>
                <br>
                <h5>Look at these incredible sizes</h5>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary btn-lg">Large</button>
                        <button class="btn btn-success">Normal</button>
                        <button class="btn btn-warning btn-sm">Small</button>
                        <button class="btn btn-danger btn-xs">Extra Small</button>
                    </div>
                </div>
                <br>
                <h5>Pity the fool who tries clicking disabled buttons</h5>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary disabled">Primary</button>
                        <button class="btn btn-secondary disabled">Secondary</button>
                        <button class="btn btn-white disabled">White</button>
                        <button class="btn btn-gray disabled">Gray</button>
                    </div>
                </div>
                <br>
                <h5>Look at these justified buttons, magnificent huh?</h5>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="btn-group btn-group-justified">
                            <a class="btn btn-success">Single Button</a>
                        </div>
                        <br>
                        <div class="btn-group btn-group-justified">
                            <a class="btn btn-primary">One</a>
                            <a class="btn btn-secondary">Two</a>
                        </div>
                        <br>
                        <div class="btn-group btn-group-justified">
                            <a class="btn btn-primary">One</a>
                            <a class="btn btn-purple">Two</a>
                            <a class="btn btn-info">Three</a>
                        </div>
                        <br>
                        <div class="btn-group btn-group-justified">
                            <a class="btn btn-primary">One</a>
                            <a class="btn btn-secondary">Two</a>
                            <a class="btn btn-danger">Three</a>
                            <a class="btn btn-purple">Four</a>
                        </div>
                    </div>
                </div>
                <br>
                <h5>In case you ever need a block level button, those are here too</h5>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary btn-block">Primary</button>
                        <button class="btn btn-purple btn-block">Purple</button>
                        <button class="btn btn-info btn-block">Light Blue</button>
                        <button class="btn btn-white btn-block">White</button>
                    </div>
                </div>
                <br>
                <h5>A markdown editor would look very nice with these button groups</h5>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-white">
                                <input type="checkbox"> <i class="fa fa-header"></i>
                            </label>
                            <label class="btn btn-white">
                                <input type="checkbox"> <i class="fa fa-font"></i>
                            </label>
                            <label class="btn btn-white">
                                <input type="checkbox"> <i class="fa fa-eyedropper"></i>
                            </label>
                        </div>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-white">
                                <input type="radio" name="options" id="option1"> <i class="fa fa-align-left"></i>
                            </label>
                            <label class="btn btn-white">
                                <input type="radio" name="options" id="option2"> <i class="fa fa-align-center"></i>
                            </label>
                            <label class="btn btn-white">
                                <input type="radio" name="options" id="option3"> <i class="fa fa-align-right"></i>
                            </label>
                            <label class="btn btn-white">
                                <input type="radio" name="options" id="option4"> <i class="fa fa-align-justify"></i>
                            </label>
                        </div>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-white">
                                <input type="checkbox"> <i class="fa fa-bold"></i>
                            </label>
                            <label class="btn btn-white">
                                <input type="checkbox"> <i class="fa fa-italic"></i>
                            </label>
                            <label class="btn btn-white">
                                <input type="checkbox"> <i class="fa fa-underline"></i>
                            </label>
                            <label class="btn btn-white">
                                <input type="checkbox"> <i class="fa fa-strikethrough"></i>
                            </label>
                        </div>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-white">
                                <input type="checkbox"> <i class="fa fa-chain"></i>
                            </label>
                            <label class="btn btn-white">
                                <input type="checkbox"> <i class="fa fa-picture-o"></i>
                            </label>
                            <label class="btn btn-white">
                                <input type="checkbox"> <i class="fa fa-code"></i>
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <h5>Or add some icons to buttons</h5>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary btn-icon">
                            <i class="fa-link"></i>
                            <span>Website</span>
                        </button>
                        <button class="btn btn-success btn-icon">
                            <i class="fa-check"></i>
                            <span>Mark Resolved</span>
                        </button>
                        <button class="btn btn-red btn-icon">
                            <span>Edit Content</span>
                            <i class="fa-pencil"></i>
                        </button>
                        <button class="btn btn-purple btn-icon btn-icon-standalone">
                            <i class="fa-magic"></i>
                            <span>Separated</span>
                        </button>
                        <button class="btn btn-blue btn-icon btn-icon-standalone btn-icon-standalone-right">
                            <i class="fa-warning"></i>
                            <span>Post Announcement</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Code Styles</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Pre-formatted code blocks</h5>
<pre class="scrollable language-php">
<code>
$pusher = new Pusher;

$pusher_data = [
    'ticket_id' => $ticket->id,
    'ticket_author' => $ticket->author->name,
    'ticket_title' => $ticket->title
];

$pusher->trigger('demo_channel', 'new_ticket', $pusher_data);
</code>
</pre>
<br><br>
<h5>Still pre-formatted, but loaded from a url ;)</h5>
<pre class="scrollable" data-max-height="500" data-src="https://cdn.rawgit.com/laravel/framework/5.0/src/Illuminate/Encryption/Encrypter.php"></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
