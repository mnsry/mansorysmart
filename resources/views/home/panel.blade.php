@extends('layouts.app')

@section('content')
    <div id="app-mqtt">
        <Mqtt />
    </div>
    <br>

    <div class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2" href="#"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <svg class="bi"><use xlink:href="#door-closed"/></svg>
            خروج
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    <script>
        window.assets = {
            profile: "{{ asset('images/app/mansory.jpg') }}",
        }
        window.routes = {
            welcome: "{{ route('welcome') }}",
            @auth
                logout: "{{ route('logout') }}",
                socket: "{{ auth()->user()->id }}|{{ csrf_token() }}",
            @endauth
        };
    </script>
@endsection
