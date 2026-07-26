@extends('layouts.app')

@section('title', 'Edit Skill')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow">

                <div class="card-body">

                    <h2 class="mb-4">
                        Edit Skill
                    </h2>

                    <form action="{{ route('skills.update', $skill->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <!-- Category -->

                        <div class="mb-3">

                            <label class="form-label">
                                Category
                            </label>

                            <select
                                name="category_id"
                                class="form-select @error('category_id') is-invalid @enderror">

                                <option value="">
                                    Select Category
                                </option>

                                @foreach($categories as $category)

                                    <option
                                        value="{{ $category->id }}"
                                        {{ old('category_id', $skill->category_id) == $category->id ? 'selected' : '' }}>

                                        {{ $category->name }}

                                    </option>

                                @endforeach

                            </select>

                            @error('category_id')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <!-- Skill Title -->

                        <div class="mb-3">

                            <label class="form-label">
                                Skill Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $skill->title) }}">

                            @error('title')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <!-- Description -->

                        <div class="mb-3">

                            <label class="form-label">
                                Description
                            </label>

                            <textarea
                                name="description"
                                rows="4"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description', $skill->description) }}</textarea>

                            @error('description')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <!-- Experience Level -->

                        <div class="mb-3">

                            <label class="form-label">
                                Experience Level
                            </label>

                            <select
                                name="experience_level"
                                class="form-select @error('experience_level') is-invalid @enderror">

                                <option value="">
                                    Select Experience Level
                                </option>

                                <option value="Beginner"
                                    {{ old('experience_level', $skill->experience_level) == 'Beginner' ? 'selected' : '' }}>
                                    Beginner
                                </option>

                                <option value="Intermediate"
                                    {{ old('experience_level', $skill->experience_level) == 'Intermediate' ? 'selected' : '' }}>
                                    Intermediate
                                </option>

                                <option value="Advanced"
                                    {{ old('experience_level', $skill->experience_level) == 'Advanced' ? 'selected' : '' }}>
                                    Advanced
                                </option>

                            </select>

                            @error('experience_level')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <!-- Created By -->

                        <div class="mb-3">

                            <label class="form-label">
                                Created By
                            </label>

                            <input
                                type="text"
                                name="created_by"
                                class="form-control @error('created_by') is-invalid @enderror"
                                value="{{ old('created_by', $skill->created_by) }}">

                            @error('created_by')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <button
                            type="submit"
                            class="btn btn-success">

                            Update Skill

                        </button>

                        <a
                            href="{{ route('skills.index') }}"
                            class="btn btn-secondary">

                            Cancel

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection