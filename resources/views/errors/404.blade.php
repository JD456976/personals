<x-layouts.page>
    <x-slot name="title">
        Error - 404
    </x-slot>
    <!-- Error page-->
    <div class="misc-wrapper"><a class="brand-logo" href="{{ route('home') }}">
            <a class="navbar-brand" href="{{ route('home') }}"><span style="font-size:52px;"
                                                                     class="brand-logo">
                           🌚🌝</span>

            </a>
            <h2 class="brand-text text-primary ms-1">NightMeetsDay</h2>
        </a>
        <div class="misc-inner p-2 p-sm-3">
            <div class="w-100 text-center">
                <h2 class="mb-1">Page Not Found 🕵🏻‍♀️</h2>
                <p class="mb-2">Oops! 😖 The requested URL was not found on this server.</p><a class="btn btn-primary mb-2 btn-sm-block" href="{{ route('home') }}">Back to home</a><img class="img-fluid" src="../../../app-assets/images/pages/error.svg" alt="Error page" />
            </div>
        </div>
    </div>
    <!-- / Error page-->
</x-layouts.page>
