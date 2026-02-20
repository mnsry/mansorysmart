@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column min-vh-100">
        <div class="form-signin w-100 m-auto">
            <a class="btn w-100" href="{{ route('welcome') }}">
                <img class="img-fluid" src="{{ asset('images/app/banner2.png') }}" alt="masoud">
            </a>
            <form class="mt-4" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-floating">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $email ?? old('email') }}" placeholder="name@example.com">
                <label for="email">آدرس ایمیل</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-floating mt-1">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" placeholder="Password">
                <label for="password">گذرواژه جدید</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-floating mt-1">
                <input id="password-confirm" type="password" class="form-control"
                       name="password_confirmation" placeholder="New-Password">
                <label for="password-confirm">تکرار گذرواژه جدید</label>
            </div>
            <button class="btn btn-primary w-100 mt-1" type="submit" onclick="this.disabled=true;this.form.submit();">ذخیره گذرواژه</button>
        </form>
        </div>
    </div>
@endsection
