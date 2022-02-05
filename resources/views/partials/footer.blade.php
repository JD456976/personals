<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <div class="row">
        <div class="col-3">
            <p class="clearfix">
        <span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2022

            <span class="d-none d-sm-inline-block">, All rights Reserved</span>
        </span>
            </p>
        </div>
        <div class="col-8 text-end">
            <ul style="margin-top:3px;">
                @foreach ($footerMenu as $item)
                    <li style="display:inline-block; margin-left: 5px;">
                        <a href="{{ route('page', $item->slug) }}"><span
                                class="float-md-end d-none d-md-block">{{ $item->title }}</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->
