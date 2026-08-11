@extends('layouts.app')

@section('title', 'Skills')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Skills</h1>

        <a href="{{ route('skills.create') }}" class="btn btn-primary">
            + Add Skill
        </a>

    </div>

    <form action="{{ route('skills.index') }}" method="GET" class="mb-4">

        <div class="row g-2">

            <div class="col-md-5">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search Skills..."
                    value="{{ request('search') }}">

            </div>

            <div class="col-md-4">

                <select
                    name="category"
                    class="form-select">

                    <option value="">All Categories</option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-2">

                <button class="btn btn-primary w-100">
                    Filter
                </button>

            </div>

            <div class="col-md-1">

                <a href="{{ route('skills.index') }}"
                   class="btn btn-secondary w-100">

                    Reset

                </a>

            </div>

        </div>

    </form>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif
    @if(session('error'))

    <div class="alert alert-danger">

        {{ session('error') }}

    </div>

@endif

    <p class="text-muted mb-3">

        Showing {{ $skills->total() }} skill(s)

    </p>

    <div class="row">

        @forelse($skills as $skill)

            <div class="col-md-4 mb-4">

                <div class="card shadow-sm border-0 h-100">

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

<div class="d-flex gap-2 flex-wrap">

    {{-- Admin can Edit/Delete --}}
    @can('update', $skill)

        <a href="{{ route('skills.edit', $skill->id) }}"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <form action="{{ route('skills.destroy', $skill->id) }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete this skill?')">

                Delete

            </button>

        </form>

    @endcan

   {{-- User can request other user's skills --}}
@if(auth()->id() != $skill->user_id)

    @php
        $myRequest = $myRequests->get($skill->id);
    @endphp


    {{-- No request exists --}}
    @if(!$myRequest)

        <form action="{{ route('requests.store', $skill->id) }}"
              method="POST">

            @csrf

            <button type="submit"
                    class="btn btn-success btn-sm">

                Request Skill

            </button>

        </form>


    {{-- Request is pending --}}
    @elseif($myRequest->status === 'pending')

        <button type="button"
                class="btn btn-warning btn-sm"
                disabled>

            Request Pending

        </button>


    {{-- Request accepted --}}
    @elseif($myRequest->status === 'accepted')

        <button type="button"
                class="btn btn-success btn-sm"
                disabled>

            Request Accepted

        </button>


    {{-- Request rejected --}}
    @elseif($myRequest->status === 'rejected')

        <form action="{{ route('requests.store', $skill->id) }}"
              method="POST">

            @csrf

            <button type="submit"
                    class="btn btn-outline-danger btn-sm">

                Request Again

            </button>

        </form>

    @endif

@endif

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