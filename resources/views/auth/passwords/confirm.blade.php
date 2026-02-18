@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column min-vh-100">
        <div class="form-signin w-100 m-auto">
            <a class="btn w-100" href="{{ route('welcome') }}">MANSORY SMART</a>
            <form class="mt-4" method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="form-floating">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" placeholder="password">
                    <label for="password" >گذرواژه</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button class="btn btn-primary w-100 mt-1" type="submit" onclick="this.disabled=true;this.form.submit();">تایید گذرواژه</button>
            </form>
            <a class="btn w-100" href="{{ route('password.request') }}">گذرواژه ام را فراموش کردم</a>
        </div>
    </div>
@endsection
