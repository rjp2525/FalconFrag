@extends('layout.default')

@section('content')
<div class="page-head servers">
    <div class="container">
        <div class="col-xs-12 col-sm-6">
            <h4 class="page-head-title">{{ $product->title }}</h4>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <a href="{{ route('product.index') }}">Products</a>
                    </li>
                    @if($product->category->parent)
                        <li>
                            <a href="{{ route('product.category', $product->category->parent->slug) }}">{{ $product->category->parent->title }}</a>
                        </li>
                        <li>
                            <a href="{{ route('product.category', $product->category->slug) }}">{{ $product->category->title }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('product.category', $product->category->slug) }}">{{ $product->category->title }}</a>
                        </li>
                    @endif
                    <li>
                        <span>{{ $product->title }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>{{ $product->title }}</p>
            <p>{!! $product->description_long !!}</p>
        </div>
    </div>
</div>
<section class="bg-gray product-reviews">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="section-title center">Recent Reviews</h3>
                @forelse($product->reviews()->orderBy('created_at', 'desc')->take(3)->get() as $review)
                    <div class="product-review">
                        <div class="review-information">
                            <h4 class="client-name">{{ $review->author->name }}</h4>
                            <small class="review-date">{{ date('F d, Y', strtotime($review->created_at)) }}</small>
                            <div class="rating">
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="mi mi-star{{ ($i <= $review->rating) ? ' rated' : '-outline'}}"></span>
                                @endfor
                            </div>
                            <div class="review-text">
                                <p class="text-readmore">{{ $review->body }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">There are no reviews available for this product.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
