@extends('layouts.app')

@section('title','Edit Category')

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
        <h3 class="form-title mb-4">Edit a Category</h3>
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('title',$category->name)}}" placeholder="Enter New Categorys">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-danger">Update</button>
                <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancle</a>
            </div>
        </form>
    </div>
</div>
@endsection