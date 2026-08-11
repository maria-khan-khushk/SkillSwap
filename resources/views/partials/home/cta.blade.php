<section class="py-5">

    <div class="container">

        <div class="text-center">

            <h2>

                Ready to Start Learning?

            </h2>

            <p class="text-secondary">

                Join SkillSwap today and connect with talented students.

            </p>

           @if(auth()->check())

    <a href="{{ route('dashboard') }}"
       class="btn btn-primary">

        Go to Dashboard

    </a>

@else

    <a href="{{ route('register') }}"
       class="btn btn-primary">

        Join Now

    </a>

@endif

        </div>

    </div>

</section>