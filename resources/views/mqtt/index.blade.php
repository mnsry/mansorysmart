@extends('layouts.app')

@section('content')
    <script>
        window.routes = {
            socket: "{{ auth()->user()->id }}|{{ csrf_token() }}",
        };
    </script>

    <nav class="navbar fixed-top bg-light">
        <div class="container-fluid">
            <div class="dropdown">
                <a href="#"
                   class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ Voyager::image(Auth::user()->avatar) }}" alt="mdo" width="32" height="32"
                         class="rounded-circle">
                    <span class="small">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li>
                        <a class="btn btn-outline-secondary dropdown-item" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            خروج
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <img src="{{ asset('images/app/banner2.png') }}" alt="" height="17">
        </div>
    </nav>
    <div style="height: 33px;"></div>
    <hr>

    <div id="mqtt"></div>
@endsection
