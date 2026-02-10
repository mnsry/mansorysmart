@extends('layouts.panel')
@section('content')
    <div class="py-2 text-center">
        <h5 class="text-primary">{{ $category_select->parent->name }} > {{ $category_select->name }} > {{ $field->name }}</h5>
    </div>
    <div class="py-2 text-center">
        <h5 class=""> لطفا از این فیلد {{ $field->name }} استفاده نکنید </h5>
        <h5 class="">یا این جستجو اشتباه است</h5>
    </div>
    <br><br>
@endsection
