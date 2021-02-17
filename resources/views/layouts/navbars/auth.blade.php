{{-- Main App --}}
<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/natin-logo.png">
            </div>
        </a>
        <a href="http://natin.sr" target="_blank" class="simple-text logo-normal">
            {{ __('Natin') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'users' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'users') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __('Users') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'services' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'services') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Services') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'saldo' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'saldo') }}">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>{{ __('Saldo') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
