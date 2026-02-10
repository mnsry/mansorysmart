@extends('layouts.panel')

@section('content')
    <div class="pt-2 text-center">
        <h5 class="text-primary">{{ $category_select->name }}</h5>
        <p class="lead py-2">جزییات جستجو...</p>
    </div>

    <div class="form-group">
        <form action="{{ route('search.show.fields') }}">
            <div class="form-floating">
                <select class="form-select" id="category" name="category_id">
                    @foreach($category_select->childes as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <label for="category">انتخاب ملک</label>
            </div>
            <button class="btn btn-primary w-100 mt-4" type="submit">بعدی</button>
        </form>
    </div>
    <br><br>
@endsection
