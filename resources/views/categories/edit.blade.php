@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card shadow">

                <div class="card-body">

                    <h2 class="mb-4">

                        Edit Category

                    </h2>

                    <form action="{{ route('categories.update', $category->id) }}"
                          method="POST">

                        @csrf

                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label">

                                Category Name

                            </label>

@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card shadow">

                <div class="card-body">

                    <h2 class="mb-4">
                        Edit Category
                    </h2>

                    <form action="{{ route('categories.update', $category->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <!-- Category Name -->

                        <div class="mb-3">

                            <label class="form-label">Category Name</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $category->name) }}">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Description -->

                        <div class="mb-3">

                            <label class="form-label">Description</label>

                            <textarea
                                name="description"
                                rows="4"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <button type="submit" class="btn btn-success">
                            Update Category
                        </button>

                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection<input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ $category->name }}">

                        </div>

                        <div class="mb-3">

                            <label>Description</label>

                            <textarea
                                name="description"
                                rows="4"
                                class="form-control">{{ $category->description }}</textarea>
                            <a href="{{ route('categories.edit', $category->id) }}"
   class="btn btn-warning btn-sm">

    Edit

</a>
                        </div>

                        <button class="btn btn-success">

                            Update Category

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection