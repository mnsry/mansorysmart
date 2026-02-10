@extends('layouts.app')

@section('content')
    <body class="d-flex align-items-center">
        <div class="form-signin w-100 m-auto">
            <a class="btn w-100" href="{{ route('welcome') }}">اینترنت نداریم </a>
            <a class="btn btn-primary w-100 mt-4" href="{{ route('welcome') }}">بریم صفحه نخست</a>
        </div>
    </body>
@endsection
