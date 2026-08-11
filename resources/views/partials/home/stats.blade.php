<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-badge">
                SKILLSWAP IN NUMBERS
            </span>

            <h2 class="section-title mt-3">
                Our Growing Community
            </h2>

            <p class="section-description">
                Discover how our learning community is growing every day.
            </p>

        </div>


        <div class="row g-4">

            {{-- Total Users --}}
            <div class="col-md-6 col-lg-3">

                <div class="card shadow-sm border-0 text-center h-100">

                    <div class="card-body py-4">

                        <div class="mb-3">

                            <i class="bi bi-people fs-1 text-primary"></i>

                        </div>

                        <h2 class="fw-bold">

                            {{ $totalUsers }}

                        </h2>

                        <p class="text-muted mb-0">

                            Registered Users

                        </p>

                    </div>

                </div>

            </div>


            {{-- Total Skills --}}
            <div class="col-md-6 col-lg-3">

                <div class="card shadow-sm border-0 text-center h-100">

                    <div class="card-body py-4">

                        <div class="mb-3">

                            <i class="bi bi-lightbulb fs-1 text-success"></i>

                        </div>

                        <h2 class="fw-bold">

                            {{ $totalSkills }}

                        </h2>

                        <p class="text-muted mb-0">

                            Available Skills

                        </p>

                    </div>

                </div>

            </div>


            {{-- Total Categories --}}
            <div class="col-md-6 col-lg-3">

                <div class="card shadow-sm border-0 text-center h-100">

                    <div class="card-body py-4">

                        <div class="mb-3">

                            <i class="bi bi-grid fs-1 text-warning"></i>

                        </div>

                        <h2 class="fw-bold">

                            {{ $totalCategories }}

                        </h2>

                        <p class="text-muted mb-0">

                            Skill Categories

                        </p>

                    </div>

                </div>

            </div>


            {{-- Total Requests --}}
            <div class="col-md-6 col-lg-3">

                <div class="card shadow-sm border-0 text-center h-100">

                    <div class="card-body py-4">

                        <div class="mb-3">

                            <i class="bi bi-arrow-left-right fs-1 text-danger"></i>

                        </div>

                        <h2 class="fw-bold">

                            {{ $totalRequests }}

                        </h2>

                        <p class="text-muted mb-0">

                            Skill Requests

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>