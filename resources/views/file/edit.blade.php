@extends('layouts.panel')
@section('content')

    <div class="pt-2 text-center">
        <h2 class="text-primary">{{ $file->category->parent->name }} - {{ $file->category->name }}</h2>
        <p class="lead py-2"><span> اطلاعات ملک </span> - <span class="text-primary"> {{ $file->user->name }} </span></p>
    </div>
    <div class="form-group">
        <form action="{{ route('file.update', $file) }}" method="POST">
        @csrf
        @method('put')
        <input type="hidden" name="category_id" value="{{ $file->category->id }}" />
        <input type="hidden" name="user_id" value="{{ $file->user->id }}" />

        @foreach($file->category->fields as $field)
            @if($field->form == 'TEXT')
                <div class="form-floating mt-3">
                    @php
                        $value = DB::table('files')->whereId($file->id)->value($field->slug);
                    @endphp
                    <input
                        type="text"
                        class="form-control @error( $field->slug ) is-invalid @enderror"
                        id="{{ $field->slug }}"
                        placeholder="{{ $field->name }}"
                        name="{{ $field->slug }}"
                        value="{{ $value }}"
                        {{ $field->optional == 0 ? 'required' : '' }}
                    >
                    <label for="{{ $field->slug }}">{{ $field->name }}
                        @if($field->optional == 1)
                            <small class="translate-middle-y badge text-success">(اختیاری)</small>
                        @endif
                    </label>
                </div>
            @endif

            @if($field->form == 'TEXTAREA')
                <div class="form-floating mt-3">
                    @php
                        $value = DB::table('files')->whereId($file->id)->value($field->slug);
                    @endphp
                    <textarea
                        class="form-control @error( $field->slug ) is-invalid @enderror"
                        placeholder="{{ $field->name }}"
                        id="{{ $field->slug }}"
                        name="{{ $field->slug }}"
                        {{ $field->optional == 0 ? 'required' : '' }}
                        style="height: 100px"
                    >{{ $value }}</textarea>
                    <label for="{{ $field->slug }}">{{ $field->name }}
                        @if($field->optional == 1)
                            <small class="translate-middle-y badge text-success">(اختیاری)</small>
                        @endif
                    </label>
                </div>
            @endif

            @if($field->form == 'NUMBER')
                <div class="form-floating mt-3">
                    @php
                        $value = DB::table('files')->whereId($file->id)->value($field->slug);
                    @endphp
                    <input
                        type="number"
                        class="form-control @error( $field->slug ) is-invalid @enderror"
                        id="{{ $field->slug }}"
                        placeholder="{{ $field->name }}"
                        name="{{ $field->slug }}"
                        value="{{ $value }}"
                        {{ $field->optional == 0 ? 'required' : '' }}
                    >
                    <label for="{{ $field->slug }}">{{ $field->name }}
                        @if($field->optional == 1)
                            <small class="translate-middle-y badge text-success">(اختیاری)</small>
                        @endif
                    </label>
                </div>
            @endif

            @if($field->form == 'SELECT')
                <div class="form-floating mt-3">
                    @php
                        $value = DB::table('files')->whereId($file->id)->value($field->slug);
                    @endphp
                    <select
                        class="form-select @error( $field->slug ) is-invalid @enderror"
                        id="{{ $field->slug }}"
                        name="{{ $field->slug }}"
                        {{ $field->optional == 0 ? 'required' : '' }}
                    >
                        <option disabled selected value="">
                            @if(is_null( $value ))
                                فیلد انتخاب نشده
                            @else
                                " {{ DB::table('fieldchilds')->whereId($value)->value('name') }} "
                            @endif
                        </option>
                        @foreach($field->fieldchilds as $fieldchild)
                            @if ($field->field_child_categories == 0)
                                <option value="{{ $fieldchild->id }}" @selected($value == $fieldchild->id)>
                                    {{ $fieldchild->name }}
                                </option>
                            @endif
                            @if ($field->field_child_categories == 1)
                                @foreach($fieldchild->categories as $category)
                                    @if($category->id == $category_select->id)
                                        <option value="{{ $fieldchild->id }}" @selected($value == $fieldchild->id)>
                                            {{ $fieldchild->name }}
                                        </option>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        @if(!is_null( $value ) &&  $field->optional == 1)
                            <option value="">حذف انتخاب</option>
                        @endif
                    </select>
                    <label for="{{ $field->slug }}">{{ $field->name }}
                        @if($field->optional == 1)
                            <small class="translate-middle-y badge text-success">(اختیاری)</small>
                        @endif
                    </label>
                </div>
            @endif

            @if($field->form == 'MULTISELECT')
                <div class="form-floating mt-3">
                    <select
                        class="form-select @error( $field->slug ) is-invalid @enderror"
                        style="height: 100px"
                        id="{{ $field->slug }}"
                        name="{{ $field->slug }}[]"
                        multiple
                        {{ $field->optional == 0 ? 'required' : '' }}
                    >
                        @php
                            $value = DB::table('files')->whereId($file->id)->value($field->slug);;
                            $val = json_decode($value, true);
                        @endphp
                        <option disabled selected value="">
                            @if($val == [] || $val == [null])
                                انتخاب نشده
                            @else
                                @foreach (DB::table('fieldchilds')->whereIn('id', $val)->get() as $fieldchid)
                                    {{ $fieldchid->name }}
                                @endforeach
                            @endif
                        </option>
                        @foreach($field->fieldchilds as $fieldchild)
                            @if ($field->field_child_categories == 0)
                                <option value="{{ $fieldchild->id }}"
                                    @if($val != [])
                                        {{ in_array($fieldchild->id, $val)  ? 'selected' : '' }}
                                    @endif
                                >
                                    {{ $fieldchild->name }}
                                </option>
                            @endif
                            @if ($field->field_child_categories == 1)
                                @foreach($fieldchild->categories as $category)
                                    @if($category->id == $category_select->id)
                                        <option value="{{ $fieldchild->id }}"
                                        @if($val != [])
                                            {{ in_array($fieldchild->id, $val)  ? 'selected' : '' }}
                                        @endif
                                        >
                                            {{ $fieldchild->name }}
                                        </option>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        @if($val != [])
                            @if($val != [null])
                                @if($field->optional == 1)
                                    <option value="">حذف انتخاب</option>
                                @endif
                            @endif
                        @endif
                    </select>
                    <label for="{{ $field->slug }}">{{ $field->name }}
                        @if($field->optional == 1)
                            <small class="translate-middle-y badge text-success">(اختیاری)</small>
                        @endif
                    </label>
                </div>
            @endif

            @if($field->form == 'RADIOBUTTON')
                <p class="form-check form-check-inline mt-3"> {{ $field->name }}</p>
                @if($field->optional == 1)
                    <small class="translate-middle-y badge text-success">(اختیاری)</small>
                @endif
                <br>
                @php
                    $value = DB::table('files')->whereId($file->id)->value($field->slug);
                @endphp
                @foreach($field->fieldchilds as $fieldchild)
                    <div class="form-check form-check-inline">
                        @if ($field->field_child_categories == 0)
                            <input
                                type="radio"
                                class="form-check-input @error( $field->slug ) is-invalid @enderror"
                                id="{{ $fieldchild->slug }}"
                                value="{{ $fieldchild->id }}"
                                name="{{ $field->slug }}"
                                {{ $value == $fieldchild->id ? 'checked' : '' }}
                                {{ $field->optional == 0 ? 'required' : '' }}
                            >
                        @endif
                        @if ($field->field_child_categories == 1)
                            @foreach($fieldchild->categories as $category)
                                @if($category->id == $category_select->id)
                                    <input
                                        type="radio"
                                        class="form-check-input @error( $field->slug ) is-invalid @enderror"
                                        id="{{ $fieldchild->slug }}"
                                        value="{{ $fieldchild->id }}"
                                        name="{{ $field->slug }}"
                                        {{ $value == $fieldchild->id ? 'checked' : '' }}
                                        {{ $field->optional == 0 ? 'required' : '' }}
                                    >
                                @endif
                            @endforeach
                        @endif
                        <label class="form-check-label" for="{{ $fieldchild->slug }}">{{ $fieldchild->name }}</label>
                    </div>
                @endforeach
                @if(!is_null( $value ) &&  $field->optional == 1)
                    <div class="form-check form-check-inline">
                        <input
                            type="radio"
                            class="form-check-input"
                            id="del"
                            value=""
                            name="{{ $field->slug }}"
                            {{ $field->optional == 0 ? 'required' : '' }}
                        >
                        <label class="form-check-label" for="del">حذف انتخاب</label>
                    </div>
                @endif
                <br>
            @endif

            @if($field->form == 'CHECKBOX')
                <div class="form-check form-switch form-check-inline mt-3">
                    @php
                        $value = DB::table('files')->whereId($file->id)->value($field->slug);
                    @endphp
                    <input type="hidden" value="0" name="{{ $field->slug }}">
                    <input
                        type="checkbox"
                        class="form-check-input @error( $field->slug ) is-invalid @enderror"
                        id="{{ $field->slug }}"
                        value="1"
                        name="{{ $field->slug }}"
                        {{ $value == 1 ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="{{ $field->slug }}">{{ $field->name }}
                        @if($field->optional == 1)
                            <small class="translate-middle-y badge text-success">(اختیاری)</small>
                        @endif
                    </label>
                </div>
            @endif

            @if($field->form == 'MULTICHECKBOX')
                <p class="form-check form-check-inline mt-3"> {{ $field->name }}</p>
                @if($field->optional == 1)
                    <small class="translate-middle-y badge text-success">(اختیاری)</small>
                @endif
                <br>
                @php
                    $value = DB::table('files')->whereId($file->id)->value($field->slug);;
                    $val = json_decode($value, true);
                @endphp
                    <input type="hidden" value="" name="{{ $field->slug }}[]">
                @foreach($field->fieldchilds as $fieldchild)
                    <div class="form-check form-check-inline">
                        @if ($field->field_child_categories == 0)
                            <input
                                type="checkbox"
                                class="form-check-input @error( $field->slug ) is-invalid @enderror"
                                id="{{ $fieldchild->slug }}"
                                value="{{ $fieldchild->id }}"
                                name="{{ $field->slug }}[]"
                                @if($val != [])
                                    {{ in_array($fieldchild->id, $val)  ? 'checked' : '' }}
                                @endif
                            >
                        @endif
                        @if ($field->field_child_categories == 1)
                            @foreach($fieldchild->categories as $category)
                                @if($category->id == $category_select->id)
                                    <input
                                        type="checkbox"
                                        class="form-check-input @error( $field->slug ) is-invalid @enderror"
                                        id="{{ $fieldchild->slug }}"
                                        value="{{ $fieldchild->id }}"
                                        name="{{ $field->slug }}[]"
                                        @if($val != [])
                                            {{ in_array($fieldchild->id, $val)  ? 'checked' : '' }}
                                        @endif
                                    >
                                @endif
                            @endforeach
                        @endif
                        <label class="form-check-label" for="{{ $field->slug }}">{{ $fieldchild->name }}</label>
                    </div>
                @endforeach
                <br>
            @endif

            @if($field->form == 'IMAGE')
                <div class="input-group mt-3">
                    <label class="input-group-text" for="{{ $field->slug }}">{{ $field->name }}
                        @if($field->optional == 1)
                            <small class="translate-middle-y badge text-success">(اختیاری)</small>
                        @endif
                    </label>
                    <input
                        type="file"
                        class="form-control @error( $field->slug ) is-invalid @enderror"
                        id="{{ $field->slug }}"
                        name="{{ $field->slug }}"
                        accept="image/*"
                        {{ $field->optional == 0 ? 'required' : '' }}
                    >
                </div>
            @endif

            @if($field->form == 'MULTIIMAGE')
                <div class="input-group mt-3">
                    <label class="input-group-text" for="{{ $field->slug }}">{{ $field->name }}
                        @if($field->optional == 1)
                            <small class="translate-middle-y badge text-success">(اختیاری)</small>
                        @endif
                    </label>
                    <input
                        type="file"
                        class="form-control @error( $field->slug ) is-invalid @enderror"
                        id="{{ $field->slug }}"
                        name="{{ $field->slug }}[]"
                        accept="image/*"
                        {{ $field->optional == 0 ? 'required' : '' }}
                        multiple
                    >
                </div>
            @endif

            @if($field->form == 'DATE')
                <div class="d-flex text-center mt-3">
                    <div class="form-floating w-50 me-1">
                        <select
                            class="form-select"
                            id="{{ $field->slug }}day"
                            name="{{ $field->slug }}day"
                            {{ $field->optional == 0 ? 'required' : '' }}
                        >
                            <option selected disabled value="">
                                @if(is_null( $file->takhleyeday ))
                                    " انتخاب نشده "
                                @else
                                    " {{ $file->takhleyeday }} "
                                @endif
                                </option>
                            @php
                                $days = collect([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31])->all();
                            @endphp
                            @foreach($days as $day)
                                <option value="{{ $day }}" @selected( $file->takhleyeday  == $day)>
                                    {{ $day }}
                                </option>
                            @endforeach
                        </select>
                        <label for="{{ $field->slug }}">{{ $field->name }}
                            @if($field->optional == 1)
                                <small class="translate-middle-y badge text-success">(اختیاری)</small>
                            @endif
                        </label>
                    </div>

                    <div class="form-floating w-50 ms-1">
                        <select
                            class="form-select"
                            id="{{ $field->slug }}month"
                            name="{{ $field->slug }}month"
                            {{ $field->optional == 0 ? 'required' : '' }}
                        >
                            <option selected disabled value="">
                                @if(is_null( $file->takhleyemonth ))
                                    " انتخاب نشده "
                                @else
                                    " {{ $file->takhleyemonth }} "
                                @endif
                            </option>
                            @php
                                $months = collect(['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','ابان','آذر','دی','بهمن','اسفند',])->all();
                            @endphp
                            @foreach($months as $key=>$month)
                                <option @selected($file->takhleyemonth == $key+1) value="{{ $key+1 }}" >
                                    {{ $month }}
                                </option>
                            @endforeach
                        </select>
                        <label for="{{ $field->slug }}">{{ $field->name }}
                            @if($field->optional == 1)
                                <small class="translate-middle-y badge text-success">(اختیاری)</small>
                            @endif
                        </label>
                    </div>
                </div>
            @endif
        @endforeach
        <button class="btn btn-primary w-100 mt-3" type="submit">ثبت</button>
    </form>
    </div>
    <br><br>
@endsection
