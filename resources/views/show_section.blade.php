@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('edit_section.update', ['id'=>$section->id]) }}"  enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="section_name" class=" col-form-label text-md-right">{{ __('Section Name') }}</label>

                            <div class="">
                                <input id="section_name" type="text" class="form-control @error('section_name') is-invalid @enderror" name="section_name" value="{{ $section->section_name }}" autocomplete="section_name" autofocus>

                                @error('section_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="section_description" class=" col-form-label text-md-right">{{ __('Section Description') }}</label>
                            <div class="">
                                <textarea style="white-space: normal" id="section_description" class="form-control @error('section_description') is-invalid @enderror" name="section_description">
                                    {{ $section->section_description }}
                                </textarea>
                                @error('section_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="section_main_section" class=" col-form-label text-md-right">{{ __('Main Section') }}</label>
                            <div class="">
                                <select class="form-select form-select-md mb-3" name="section_main_section" aria-label=".form-select-lg example">
                                    <option hidden selected value="{{ $section->main_section->id }}">{{ $section->main_section->main_section_name }}</option>
                                    @foreach ($main_sections as $main_section)
                                    <option value="{{ $main_section->id }}">{{ $main_section->main_section_name }}</option>
                                    @endforeach
                                  </select>

                                @error('section_main_section')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="section_image" class=" col-form-label text-md-right">{{ __('Section Image') }}</label>
                            <div class="mb-3">
                                <input id="section_image" type="file" class="form-control @error('section_image') is-invalid @enderror" name="section_image" autocomplete="section_image">

                                @error('section_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <a href="/{{ $section->section_image }}"><img  src="/{{$section->section_image}}" width="200"/></a>

                        </div>

                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary px-4">
                                    {{ __('Edit') }}
                                </button>
                                <a href="{{route("sections")}}" type="button" class="btn btn-success mx-2">
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
