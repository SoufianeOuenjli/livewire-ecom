<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <!-- Header -->
            <div class="text-center mb-5">
                <h1 class="display-5 mb-3 fw-bold">{{ __('Log in to your account') }}</h1>
                <p class="lead text-muted">{{ __('Enter your email and password below to log in') }}</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success text-center mb-4">{{ session('status') }}</div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form wire:submit="login">
                        <!-- Email Address -->
                        <div class="mb-4">
                            <label class="form-label fw-medium">{{ __('Email address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       wire:model="email"
                                       required
                                       autofocus
                                       autocomplete="email"
                                       placeholder="email@example.com">
                            </div>
                            @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="form-label fw-medium">{{ __('Password') }}</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                       class="text-decoration-none text-muted small"
                                       wire:navigate>
                                        {{ __('Forgot password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       wire:model="password"
                                       required
                                       autocomplete="current-password"
                                       placeholder="{{ __('Enter password') }}">
                            </div>
                            @error('password')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-4 form-check">
                            <input type="checkbox"
                                   class="form-check-input"
                                   wire:model="remember"
                                   id="remember">
                            <label class="form-check-label" for="remember">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                                class="btn btn-primary w-100 py-2 mb-3"
                                wire:loading.attr="disabled">
                            <span wire:loading.remove>{{ __('Log in') }}</span>
                            <span wire:loading>
                                <span class="spinner-border spinner-border-sm"
                                      role="status"
                                      aria-hidden="true"></span>
                                {{ __('Logging in...') }}
                            </span>
                        </button>

                        @if (Route::has('register'))
                            <div class="text-center mt-4 pt-3 border-top">
                                <p class="text-muted mb-0">{{ __("Don't have an account?") }}</p>
                                <a href="{{ route('register') }}"
                                   class="btn btn-outline-primary mt-2"
                                   wire:navigate>
                                    {{ __('Create free account') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


