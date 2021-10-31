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
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#add_main_section">
                        Add Main Section
                      </button>
                      <div class="modal" id="add_main_section">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Add Main Section</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form method="POST" action="{{ route('add_main_section.store') }}"  enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="main_section_name" class=" col-form-label text-md-right">{{ __('Main Section Name') }}</label>

                                        <div class="">
                                            <input id="main_section_name" type="text" class="form-control @error('main_section_name') is-invalid @enderror" name="main_section_name" value="" autocomplete="main_section_name" autofocus>

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
                                        <div class="">
                                            <input id="main_section_image" type="file" class="form-control @error('main_section_image') is-invalid @enderror" name="main_section_image" autocomplete="main_section_image">

                                            @error('main_section_image')
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
                            <th scope="col">Main Section Name</th>
                            <th class="text-center" scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($main_sections as $main_section)
                          <tr>
                            <th scope="row">{{ $main_section->id }}</th>
                            <td>{{ $main_section->main_section_name }}</td>
                            <td class="text-center">
                              <a class="btn btn-primary" href="/api/public/admin/main_section/{{$main_section->id}}/"> <i  class="fa fa-pencil mr-1" aria-hidden="true"></i>Edit</a>
                            <a class="btn btn-danger" href="#"
                                onclick="event.preventDefault();
                                document.getElementById('delete-form-{{ $main_section->id }}').submit();">
                                <i class="fa fa-trash mr-1" aria-hidden="true"></i>delete
                            </a>
                            <form id="delete-form-{{ $main_section->id }}" action="{{ route('delete_main_section.destroy', ['id' => $main_section->id]) }}"
                                method="POST" style="display: none;">
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
