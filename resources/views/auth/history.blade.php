@extends('layout.client')

@section('content')
<div style="padding-top: 200px;"></div>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Auth::user()->name }}'s Activity</div>
				<div class="panel-body">
					@if(Auth::user()->revisionHistory)
						<div class="list-group">
							@foreach(Auth::user()->revisionHistory as $history)
								<a href="#" class="list-group-item">
									<small class="text-danger">{{ $history->ip_address }}</small> modified {{ $history->fieldName() }}
									<span class="pull-right">
										<small>{{ $history->updated_at->diffForHumans() }}</small>
									</span>
								</a>
							@endforeach
						</div>
					@else
						<p>No history!</p>
					@endif


					<!--<p class="text-center"><code>{{ Auth::id() }}</code></p>
					@if(Auth::user()->revisionHistory)
						@foreach(Auth::user()->revisionHistory as $history)
							<li><code>{{ substr($history->userResponsible()->id, -10) }}</code> changed <code>{{ $history->fieldName() }}</code> from <code>{{ $history->oldValue() }}</code> to <code>{{ $history->newValue() }}</code></li>
						@endforeach
					@else
						<p>No history!</p>
					@endif-->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
