@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="container py-4">

    <h2 class="mb-2">
        Welcome, {{ auth()->user()->name }}
    </h2>

    <p class="text-muted mb-4">
        Here's an overview of your SkillSwap account.
    </p>


    <!-- ========================================= -->
    <!-- GENERAL STATISTICS -->
    <!-- ========================================= -->

    <div class="row">

        <!-- Total Categories -->
        <div class="col-md-4 mb-3">

            <div class="card bg-primary text-white shadow h-100">

                <div class="card-body text-center">

                    <h5>Total Categories</h5>

                    <h2>{{ $totalCategories }}</h2>

                </div>

            </div>

        </div>


        <!-- Total Skills -->
        <div class="col-md-4 mb-3">

            <div class="card bg-success text-white shadow h-100">

                <div class="card-body text-center">

                    <h5>Total Skills</h5>

                    <h2>{{ $totalSkills }}</h2>

                </div>

            </div>

        </div>


        <!-- Total Users -->
        <div class="col-md-4 mb-3">

            <div class="card bg-dark text-white shadow h-100">

                <div class="card-body text-center">

                    <h5>Total Users</h5>

                    <h2>{{ $totalUsers }}</h2>

                </div>

            </div>

        </div>

    </div>


    <!-- ========================================= -->
    <!-- SKILL REQUEST STATISTICS -->
    <!-- ========================================= -->

    <h4 class="mt-4 mb-3">
        Skill Request Overview
    </h4>

    <div class="row">

        <!-- Sent Requests -->
        <div class="col-md-3 mb-3">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <h6 class="text-muted">
                        Sent Requests
                    </h6>

                    <h2 class="text-primary">
                        {{ $sentRequests }}
                    </h2>

                    <a href="{{ route('requests.my') }}"
                       class="btn btn-sm btn-outline-primary">

                        View My Requests

                    </a>

                </div>

            </div>

        </div>


        <!-- Received Requests -->
        <div class="col-md-3 mb-3">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <h6 class="text-muted">
                        Received Requests
                    </h6>

                    <h2 class="text-info">
                        {{ $receivedRequests }}
                    </h2>

                    <a href="{{ route('requests.index') }}"
                       class="btn btn-sm btn-outline-info">

                        View Requests

                    </a>

                </div>

            </div>

        </div>


        <!-- Pending Requests -->
        <div class="col-md-3 mb-3">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <h6 class="text-muted">
                        Pending Requests
                    </h6>

                    <h2 class="text-warning">
                        {{ $pendingRequests }}
                    </h2>

                    <a href="{{ route('requests.index') }}"
                       class="btn btn-sm btn-outline-warning">

                        Manage

                    </a>

                </div>

            </div>

        </div>


        <!-- Accepted Requests -->
        <div class="col-md-3 mb-3">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <h6 class="text-muted">
                        Accepted Requests
                    </h6>

                    <h2 class="text-success">
                        {{ $acceptedRequests }}
                    </h2>

                    <a href="{{ route('requests.my') }}"
                       class="btn btn-sm btn-outline-success">

                        View Status

                    </a>

                </div>

            </div>

        </div>

    </div>


    <!-- ========================================= -->
    <!-- SKILLS CHART -->
    <!-- ========================================= -->

    <div class="card shadow mt-4">

        <div class="card-header">

            <h5 class="mb-0">
                Skills by Category
            </h5>

        </div>

        <div class="card-body">

            <canvas id="skillsChart"></canvas>

        </div>

    </div>


    <!-- ========================================= -->
    <!-- MY LATEST SKILLS -->
    <!-- ========================================= -->

    <div class="card shadow mt-4">

        <div class="card-header">

            <h5 class="mb-0">
                My Latest Skills
            </h5>

        </div>

        <div class="card-body">

            <table class="table table-striped table-hover">

                <thead>

                    <tr>

                        <th>Title</th>

                        <th>Category</th>

                        <th>Experience</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($mySkills as $skill)

                        <tr>

                            <td>
                                {{ $skill->title }}
                            </td>

                            <td>
                                {{ $skill->category->name }}
                            </td>

                            <td>
                                {{ $skill->experience_level }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3"
                                class="text-center text-muted">

                                You haven't added any skills yet.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    <!-- ========================================= -->
    <!-- LATEST SKILLS -->
    <!-- ========================================= -->

    <div class="card shadow mt-4">

        <div class="card-header">

            <h5 class="mb-0">
                Latest Skills
            </h5>

        </div>

        <div class="card-body">

            <table class="table table-striped table-hover">

                <thead>

                    <tr>

                        <th>Title</th>

                        <th>Category</th>

                        <th>Experience</th>

                        <th>Created By</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($latestSkills as $skill)

                        <tr>

                            <td>
                                {{ $skill->title }}
                            </td>

                            <td>
                                {{ $skill->category->name }}
                            </td>

                            <td>
                                {{ $skill->experience_level }}
                            </td>

                            <td>
                                {{ $skill->created_by }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4"
                                class="text-center text-muted">

                                No Skills Found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


<!-- ========================================= -->
<!-- CHART JS -->
<!-- ========================================= -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('skillsChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [

            @foreach($chartData as $item)

                "{{ $item->name }}",

            @endforeach

        ],

        datasets: [{

            label: 'Skills',

            data: [

                @foreach($chartData as $item)

                    {{ $item->skills_count }},

                @endforeach

            ],

            borderWidth: 1

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: true,

        scales: {

            y: {

                beginAtZero: true

            }

        }

    }

});

</script>

@endsection