<section>

    <h4 class="mb-3">
        Delete Account
    </h4>

    <p class="text-muted mb-4">
        Once your account is deleted, all your data will be permanently removed.
        This action cannot be undone.
    </p>

    <form method="POST"
          action="{{ route('profile.destroy') }}"
          onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">

        @csrf
        @method('DELETE')

        <div class="mb-3">

            <label class="form-label">

                Enter Your Password

            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Enter your password"
                required>

            @if($errors->userDeletion->has('password'))

                <div class="text-danger mt-1">

                    {{ $errors->userDeletion->first('password') }}

                </div>

            @endif

        </div>

        <button
            type="submit"
            class="btn btn-danger">

            Delete My Account

        </button>

    </form>

</section>