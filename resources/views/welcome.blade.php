@extends('layouts.app')

@section('content')
    <script>
        window.assets = {
            profile: "{{ asset('images/app/mansory.png') }}",
            banner: "{{ asset('images/app/banner.png') }}",
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
            vid1: "{{ asset('videos/01.mp4') }}",
            vid2: "{{ asset('videos/02.mp4') }}",
        }
        window.routes = {
            login: "{{ route('login') }}",
            register: "{{ route('register') }}",
        };
    </script>

    <div id="welcome"></div>
@endsection
