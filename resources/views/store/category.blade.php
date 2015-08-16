@extends('layout.default')

@section('content')
<div class="page-head servers">
    <div class="container">
        <div class="col-xs-12 col-sm-6">
            <h4 class="page-head-title">{{ $category->title }}</h4>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <a href="{{ route('product.index') }}">Products</a>
                    </li>
                    @if($category->parent)
                        <li>
                            <a href="{{ route('product.category', $category->parent->slug) }}">{{ $category->parent->title }}</a>
                        </li>
                    @endif
                    <li>
                        <span>{{ $category->title }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</div>
<section class="category-product-list-grid">
    <div class="container">
        <div class="row">
            @forelse($category->products()->paginate(12) as $product)
            <div class="col-md-3 col-sm-6">
                <div class="product-list-item-container">
                    <div class="product-list-item">
                        <a href="{{ route('product.detail', [$category->slug, $product->slug]) }}" class="product-icon">
                            <img src="https://placehold.it/128" alt="Product Icon">
                        </a>
                        <a href="{{ route('product.detail', [$category->slug, $product->slug]) }}" class="product-title">{{ $product->title }}</a>
                        <p class="product-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
            @empty
                <p class="text-center">No products are available in this category.</p>
            @endforelse
            @if(!empty($category->products()->paginate(12)))
                <div class="col-md-12 pagination-cres">
                    <div class="pagination">
                        {!! $category->products()->paginate(12)->render() !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
