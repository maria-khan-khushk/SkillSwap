@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Skill Categories</h1>

        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            + Add Category
        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="row">

        @foreach($categories as $category)

            <div class="col-md-4 mb-4">

                <div class="card shadow-sm border-0 h-100">

                    <div class="card-body">

                        <h4>{{ $category->name }}</h4>

                        <p>{{ $category->description }}</p>

                        <div class="d-flex gap-2">

                            <a href="{{ route('categories.edit', $category->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('categories.destroy', $category->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this category?')">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection