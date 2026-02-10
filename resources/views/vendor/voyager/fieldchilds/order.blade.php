@extends('voyager::master')

@section('page_title', $dataType->getTranslatedAttribute('display_name_plural') . ' ' . __('voyager::bread.order'))

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-list"></i>{{ $dataType->getTranslatedAttribute('display_name_plural') }} {{ __('voyager::bread.order') }}
        @if(request()->field != null)
            <a href="{{ route('voyager.fieldchilds.order') }}" class="btn btn-success">برگشت به سربرگ های اصلی</a>
        @endif
    </h1>
@stop

@php
    $field_parents = \App\Models\Field::where('form', 'SELECT')
                                        ->orWhere('form', 'MULTISELECT')
                                        ->orWhere('form', 'MULTICHECKBOX')
                                        ->orWhere('form', 'RADIOBUTTON')->get();
    $field_select = \App\Models\Field::find(request()->field);
@endphp

@section('content')
    <div class="page-content container">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                            @if(request()->field == null)
                                @foreach ($field_parents as $result)
                                    ( <span class="text-primary"> {{$result->name}} </span>
                                    <span class="badge"> {{$result->id}} </span> )
                                    #
                                @endforeach
                            @endif
                            @if(request()->field != null)
                                @foreach($field_parents as $result)
                                    @if($field_select->id == $result->id)
                                        <button class="badge">
                                            ( <span class="text-primary"> {{$result->name}} </span>
                                            <span class="badge"> {{$result->id}} </span> )
                                        </button>
                                        #
                                    @else
                                        ( <span class="text-primary"> {{$result->name}} </span>
                                        <span class="badge"> {{$result->id}} </span> )
                                        #
                                    @endif
                                @endforeach
                            @endif
                        <form action="">
                            <select class="form-control select2" name="field">
                                <option selected disabled>انتخاب زیر مجموعه و مرتب سازی</option>
                                @foreach ($field_parents as $result)
                                    <option value="{{ $result->id }}">{{ $result->name }}</option>
                                @endforeach
                            </select>
                            <div style="padding-top:10px;">
                                <button type="submit" class="btn btn-primary">انتخاب</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        @if(request()->field == null)
                            <p class="panel-title">ابتدا یکی از زیر مجموعه فیلد ها را انتخاب کنید</p>
                        @else
                            <p class="panel-title">
                                <span> مرتب سازی زیر مجموعه فیلد | </span>
                                <i class="text-success"> {{ $field_select->name }} </i>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="panel panel-bordered">
                    <div class="panel-body" style="padding:30px;">
                        <div class="dd">
                            <ol class="dd-list">
                                @if(request()->field == null)
                                    <li class="dd-item" data-id="{{ $result->getKey() }}">
                                        <div class="dd-handle" style="height:inherit">
                                            مجموعه ای انتخاب کنید
                                        </div>
                                    </li>
                                @else
                                    @if($field_select->fieldchilds->count() == 0)
                                        <li class="dd-item" data-id="{{ $result->getKey() }}">
                                            <div class="dd-handle" style="height:inherit">
                                                زیر مجموعه ای ندارد
                                            </div>
                                        </li>
                                    @else
                                        @foreach ($field_select->fieldchilds as $result)
                                            <li class="dd-item" data-id="{{ $result->getKey() }}">
                                                <div class="dd-handle" style="height:inherit">
                                                    @if (isset($dataRow->details->view_order))
                                                    @elseif (isset($dataRow->details->view))
                                                        @include($dataRow->details->view, ['row' => $dataRow, 'dataType' => $dataType, 'dataTypeContent' => $result, 'content' => $result->{$display_column}, 'action' => 'order'])
                                                    @elseif($dataRow->type == 'image')
                                                        <span>
                                            <img
                                                src="@if( !filter_var($result->{$display_column}, FILTER_VALIDATE_URL)){{ Voyager::image( $result->{$display_column} ) }}@else{{ $result->{$display_column} }}@endif"
                                                style="height:100px">
                                        </span>
                                                    @else
                                                        <span>{{ $result->{$display_column} }}</span>
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                @endif
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('javascript')

    <script>
        $(document).ready(function () {
            $('.dd').nestable({
                maxDepth: 1
            });

            /**
             * Reorder items
             */
            $('.dd').on('change', function (e) {
                $.post('{{ route('voyager.'.$dataType->slug.'.order') }}', {
                    order: JSON.stringify($('.dd').nestable('serialize')),
                    _token: '{{ csrf_token() }}'
                }, function (data) {
                    toastr.success("{{ __('voyager::bread.updated_order') }}");
                });
            });
        });
    </script>
@stop
