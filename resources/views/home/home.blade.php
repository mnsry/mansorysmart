@extends('layouts.app')

@section('content')
    <div id="app-panel">
        <AppPanel/>
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
    <br>

    <script>
        window.assets = {
            profile: "{{ asset('images/app/mansory.jpg') }}",
        }
        window.routes = {
            {{--            post: "{{ route('post', ['post' => '__ID__']) }}",--}}
            logout: "{{ route('logout') }}",
        };
    </script>
@endsection
