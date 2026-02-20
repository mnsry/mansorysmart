@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column min-vh-100">
        <div class="form-signin w-100 m-auto">
            <a class="btn w-100" href="{{ route('welcome') }}">
                <img class="img-fluid" src="{{ asset('images/app/banner2.png') }}" alt="masoud">
            </a>
            @if (session('status'))
                <div class="mt-4 alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form class="mt-4" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-floating">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" placeholder="name@example.com">
                    <label for="email" >آدرس ایمیل بازیابی</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button class="btn btn-primary w-100 mt-1" type="submit" onclick="this.disabled=true;this.form.submit();">ارسال لینک تغییر گذرواژه</button>
            </form>
            <a class="mt-3 btn w-100" href="{{ route('login') }}">برگشت به صفحه ورود</a>
            <a class="btn w-100" href="{{ route('register') }}">ایجاد یک حساب جدید</a>
        </div>
    </div>
@endsection
