@extends('layouts.app')

@section('content')
    <div id="app-mqtt">
        <Mqtt />
    </div>

    <script>
        window.assets = {
            profile: "{{ asset('images/app/mansory.jpg') }}",
        }
        window.routes = {
{{--            post: "{{ route('post', ['post' => '__ID__']) }}",--}}
            welcome: "{{ route('welcome') }}",
        };
    </script>
@endsection
