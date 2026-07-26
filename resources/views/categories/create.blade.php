@extends('layouts.app')

@section('title', 'Add Category')

@section('content')

<div class="container py-5">

    <h2>Add New Category</h2>

    <form action="{{ route('categories.store') }}"
      method="POST">

        @csrf

       <div class="mb-3">

    <label class="form-label">

        Category Name

    </label>

    <input
        type="text"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name') }}">

    @error('name')

        <div class="invalid-feedback">

            {{ $message }}

        </div>

    @enderror

</div>

       <div class="mb-3">

    <label>Description</label>

    <textarea
        name="description"
        rows="4"
        class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

    @error('description')

        <div class="invalid-feedback">

            {{ $message }}

        </div>

    @enderror

</div>

        <button class="btn btn-primary">

            Save Category

        </button>

    </form>

</div>

@endsection