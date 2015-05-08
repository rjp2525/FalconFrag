@extends('layout.primary')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @forelse($categories as $category)
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img src="{{ $category->icon }}" alt="64x64" class="media-object" style="width: 64px; height: 64px;">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading" id="c{{ $category->id }}">{{ $category->title }}</h4>
                        {{ $category->description }}
                    </div>
                </div>
            @empty
                <p class="text-center">The owner of this forum has not created any categories yet.</p>
            @endforelse
        </div>
    </div>
</div>
@stop
