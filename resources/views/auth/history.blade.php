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
									@if($history->key == 'created_at' && !$history->old_value)
										Account created at  {{ $history->newValue() }}
									@else
										<small class="text-danger">{{ $history->userResponsible()['name'] }}</small> changed {{ $history->fieldName() }} from {{ $history->oldValue() }} to {{ $history->newValue() }}
									@endif
									<span class="pull-right">
										<small>{{ $history->updated_at->diffForHumans() }}</small>
									</span>
								</a>
							@endforeach
						</div>
					@else
						<p>No history!</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
