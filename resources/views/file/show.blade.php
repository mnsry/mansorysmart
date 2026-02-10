@extends('layouts.panel')

@section('content')
    <div class="card mt-2">
        <div class="card-header">
            {{ $file->user->name }}
            <div class="float-end">
                <a class="btn" href="tel:{{ $file->user->mobile }}"> {{ $file->user->mobile }} </a>
            </div>
        </div>
        <div class="card-body text-center">
            <p class="card-text">
                {{ $file->category->parent->name }} | {{ $file->category->name }} | {{ $file->created_at->diffForHumans() }}
            </p>
            <div class="list-group">
                @foreach ($file->category->fields as $field)
                    <div class="d-flex gap-2 w-100 justify-content-between pt-1">
                        <h6 class="mb-0">{{ $field->name }}</h6>
                        @if ($file->hosCol($field->slug))
                            @php
                                $value = DB::table('files')->whereId($file->id)->value($field->slug);
                                $type = $file->type($field->slug);
                            @endphp
                            @if($type == 'integer')
                                @if($file->isFK($field->slug))
                                    @if(is_null( $value ))
                                        <p class="mb-0 opacity-75">فیلد انتخاب نشده</p>
                                    @else
                                        <p class="mb-0 opacity-75">{{ DB::table('fieldchilds')->whereId($value)->value('name') }}</p>
                                    @endif
                                @else
                                    @if(is_null( $value ))
                                        <p class="mb-0 opacity-75">مقدار ثبت نشده</p>
                                    @else
                                        <p class="mb-0 opacity-75">{{ $value }}</p>
                                    @endif
                                @endif
                            @endif
                            @if($type == 'boolean')
                                @if($value == 1)
                                    <p class="mb-0 opacity-75">دارد</p>
                                @else
                                    <p class="mb-0 opacity-75">ندارد</p>
                                @endif
                            @endif
                            @if($type == 'bigint')
                                @if(is_null( $value ))
                                    <p class="mb-0 opacity-75">مبلغ درج نشده</p>
                                @else
                                    <p class="mb-0 opacity-75">{{ $value }}</p>
                                @endif
                            @endif
                            @if($type == 'string')
                                @if(is_null( $value ))
                                    <p class="mb-0 opacity-75">خالی</p>
                                @else
                                    @php
                                        $value = DB::table('files')->whereId($file->id)->value($field->slug);;
                                        $val = json_decode($value, true);
                                    @endphp
                                    @if (is_array( $val ))
                                        @if($val == [] || $val == [null])
                                            <p class="mb-0 opacity-75">انتخاب نشده</p>
                                        @else
                                            @foreach (DB::table('fieldchilds')->whereIn('id', $val)->get() as $fieldchid)
                                                <p class="mb-0 opacity-75">{{ $fieldchid->name }}</p>
                                            @endforeach
                                        @endif
                                    @else
                                        <p class="mb-0 opacity-75">{{ $value }}</p>
                                    @endif
                                @endif
                            @endif
                        @else
                            <p class="mb-0 opacity-75">{{ $file->takhleyeday }} / {{ $file->takhleyemonth }}</p>
                        @endif
                    </div>
                    <hr>
                @endforeach
            </div>
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a href="{{ route('file.edit', $file )}}" class="btn btn-sm mx-1 btn-primary">ویرایش</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('file.like', $file) }}" method="post">
                        @CSRF
                        @method("put")
                        <button class="btn btn-sm mx-1 btn-primary">
                            لایک
                            <span
                                class="badge {{ $file->like == 1 ? 'text-bg-danger' : 'text-bg-success' }} ">{{ $file->like }}</span>
                        </button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="{{ route('file.shekar', $file) }}" method="post">
                        @CSRF
                        @method("put")
                        <button class="btn btn-sm mx-1 btn-primary">
                            شکار
                            <span
                                class="badge {{ $file->shekar == 1 ? 'text-bg-danger' : 'text-bg-success' }} ">{{ $file->shekar }}</span>
                        </button>
                    </form>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-sm mx-1 btn-danger d-none d-sm-block" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $file->id }}">
                        حذف فایل
                    </button>
                    <div class="modal fade" id="deleteModal{{ $file->id }}" data-bs-backdrop="static"
                         data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">حذف فایل</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route("file.destroy", $file) }}" method="post">
                                        @CSRF
                                        @method("DELETE")
                                        <div class="modal-body">
                                            <p>آیا فایل {{ $file->category->name }} حذف میکنید؟ </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                    aria-label="Close">خیر
                                            </button>
                                            <button type="submit" class="btn btn-primary">بله</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <a href="{{ route('file.index' )}}" class="btn btn-primary w-100 mt-3">برگشت</a>
    <br><br>
@endsection
