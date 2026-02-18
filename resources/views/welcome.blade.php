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
            post1: "{{ asset('images/post/1.jpg') }}",
            post2: "{{ asset('images/post/2.jpg') }}",
            post3: "{{ asset('images/post/3.jpg') }}",
            post4: "{{ asset('images/post/4.jpg') }}",
            vid1: "{{ asset('videos/01.mp4') }}",
            vid2: "{{ asset('videos/02.mp4') }}",
        }
        window.routes = {
            {{--post: "{{ route('post', ['post' => '__ID__']) }}",--}}
            login: "{{ route('login') }}",
        };
    </script>

    <div id="welcome"></div>
@endsection
