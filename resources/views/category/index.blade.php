@extends('layouts.app')

@section('title','Category')

@section('styles')
<style>
    .action-btn{
        width: 80px;
    }
</style>
@endsection

@section('content')
<div class="container page-container">
    <div class="d-flex justify-content-between mb-5">
        <h3>Category List</h3>
        <a href="{{ route('category.create') }}" class="btn btn-danger">Create New Category</a>
    </div>
    <table class="table table-secondary table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach( $categories as $category)
    <tr>
      <th scope="row">{{ $category->id }}</th>
      <td>{{ $category->name }}</td>
      <td>{{ $category->created_at->toDateString() }}</td>
      <td class="d-flex">
        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-danger action-btn">Edit</a>
        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
          @csrf
          @method('delete')
          <button type="submit" onclick="return confirm('This category is going to delete !!! Are You sure ?')"
           class="btn btn-sm btn-secondary action-btn ms-3">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection