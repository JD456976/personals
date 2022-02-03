<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0">
        <span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2022

            <span class="d-none d-sm-inline-block">, All rights Reserved</span>
        </span>
        @foreach ($footerMenu as $item)
            <a href="{{ route('page', $item->slug) }}"><span class="float-md-end d-none d-md-block">{{ $item->title }}</span></a>
        @endforeach
    </p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->
