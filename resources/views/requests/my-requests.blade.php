@extends('layouts.app')

@section('title', 'My Requests')

@section('content')

<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1>My Requests</h1>

            <p class="text-muted mb-0">
                Track the status of the skill requests you have sent.
            </p>

        </div>

        <a href="{{ route('skills.index') }}"
           class="btn btn-primary">

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


    {{-- Requests Exist --}}
    @if($requests->count() > 0)

        <div class="card shadow-sm border-0">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover mb-0">

                        <thead class="table-dark">

                            <tr>

                                {{-- Skill --}}
                                <th>
                                    Skill
                                </th>


                                {{-- Owner --}}
                                <th>
                                    Owner
                                </th>


                                {{-- Message --}}
                                <th>
                                    Message
                                </th>


                                {{-- Status --}}
                                <th>
                                    Status
                                </th>


                                {{-- Date --}}
                                <th>
                                    Requested On
                                </th>


                                {{-- Action --}}
                                <th>
                                    Action
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($requests as $request)

                                <tr>

                                    {{-- ========================= --}}
                                    {{-- Skill --}}
                                    {{-- ========================= --}}

                                    <td>

                                        <strong>
                                            {{ $request->skill->title }}
                                        </strong>

                                    </td>


                                    {{-- ========================= --}}
                                    {{-- Skill Owner --}}
                                    {{-- ========================= --}}

                                    <td>

                                        {{ $request->receiver->name }}

                                    </td>


                                    {{-- ========================= --}}
                                    {{-- Message --}}
                                    {{-- ========================= --}}

                                    <td>

                                        @if($request->message)

                                            {{ $request->message }}

                                        @else

                                            <span class="text-muted">

                                                No message

                                            </span>

                                        @endif

                                    </td>


                                    {{-- ========================= --}}
                                    {{-- Status --}}
                                    {{-- ========================= --}}

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


                                    {{-- ========================= --}}
                                    {{-- Requested Date --}}
                                    {{-- ========================= --}}

                                    <td>

                                        {{ $request->created_at->format('d M Y') }}

                                    </td>


                                    {{-- ========================= --}}
                                    {{-- Action --}}
                                    {{-- ========================= --}}

                                    <td>

                                        @if($request->status === 'accepted')

                                            {{-- 
                                                Connection feature will
                                                be implemented next.
                                            --}}

                                            <a href="#"
                                               class="btn btn-success btn-sm">

                                                Connect

                                            </a>


                                        @elseif($request->status === 'pending')

                                            <span class="text-muted small">

                                                Waiting for response

                                            </span>


                                        @elseif($request->status === 'rejected')

                                            <span class="text-muted small">

                                                Request rejected

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

        {{-- ========================= --}}
        {{-- No Requests --}}
        {{-- ========================= --}}

        <div class="card shadow-sm border-0">

            <div class="card-body text-center py-5">

                <h4>
                    No Requests Yet
                </h4>

                <p class="text-muted">

                    You haven't sent any skill requests yet.

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