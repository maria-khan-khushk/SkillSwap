@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">
        My Profile
    </h2>

    <div class="card shadow mb-4">

        <div class="card-header">
            Profile Information
        </div>

        <div class="card-body">

            @include('profile.partials.update-profile-information-form')

        </div>

    </div>

    <div class="card shadow mb-4">

        <div class="card-header">
            Change Password
        </div>

        <div class="card-body">

            @include('profile.partials.update-password-form')

        </div>

    </div>

    <div class="card shadow">

        <div class="card-header bg-danger text-white">
            Delete Account
        </div>

        <div class="card-body">

            @include('profile.partials.delete-user-form')

        </div>

    </div>

</div>

@endsection