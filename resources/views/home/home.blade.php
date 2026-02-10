@extends('layouts.app')

@section('content')
    <div id="app-panel">
        <AppPanel/>
    </div>

    <script>
        window.assets = {
            profile: "{{ asset('images/app/mansory.jpg') }}",
        }
        window.routes = {
            {{--            post: "{{ route('post', ['post' => '__ID__']) }}",--}}
            login: "{{ route('login') }}",
        };
    </script>
@endsection
