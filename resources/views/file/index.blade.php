@extends('layouts.panel')

@section('content')

    @foreach ($files as $file)
        <div class="card my-2">
            <div class="card-header">
                {{ $file->user->name }}
                <div class="float-end">
                    <a class="btn" href="tel:{{ $file->user->mobile }}"> {{ $file->user->mobile }} </a>
                </div>
            </div>
            <a href="{{ route('file.show', $file )}}" class="btn">
                <div class="card-body text-center">
                    <p class="card-text">
                        {{ $file->category->parent->name }} | {{ $file->category->name }}
                        | {{ $file->created_at->diffForHumans() }}
                        @if( $file->like == 1)
                            <span class="badge text-bg-danger ">لایک</span>
                        @endif
                        @if( $file->shekar == 1)
                            <span class="badge text-bg-danger ">شکار</span>
                        @endif
                    </p>
                    <p class="card-text">
                        توضیحات:
                        <span>
                    @if( $file->aboute == null)
                        ندارد
                    @else
                        {{ $file->aboute }}
                    @endif
                </span>
                    </p>
                </div>
            </a>
        </div>
    @endforeach
    <br><br>
@endsection
