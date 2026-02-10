@extends('layouts.panel')
@section('content')
    <div class="pt-2 text-center">
        <h5 class="text-primary">{{ $category_select->parent->name }} > {{ $category_select->name }}</h5>
        <p class="lead py-2">جزییات جستجو...</p>
    </div>

    <div class="form-group">
        <form class="pt-2" action="{{ route('search.select.field') }}">
            <div class="form-floating">
                <select class="form-select" id="field" name="field_id">
                    @foreach($category_select->fields as $field)
                        <option value="{{ $field->id }}">{{ $field->name }}</option>
                    @endforeach
                </select>
                <label for="field">یک فیلد انتخاب کنید</label>
            </div>
            <input
                type="hidden"
                name="category_id"
                value="{{ $category_select->id }}"
            >
            <button class="btn btn-primary w-100 mt-4" type="submit">بعدی</button>
        </form>
    </div>
    <br><br>
@endsection
