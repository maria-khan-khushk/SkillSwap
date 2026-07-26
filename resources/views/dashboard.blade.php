@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container py-5">

    <h1 class="mb-5">

        SkillSwap Dashboard

    </h1>

    <div class="row">

        <div class="col-md-3">

            <div class="card shadow text-center">

                <div class="card-body">

                    <h5>Total Skills</h5>

                    <h2>{{ $totalSkills }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow text-center">

                <div class="card-body">

                    <h5>Total Categories</h5>

                    <h2>{{ $totalCategories }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow text-center">

                <div class="card-body">

                    <h5>Beginner Skills</h5>

                    <h2>{{ $beginnerSkills }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow text-center">

                <div class="card-body">

                    <h5>Advanced Skills</h5>

                    <h2>{{ $advancedSkills }}</h2>

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow mt-5">

        <div class="card-header">

            <h4 class="mb-0">

                Recent Skills

            </h4>

        </div>

        <div class="card-body">

            <table class="table">

                <thead>

                    <tr>

                        <th>Title</th>

                        <th>Category</th>

                        <th>Level</th>

                        <th>Created By</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($recentSkills as $skill)

                    <tr>

                        <td>{{ $skill->title }}</td>

                        <td>{{ $skill->category->name }}</td>

                        <td>{{ $skill->experience_level }}</td>

                        <td>{{ $skill->created_by }}</td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection