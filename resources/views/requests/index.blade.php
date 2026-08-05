@extends('layouts.app')

@section('title', 'Skill Requests')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">Received Skill Requests</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>
                        <th>Sender</th>
                        <th>Skill</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th width="220">Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($requests as $request)

                        <tr>

                            <td>{{ $request->sender->name }}</td>

                            <td>{{ $request->skill->title }}</td>

                            <td>{{ $request->message ?? '-' }}</td>

                            <td>

                                @if($request->status=='pending')
                                    <span class="badge bg-warning">Pending</span>

                                @elseif($request->status=='accepted')
                                    <span class="badge bg-success">Accepted</span>

                                @else
                                    <span class="badge bg-danger">Rejected</span>

                                @endif

                            </td>

                            <td>

                                @if($request->status=='pending')

                                    <div class="d-flex gap-2">

                                        <form method="POST"
                                              action="{{ route('requests.accept',$request->id) }}">

                                            @csrf
                                            @method('PATCH')

                                            <button class="btn btn-success btn-sm">

                                                Accept

                                            </button>

                                        </form>

                                        <form method="POST"
                                              action="{{ route('requests.reject',$request->id) }}">

                                            @csrf
                                            @method('PATCH')

                                            <button class="btn btn-danger btn-sm">

                                                Reject

                                            </button>

                                        </form>

                                    </div>

                                @else

                                    -

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center">

                                No Requests Found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection