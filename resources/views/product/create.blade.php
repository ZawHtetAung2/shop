@extends('layouts.app')

@section('title','Sell Product')

@section('styles')
<style>
    .form-conatiner {
        background-color: #fefefe;
        margin: auto;
        padding: 30px;
        border-radius: 10px;
    }

    .form-title {
        color: #d9534f;
        font-size: 2rem;
        font-weight: 600;
        text-align: center;
    }
</style>
@endsection

@section('content')
<div class="container page-container">
    <div class="col-12 col-md-6 form-conatiner">
        <h3 class="form-title mb-4">Product Selling Form</h3>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="images" class="form-label">Image Upload</label>
                <input type="file" class="form-control @error('images') is-invalid @enderror"
                name="images[]" multiple>
                @error('images')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Product Name</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}" placeholder="Enter Your Product Name">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" placeholder="Enter Your Product Description">
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price')}}" placeholder="Enter Your Price">
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label">Product Category</label>
                <select class="form-select @error('categories') is-invalid @enderror" name="categories[]" multiple>
                    <option selected disabled>Choose Categories</option>
                    @foreach( $categories as $category)
                    <option value="{{ $category->id }}"
                    @if( in_array($category->id, old('categories',[]) )) selected @endif>
                    {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('categories')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-danger">Submit</button>
                <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancle</a>
            </div>
        </form>
    </div>
</div>
@endsection