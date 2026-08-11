@extends('layouts.app')

@section('title', 'Notifications')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Notifications</h1>

        @if($notifications->whereNull('read_at')->count() > 0)

            <form action="{{ route('notifications.read-all') }}" method="POST">

                @csrf
                @method('PATCH')

                <button type="submit" class="btn btn-primary">
                    Mark All as Read
                </button>

            </form>

        @endif

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if($notifications->count() > 0)

        <div class="list-group">

            @foreach($notifications as $notification)

                <div class="list-group-item
                    {{ $notification->read_at ? '' : 'bg-light border-primary' }}">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>

                            <h5 class="mb-1">

                                {{ $notification->data['message'] }}

                            </h5>

                            <p class="mb-1 text-muted">

                                Skill:
                                <strong>
                                    {{ $notification->data['skill_title'] }}
                                </strong>

                            </p>

                            <small class="text-muted">

                                {{ $notification->created_at->diffForHumans() }}

                            </small>

                        </div>


                        @if(!$notification->read_at)

                            <form
                                action="{{ route('notifications.read', $notification->id) }}"
                                method="POST">

                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="btn btn-sm btn-outline-primary">

                                    Mark as Read

                                </button>

                            </form>

                        @else

                            <span class="badge bg-secondary">
                                Read
                            </span>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="alert alert-info">

            You don't have any notifications yet.

        </div>

    @endif

</div>

@endsection