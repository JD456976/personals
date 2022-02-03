<x-layouts.admin>
    <x-slot name="title">
        Displaying User: {{ $user->email }}
    </x-slot>
    <!-- Anchors and buttons start -->
    <section id="anchors-n-buttons">
        <div class="row match-height justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $user->email }}'s Posts</h4>
                        <h6 class="mt-1">Associated IP: @if(empty($user->ip)) Nothing Recorded @else {{ $user->ip }} @endif</h6>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @if(count($posts)==0)
                                <div class="demo-spacing-0">
                                    <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                        <div class="alert-body d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info me-50"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                            <strong>No posts to display</strong>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @foreach ($posts as $post)
                                <a href="{{ route('post.show', $post->slug) }}"  class="list-group-item {{ ($post->is_expired==1 ? 'list-group-item-warning' : 'list-group-item-action')  }}">{{ $post->title }} </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anchors and buttons end -->
</x-layouts.admin>
