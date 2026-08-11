@extends('layouts.app')

@section('title', 'Skill Requests')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1>Received Skill Requests</h1>

            <p class="text-muted mb-0">
                Manage requests received for your skills.
            </p>
        </div>

        <a href="{{ route('skills.index') }}" class="btn btn-primary">
            Browse Skills
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Error Message --}}
    @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif


    @if($requests->count() > 0)

        <div class="card shadow-sm border-0">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover mb-0">

                        <thead class="table-dark">

                            <tr>

                                <th>Sender</th>

                                <th>Skill</th>

                                <th>Message</th>

                                <th>Status</th>

                                <th>Action</th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($requests as $request)

                                <tr>

                                    {{-- Sender --}}
                                    <td>
                                        {{ $request->sender->name }}
                                    </td>


                                    {{-- Skill --}}
                                    <td>
                                        <strong>
                                            {{ $request->skill->title }}
                                        </strong>
                                    </td>


                                    {{-- Message --}}
                                    <td>

                                        @if($request->message)

                                            {{ $request->message }}

                                        @else

                                            <span class="text-muted">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Status --}}
                                    <td>

                                        @if($request->status === 'pending')

                                            <span class="badge bg-warning text-dark">
                                                Pending
                                            </span>

                                        @elseif($request->status === 'accepted')

                                            <span class="badge bg-success">
                                                Accepted
                                            </span>

                                        @elseif($request->status === 'rejected')

                                            <span class="badge bg-danger">
                                                Rejected
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Actions --}}
                                    <td>

                                        @if($request->status === 'pending')

                                            <div class="d-flex gap-2">

                                                {{-- Accept --}}
                                                <form
                                                    action="{{ route('requests.accept', $request->id) }}"
                                                    method="POST">

                                                    @csrf
                                                    @method('PATCH')

                                                    <button
                                                        type="submit"
                                                        class="btn btn-success btn-sm">

                                                        Accept

                                                    </button>

                                                </form>


                                                {{-- Reject --}}
                                                <form
                                                    action="{{ route('requests.reject', $request->id) }}"
                                                    method="POST">

                                                    @csrf
                                                    @method('PATCH')

                                                    <button
                                                        type="submit"
                                                        class="btn btn-danger btn-sm">

                                                        Reject

                                                    </button>

                                                </form>

                                            </div>

                                        @else

                                            <span class="text-muted">
                                                -
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    @else

        <div class="card shadow-sm border-0">

            <div class="card-body text-center py-5">

                <h4>No Skill Requests</h4>

                <p class="text-muted">
                    You haven't received any skill requests yet.
                </p>

                <a href="{{ route('skills.index') }}"
                   class="btn btn-primary">

                    Browse Skills

                </a>

            </div>

        </div>

    @endif

</div>

@endsection