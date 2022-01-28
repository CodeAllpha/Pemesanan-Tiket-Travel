@extends('layouts.login')

@section('content')
<main class="login">
    <div class="container">
        <div class="row page-login">
            <div class="section-right col-12 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h1>Sign In</h1>
                        </div>
                    </div>
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1"
                                >Email address</label
                            >
                            <input
                            id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Masukan Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"
                                >Password</label
                            >
                            <input
                            id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukan Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input
                            class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label
                                class="form-check-label"
                                for="remember"
                                >Remember Me</label
                            >
                        </div>
                        <button
                            type="submit"
                            class="btn btn-primary btn-block mt-4"
                        >
                            Sign in
                        </button>
                        @if (Route::has('password.request'))
                        <p class="text-center mt-3">
                            <a href="{{ route('password.request') }}">Lupa Password</a>
                        </p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
