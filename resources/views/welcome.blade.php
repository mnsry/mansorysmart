@extends('layouts.app')

@section('content')
    <script>
        window.assets = {
            profile: "{{ asset('images/app/mansory.jpg') }}",
        }
        window.routes = {
            {{--post: "{{ route('post', ['post' => '__ID__']) }}",--}}
            login: "{{ route('login') }}",
        };
    </script>

    <div id="welcome"></div>
@endsection
