@extends('layout.default')

@section('content')
<div class="page-head servers">
    <div class="container">
        <div class="col-xs-12 col-sm-6">
            <h4 class="page-head-title">Products</h4>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <span>Products</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</div>
<section class="product-categories-main bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title center">Products &amp; Services</h3>
            </div>
        </div>
        <div class="row">
            @forelse($categories as $category)
                <div class="col-md-4{{ ($category->display_order == 3) ? ' col-md-offset-4' : '' }}">
                    <div class="category-info">
                        <div class="category-image">
                            <img class="img-circle" src="https://placehold.it/100">
                        </div>
                        <div class="category-title">
                            <h3>{{ $category->title }}</h3>
                        </div>
                        <div class="category-description">
                            <p>{{ $category->description }}</p>
                        </div>
                        <div class="category-link">
                            <a href="{{ route('product.category', $category->slug) }}" class="btn btn-primary">Learn more</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p class="text-center">No product categories are currently available.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!--<div class="container">
    <div class="row">
        @forelse($categories as $category)
            <div class="col-md-3">
                <h3>{{ $category->title }}</h3>
                <p class="text-muted">{{ $category->description }}</p>
            </div>
        @empty
            <p class="text-center">No categories available</p>
        @endforelse
    </div>
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-3" style="padding-bottom: 55px;">
                <a href="{{ route('product.category', $category->slug) }}" class="btn btn-primary">Learn More</a>
            </div>
        @endforeach
    </div>
</div>-->
@endsection
