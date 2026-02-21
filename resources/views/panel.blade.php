@extends('layouts.app')

@section('content')
        <div class="card text-center pt-2">
        <a class="btn btn-outline-secondary" href="#"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            خروج
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    <div id="panel"></div>
@endsection
