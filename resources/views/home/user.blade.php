@extends('layouts.panel')

@section('content')
    <h3>ویرایش  من</h3>
    <form class="mt-3" method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-2 row">
            <label for="mobile" class="col-sm-2 col-form-label">موبایل</label>
            <div class="col-sm-10">
                <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror"
                       name="mobile" value="{{ Auth::user()->mobile }}"  placeholder="mobile">
                @error('mobile')
                    <p class=""><strong>{{ $message }}</strong></p>
                @enderror
            </div>
        </div>

        <div class="mb-2 row">
            <label for="name" class="col-sm-2 col-form-label">نام و نام خانوادگی</label>
            <div class="col-sm-10">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ Auth::user()->name }}"  placeholder="name">
            </div>
        </div>

        <div class="mb-2 row">
            <label for="avatar" class="col-sm-2 col-form-label">آواتار</label>
            <div class="col-sm-10">
                <input
                    type="file"
                    class="form-control @error( 'avatar' ) is-invalid @enderror"
                    id="avatar"
                    name="avatar"
                    accept="image/*"
                >
            </div>
        </div>
        <button class="btn btn-primary w-100 mt-2" type="submit" onclick="this.disabled=true;this.form.submit();">ویرایش من</button>
    </form>
    <hr>

    <h3 class="mt-3">لیست کاربران</h3>
    <div class="table-responsive mt-3">
        <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">نام</th>
            <th scope="col">سازنده</th>
            <th scope="col">موبایل</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->name }}</th>
                <td>
                    @if($user->parent()->exists())
                        {{ $user->parent->name }}
                    @else
                        توسط سایت
                    @endif
                </td>
                <td>{{ $user->mobile }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
