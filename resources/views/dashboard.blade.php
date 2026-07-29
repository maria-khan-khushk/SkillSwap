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

    <!-- Statistics -->
    <div class="row">

        <div class="col-md-4 mb-3">

            <div class="card bg-primary text-white shadow">

                <div class="card-body text-center">

                    <h5>Total Categories</h5>

                    <h2>{{ $totalCategories }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card bg-success text-white shadow">

                <div class="card-body text-center">

                    <h5>Total Skills</h5>

                    <h2>{{ $totalSkills }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card bg-dark text-white shadow">

                <div class="card-body text-center">

                    <h5>Total Users</h5>

                    <h2>{{ $totalUsers }}</h2>

                </div>

            </div>

        </div>

    </div>

    <!-- Skills Chart -->
    <div class="card shadow mt-4">

        <div class="card-header">

            <h5 class="mb-0">Skills by Category</h5>

        </div>

        <div class="card-body">

            <canvas id="skillsChart"></canvas>

        </div>

    </div>

    <!-- My Latest Skills -->
    <div class="card shadow mt-4">

        <div class="card-header">

            <h5 class="mb-0">My Latest Skills</h5>

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

                            <td>{{ $skill->title }}</td>

                            <td>{{ $skill->category->name }}</td>

                            <td>{{ $skill->experience_level }}</td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3" class="text-center text-muted">

                                You haven't added any skills yet.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- Latest Skills -->
    <div class="card shadow mt-4">

        <div class="card-header">

            <h5 class="mb-0">Latest Skills</h5>

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

                            <td>{{ $skill->title }}</td>

                            <td>{{ $skill->category->name }}</td>

                            <td>{{ $skill->experience_level }}</td>

                            <td>{{ $skill->created_by }}</td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center text-muted">

                                No Skills Found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

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