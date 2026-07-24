@extends('layouts.app')

@section('title', 'Add Category')

@section('content')

<div class="container py-5">

    <h2>Add New Category</h2>

    <form action="{{ route('categories.store') }}"
      method="POST">

        @csrf

        <div class="mb-3">
            <label>Category Name</label>

            <input
                type="text"
                name="name"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>

            <textarea
                name="description"
                class="form-control"
                rows="4"></textarea>
        </div>

        <button class="btn btn-primary">

            Save Category

        </button>

    </form>

</div>

@endsection