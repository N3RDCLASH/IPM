{{-- Main App --}}
<div class="sidebar" data-color="black" data-active-color="success">
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
                <a href="{{ route('home') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                <a href="{{ route('profile.edit') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __('Profile') }}</p>
                </a>
            </li>
            @if(Auth::user()->hasRole('admin'))


            <li>
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span href="#">
                        <i class="nc-icon nc-ruler-pencil"></i>
                    </span>{{ __('Administratie') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="clearfix"></div>
                <div class="collapse show" id="collapseExample">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'users' ? 'active' : '' }}">
                            <a href="{{ route('users') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __('Users') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'klassen' ? 'active' : '' }}">
                            <a href="{{ route('klassen') }}">
                                <i class="nc-icon nc-hat-3"></i>
                                <p>{{ __('Klassen') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'richtingen' ? 'active' : '' }}">
                            <a href="{{ route('richtingen') }}">
                                <i class="nc-icon nc-tag-content"></i>
                                <p>{{ __('Richtingen') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'vakken' ? 'active' : '' }}">
                            <a href="{{ route('vakken') }}">
                                <i class="nc-icon nc-ruler-pencil"></i>
                                <p>{{ __('Vakken') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cijfers' ? 'active' : '' }}">
                            <a href="{{ route('cijfers') }}">
                                <i class="nc-icon nc-tile-56"></i>
                                <p>{{ __('Cijfers') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
            <li class="{{ $elementActive == 'services' ? 'active' : '' }}">
                <a href="{{ route('services') }}">
                    <i class="nc-icon nc-cart-simple"></i>
                    <p>{{ __('Services') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'saldo' ? 'active' : '' }}">
                <a href="{{ route('saldo') }}">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>{{ __('Saldo') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>