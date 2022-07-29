@extends('layouts.app')

@section('title','Product')

@section('styles')
<style>
    .card img{
        height: 200px;
        object-fit: cover;
    }
    .badge{
        font-size:0.6rem;
        color: #fff;
        background-color: #fa8a87;
    }
    .card-title{
        color: #51585e;
        font-size: 1.1rem;
        font-weight: 600;
    }
    .card-price{
        color: #ff8100;
        font-size: 1.2rem;
        font-weight: 600;
    }

    .page-link{
        color: #dc3545;;
    }
    .active > .page-link, .page-link.active {
    background-color: #dc3545;;
    border-color: red;
    }
</style>
@endsection

@section('content')
<div class="container page-container">
    <div class="d-flex justify-content-between mb-5">
        <h3>Products List</h3>
        <a href="{{ route('product.create') }}" class="btn btn-danger">Sell My Product</a>
    </div>
    <div class="row row-cols-4 g-4">
        @foreach( $products as $product)
        <div class="col">
            <div class="card">
                @if($product->images[0])
                <img src="{{ Storage::url($product->images[0]->path) }}" class="card-img-top" alt="Product Image">
                @endif
                <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p>
                    @foreach( $product->categories as $category)
                        <span class="badge rounded-pill">{{ $category->name}}</span>
                    @endforeach
                    </p>
                    <span class="card-price">${{ $product->price }}</span>
                    <a href="{{ route('product.show',$product->id) }}" class="btn btn-sm btn-danger float-end">View More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center m-4">
        {{ $products->links('vendor.pagination.bootstrap-4')}}
    </div>
</div>
@endsection