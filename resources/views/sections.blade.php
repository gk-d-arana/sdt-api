@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('danger') }}
                    </div>
                @endif
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#add_section">
                        Add Section
                      </button>
                      <div class="modal" id="add_section">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Add section</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form method="POST" action="{{ route('add_section.store') }}"  enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="section_name" class=" col-form-label text-md-right">{{ __('Section Name') }}</label>

                                        <div class="">
                                            <input id="section_name" type="text" class="form-control @error('section_name') is-invalid @enderror" name="section_name" value="" autocomplete="section_name" autofocus>

                                            @error('section_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="section_arabic_name" class=" col-form-label text-md-right">{{ __('Section Arabic Name') }}</label>

                                        <div class="">
                                            <input id="section_arabic_name" type="text" class="form-control @error('section_arabic_name') is-invalid @enderror" name="section_arabic_name" value="" autocomplete="section_arabic_name" autofocus>

                                            @error('section_arabic_name')
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
                                            </textarea>
                                            @error('section_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="section_arabic_description" class=" col-form-label text-md-right">{{ __('Section Arabic Description') }}</label>
                                        <div class="">
                                            <textarea style="white-space: normal" id="section_arabic_description" class="form-control @error('section_arabic_description') is-invalid @enderror" name="section_arabic_description">
                                            </textarea>
                                            @error('section_arabic_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="section_image" class=" col-form-label text-md-right">{{ __('Section Image') }}</label>
                                        <div class="">
                                            <input id="section_image" type="file" class="form-control @error('section_image') is-invalid @enderror" name="section_image" autocomplete="section_image">

                                            @error('section_image')
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
                                                <option hidden selected>Choose A Section</option>
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
                                    <div class="form-group mb-0">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Add') }}
                                            </button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Section Name</th>
                            <th scope="col">Section Arabic Name</th>
                            <th class="text-center" scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($sections as $section)
                          <tr>
                            <th scope="row">{{ $section->id }}</th>
                            <td>{{ $section->section_name }}</td>
                            <td>{{ $section->section_arabic_name }}</td>
                            <td class="text-center">
                              <a class="btn btn-primary" href="{{ route('section-details.show', ["id"=>$section->id]) }}"> <i  class="fa fa-pencil mr-1" aria-hidden="true"></i>Edit</a>
                            <a class="btn btn-danger" href="#"
                                onclick="event.preventDefault();
                                document.getElementById('delete-form-{{ $section->id }}').submit();">
                                <i class="fa fa-trash mr-1" aria-hidden="true"></i>delete
                            </a>
                            <form id="delete-form-{{ $section->id }}" action="{{ route('delete_section.destroy', ['id' => $section->id]) }}"
                                method="GET" style="display: none;">
                               @csrf
                           </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="w-100 d-flex justify-content-end">
                          <a href="{{route("home")}}" type="button" class="btn btn-success mb-2">
                           <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i>Back
                          </a>
                      </div>

                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
