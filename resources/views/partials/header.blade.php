<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center"
     data-nav="brand-center">
    <a style="float:left; padding: 30px" href="{{ route('home') }}"><h2 class="brand-text">NightMeetsDay</h2></a>

    <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" href="{{ route('home') }}"><span style="font-size:52px;"
                        class="brand-logo">
                           🌚🌝</span>

                </a>
            </li>
        </ul>
    </div>
    @include('partials.main-menu')
</nav>


<!-- END: Header-->
