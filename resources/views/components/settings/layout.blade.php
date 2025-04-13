<div class="container-fluid">
    <div class="row">
        <!-- Left Navigation -->
        <div class="col-md-3 col-12 mb-4">
            <div class="list-group">
                <a href="{{ route('settings.profile') }}"
                    class="list-group-item list-group-item-action {{ request()->routeIs('settings.profile') ? 'active' : '' }}"
                    wire:navigate>
                    {{ __('Profile') }}
                </a>
                <a href="{{ route('settings.password') }}"
                    class="list-group-item list-group-item-action {{ request()->routeIs('settings.password') ? 'active' : '' }}"
                    wire:navigate>
                    {{ __('Password') }}
                </a>
            </div>
        </div>

        <!-- Separator (Mobile Only) -->
        <div class="col-12 d-block d-md-none">
            <hr class="my-4">
        </div>

        <!-- Content Area -->
        <div class="col-md-9 col-12">
            <div class="mb-4">
                <h3 class="mb-1">{{ $heading ?? '' }}</h3>
                <p class="text-muted">{{ $subheading ?? '' }}</p>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="mw-600">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
