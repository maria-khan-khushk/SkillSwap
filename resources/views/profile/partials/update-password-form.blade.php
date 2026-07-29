<section>

    <h4 class="mb-3">
        Change Password
    </h4>

    <p class="text-muted mb-4">
        Ensure your account is using a strong password to stay secure.
    </p>

    <form method="POST"
          action="{{ route('password.update') }}">

        @csrf
        @method('PUT')

        <!-- Current Password -->

        <div class="mb-3">

            <label class="form-label">

                Current Password

            </label>

            <input
                type="password"
                name="current_password"
                class="form-control">

            @if($errors->updatePassword->has('current_password'))

                <div class="text-danger mt-1">

                    {{ $errors->updatePassword->first('current_password') }}

                </div>

            @endif

        </div>

        <!-- New Password -->

        <div class="mb-3">

            <label class="form-label">

                New Password

            </label>

            <input
                type="password"
                name="password"
                class="form-control">

            @if($errors->updatePassword->has('password'))

                <div class="text-danger mt-1">

                    {{ $errors->updatePassword->first('password') }}

                </div>

            @endif

        </div>

        <!-- Confirm Password -->

        <div class="mb-3">

            <label class="form-label">

                Confirm Password

            </label>

            <input
                type="password"
                name="password_confirmation"
                class="form-control">

            @if($errors->updatePassword->has('password_confirmation'))

                <div class="text-danger mt-1">

                    {{ $errors->updatePassword->first('password_confirmation') }}

                </div>

            @endif

        </div>

        <button
            type="submit"
            class="btn btn-success">

            Update Password

        </button>

        @if (session('status') === 'password-updated')

            <span class="text-success ms-3">

                Password Updated Successfully.

            </span>

        @endif

    </form>

</section>