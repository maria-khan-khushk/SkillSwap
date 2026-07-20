@extends('layouts.app')

@section('title', 'SkillSwap')

@section('content')

<section class="hero-section">

    <div class="container">

        <div class="row align-items-center min-vh-100">

            <!-- Left -->

            <div class="col-lg-6">

                <span class="hero-badge">

                    🚀 The Future of Learning

                </span>

                <h1 class="hero-title mt-4">

                    Exchange Skills,

                    <span>Grow Together.</span>

                </h1>

                <p class="hero-text mt-4">

                    SkillSwap helps students connect, teach their skills,
                    learn from others, and build their professional network.

                </p>

                <div class="mt-5 d-flex gap-3">

                    <a href="#" class="btn btn-primary">

                        Get Started

                    </a>

                    <a href="#" class="btn btn-outline-primary">

                        Browse Skills

                    </a>

                </div>

                <div class="row mt-5">

                    <div class="col-6 mb-3">

                        ✔ Verified Students

                    </div>

                    <div class="col-6 mb-3">

                        ✔ Secure Requests

                    </div>

                    <div class="col-6">

                        ✔ Learn Faster

                    </div>

                    <div class="col-6">

                        ✔ Community Driven

                    </div>

                </div>

            </div>

            <!-- Right -->

            <div class="col-lg-6">

                <div class="dashboard-card">

                    <div class="dashboard-header">

                        SkillSwap Dashboard

                    </div>

                    <div class="dashboard-body">

                        <div class="dashboard-item">

                            HTML

                            <span class="badge bg-success">

                                Available

                            </span>

                        </div>

                        <div class="dashboard-item">

                            Laravel

                            <span class="badge bg-warning">

                                Busy

                            </span>

                        </div>

                        <div class="dashboard-item">

                            Flutter

                            <span class="badge bg-success">

                                Available

                            </span>

                        </div>

                        <div class="dashboard-item">

                            UI Design

                            <span class="badge bg-primary">

                                New

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- ==========================
     Features Section
========================== -->

<section class="features-section">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-badge">
                WHY CHOOSE SKILLSWAP
            </span>

            <h2 class="section-title mt-3">

                Everything You Need
                <span>To Learn & Teach</span>

            </h2>

            <p class="section-description">

                SkillSwap provides a modern platform where students
                can exchange knowledge, discover new skills,
                and build meaningful learning connections.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-book"></i>

                    </div>

                    <h4>

                        Learn New Skills

                    </h4>

                    <p>

                        Discover talented students and learn practical
                        skills directly from your peers.

                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-mortarboard"></i>

                    </div>

                    <h4>

                        Teach Others

                    </h4>

                    <p>

                        Share your expertise and help others improve
                        while building your own profile.

                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-search"></i>

                    </div>

                    <h4>

                        Smart Search

                    </h4>

                    <p>

                        Easily find students based on skills,
                        categories and availability.

                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-chat-dots"></i>

                    </div>

                    <h4>

                        Skill Requests

                    </h4>

                    <p>

                        Send learning requests and connect
                        with students instantly.

                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-star"></i>

                    </div>

                    <h4>

                        Ratings & Reviews

                    </h4>

                    <p>

                        Build trust through ratings,
                        reviews and completed exchanges.

                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-people"></i>

                    </div>

                    <h4>

                        Student Community

                    </h4>

                    <p>

                        Join a growing network of learners
                        and mentors.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
@endsection