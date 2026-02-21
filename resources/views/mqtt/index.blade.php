@extends('layouts.app')

@section('content')
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

    <div class="card text-center pt-2">
        <a class="btn btn-outline-secondary" href="#"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            خروج
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    <div id="app-mqtt"></div>
@endsection
