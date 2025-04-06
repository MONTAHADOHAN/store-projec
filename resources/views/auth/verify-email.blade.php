<x-guest-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white text-center">
                        <h4>Verify Your Email Address</h4>
                    </div>
                    <div class="card-body text-center">
                        <p>Please check your email for a verification link.</p>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success mt-3">
                                A new verification link has been sent to your email.
                            </div>
                        @endif

                        <form method="POST" action="{{ route('verification.send') }}" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Resend Verification Email</button>
                        </form>

                        <form method="POST" action="{{ route('logout') }}" class="mt-2">
                            @csrf
                            <button type="submit" class="btn btn-link">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
