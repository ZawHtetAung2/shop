@extends('layouts.app')

@section('title','Product Detail')

@section('styles')
<style>
    .img-box{
        border: 2px solid #fa8a87;
        border-radius: 11px;
    }
    .card img {
        width: 100%;
        height: 200px;
        border-radius: 10px;
        object-fit: cover;
    }

    .badge {
        font-size: 0.9rem;
        color: #fff;
        background-color: #fa8a87;
    }

    .card-title {
        color: #51585e;
        font-size: 2rem;
        font-weight: 600;
    }

    .card-detail {
        color: #51585e;
        font-size: 1.5rem;
        font-weight: 400;
    }

    .card-price {
        color: #ff8100;
        font-size: 2.2rem;
        font-weight: 600;
    }

    .action-btn{
        width: 150px;
    }
</style>
@endsection

@section('content')
<div class="container page-container">
    <div class="card mb-3 p-3">
        <div class="row g-0">
            <div class="col-md-5">
                <div class="row row-cols-2 g-2">
                    @foreach( $product->images as $image)
                    <div class="col">
                        <div class="img-box">
                        <img src="{{ Storage::url($image->path) }}" alt="Product Image">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <span class="card-price">${{ $product->price }}</span>
                    </div>
                    <p>
                        @foreach( $product->categories as $category)
                        <span class="badge rounded-pill">{{ $category->name}}</span>
                        @endforeach
                    </p>
                    <p class="card-detail">{{ $product->description }}</p>
                    <div class="d-flex justify-content-end mt-5">
                        <a href="{{ route('product.edit',$product->id) }}" class="btn action-btn btn-danger">Edit</a>
                        <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('This Product is removed from Selling !!! Are You Sure ?')"
                            class="btn action-btn btn-secondary ms-2">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection