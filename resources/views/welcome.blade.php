@extends('layouts.app')

@section('content')
    <script>
        window.assets = {
            profile: "{{ asset('images/app/mansory.png') }}",
            story: "{{ asset('images/app/mansory2.png') }}",
            plc: "{{ asset('images/story/plc.webp') }}",
            hmi: "{{ asset('images/story/hmi.png') }}",
            iot: "{{ asset('images/story/iot.png') }}",
            servo: "{{ asset('images/story/servo.png') }}",
            inverter: "{{ asset('images/story/inverter.jpg') }}",
            cnc: "{{ asset('images/story/cnc.png') }}",
            laravel: "{{ asset('images/story/laravel.png') }}",
            node: "{{ asset('images/story/node.png') }}",
            github: "{{ asset('images/story/github.png') }}",
            mqtt: "{{ asset('images/story/mqtt.png') }}",
            test: "{{ asset('images/post/test.jpg') }}",
        }
        window.routes = {
            {{--post: "{{ route('post', ['post' => '__ID__']) }}",--}}
            login: "{{ route('login') }}",
        };
    </script>

    <div id="welcome"></div>
@endsection
