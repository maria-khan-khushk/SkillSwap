@extends('layouts.app')

@section('title','Skills')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Skills</h1>

        <a href="{{ route('skills.create') }}" class="btn btn-primary">
            + Add Skill
        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="row">

        @forelse($skills as $skill)

            <div class="col-md-4 mb-4">

                <div class="card shadow-sm h-100">

                    <div class="card-body">

                        <h4>{{ $skill->title }}</h4>

                        <p>

                            <strong>Category:</strong>

                            {{ $skill->category->name }}

                        </p>

                        <p>

                            <strong>Experience:</strong>

                            {{ $skill->experience_level }}

                        </p>

                        <p>

                            <strong>Created By:</strong>

                            {{ $skill->created_by }}

                        </p>

                        <p>

                            {{ $skill->description }}

                        </p>

                        <div class="d-flex gap-2">

                            <a href="#"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <button
                                class="btn btn-danger btn-sm">

                                Delete

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-info">

                    No skills found.

                </div>

            </div>

        @endforelse

    </div>

    <div class="mt-4">

        {{ $skills->links() }}

    </div>

</div>

@endsection