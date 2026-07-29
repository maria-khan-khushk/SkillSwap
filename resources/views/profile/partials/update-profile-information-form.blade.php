<section>

    <h4 class="mb-3">
        Profile Information
    </h4>

    <p class="text-muted mb-4">
        Update your account's profile information and email address.
    </p>

    <form id="send-verification"
          method="POST"
          action="{{ route('verification.send') }}">

        @csrf

    </form>

    <form method="POST"
          action="{{ route('profile.update') }}">

        @csrf
        @method('PATCH')

        <!-- Name -->

        <div class="mb-3">

            <label class="form-label">

                Name

            </label>

            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $user->name) }}"
                required>

            @error('name')

                <div class="text-danger mt-1">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <!-- Email -->

        <div class="mb-3">

            <label class="form-label">

                Email

            </label>

            <input
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email', $user->email) }}"
                required>

            @error('email')

                <div class="text-danger mt-1">

                    {{ $message }}

                </div>

            @enderror

        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

            <div class="alert alert-warning">

                Your email address is unverified.

                <button
                    form="send-verification"
                    class="btn btn-link p-0">

                    Click here to re-send the verification email.

                </button>

            </div>

            @if (session('status') === 'verification-link-sent')

                <div class="alert alert-success">

                    Verification link sent successfully.

                </div>

            @endif

        @endif

        <button
            type="submit"
            class="btn btn-primary">

            Save Changes

        </button>

        @if (session('status') === 'profile-updated')

            <span class="text-success ms-3">

                Profile Updated Successfully.

            </span>

        @endif

    </form>

</section>