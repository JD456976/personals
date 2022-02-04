<div class="navbar-container d-flex content mt-2 mb-1">
    <ul class="nav navbar-nav align-items-center ms-auto">
        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                                                                                     data-feather="moon"></i></a>
        </li>
        @can('is-admin')
            <li class="nav-item d-none d-lg-block"><a href="{{ route('admin.dashboard') }}" class="nav-link">Admin</a>
            </li>
            <li class="nav-item d-none d-lg-block"><a href="{{ route('admin.scraper') }}" class="nav-link">Scraper</a>
            </li>
        @endcan
        @foreach ($mainMenu as $item)
            <li class="nav-item d-none d-lg-block"><a href="{{ route('page', $item->slug) }}" class="nav-link">{{ $item->title }}</a>
            </li>
        @endforeach
        <li class="nav-item d-none d-lg-block"><a href="{{ route('contact')}}" class="nav-link">Contact</a>
        </li>
        <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                                                       id="dropdown-user" href="#" data-bs-toggle="dropdown"
                                                       aria-haspopup="true" aria-expanded="false">
                <div class="user-nav d-sm-flex d-none"><span style="margin-top: 5px"
                                                             class="user-name fw-bolder">{{ Auth::user()->email }}</span>
                </div>

            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                <a class="dropdown-item"
                   href="{{ route('post.create') }}"><i
                            class="me-50" data-feather="pen-tool"></i> New Post</a>
                <a class="dropdown-item"
                   href="{{ route('user.posts') }}"><i
                            class="me-50" data-feather="folder"></i> My Posts</a>
                {!! Form::open(['route' => 'logout', 'method' => 'post']) !!}
                {!! Form::submit('Logout', ['class' => 'form-control', 'type' => 'button']) !!}
                {!! Form::close() !!}

            </div>
        </li>
    </ul>
</div>
