@extends('layouts.panel')

@section('content')
    <div class="pt-2 text-center">
        <h5 class="text-primary">شروع جستجو</h5>
        <p class="lead py-2">جزییات جستجو...</p>
    </div>

    <div class="form-group">
        <form action="{{ route('search.select') }}">
            <div class="form-group">
                <select class="form-select" name="category_id" aria-label="category_id">
                    @php
                        $categories = \App\Models\Category::whereNull('parent_id')->orderBy('order', 'ASC')->get();
                    @endphp
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button class="btn btn-primary w-100 mt-1" type="submit">بعدی</button>
        </form>
    </div>
    <br>
@endsection
