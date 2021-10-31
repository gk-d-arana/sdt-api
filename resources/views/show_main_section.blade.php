@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('edit_main_section.update', ['id'=>$main_section->id]) }}"  enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="main_section_name" class=" col-form-label text-md-right">{{ __('Main Section Name') }}</label>

                            <div class="">
                                <input id="main_section_name" type="text" class="form-control @error('main_section_name') is-invalid @enderror" name="main_section_name" value="{{ $main_section->main_section_name }}" autocomplete="main_section_name" autofocus>

                                @error('main_section_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="main_section_description" class=" col-form-label text-md-right">{{ __('Main Section Description') }}</label>
                            <div class="">
                                <textarea style="white-space: normal" id="main_section_description" class="form-control @error('main_section_description') is-invalid @enderror" name="main_section_description">
                                    {{ $main_section->main_section_description }}
                                </textarea>
                                @error('main_section_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="main_section_image" class=" col-form-label text-md-right">{{ __('Main Section Image') }}</label>
                            <div class="mb-3">
                                <input id="main_section_image" type="file" class="form-control @error('main_section_image') is-invalid @enderror" name="main_section_image" autocomplete="main_section_image">

                                @error('main_section_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <a href="/api/public/{{ $main_section->main_section_image }}"><img  src="/api/public/{{$main_section->main_section_image}}" width="200"/></a>
                        </div>

                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary px-4">
                                    {{ __('Edit') }}
                                </button>
                                <a href="{{route("main_sections")}}" type="button" class="btn btn-success mx-2">
                                    <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i>Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
