@extends('layouts.app')

@section('title','Categories')

@section('content')

<div class="container py-5">

    <h1 class="mb-5">

        Skill Categories

    </h1>

    <div class="row">

        @foreach($categories as $category)

        <div class="col-md-4 mb-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <h4>

                        {{ $category->name }}

                    </h4>

                    <p>

                        {{ $category->description }}

                    </p>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection