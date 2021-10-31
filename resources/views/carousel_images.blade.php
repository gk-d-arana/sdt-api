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
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#add_carousel_image">
                        Add Carousel Image
                      </button>
                      <div class="modal" id="add_carousel_image">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Add Carousel Image</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form method="POST" action="{{ route('add_carousel_image.store') }}"  enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="carousel_image_image" class=" col-form-label text-md-right">{{ __('Carousel Image') }}</label>
                                        <div class="">
                                            <input id="carousel_image_image" type="file" class="form-control @error('carousel_image_image') is-invalid @enderror" name="carousel_image_image" autocomplete="carousel_image_image">

                                            @error('carousel_image_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="">
                                        <select class="form-select form-select-md mb-3" name="carousel_main_section" aria-label=".form-select-lg example">
                                            <option hidden selected>Choose A Main Section</option>
                                            @foreach ($main_sections as $main_section)
                                            <option value="{{ $main_section->id }}">{{ $main_section->main_section_name }}</option>
                                            @endforeach
                                          </select>

                                        @error('carousel_main_section')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                            <th scope="col">Carousel Image</th>
                            <th scope="col">Main Section</th>
                            <th class="text-center" scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($carousel_images as $carousel_image)
                          <tr>
                            <th scope="row">{{ $carousel_image->id }}</th>
                            <td><a target="_blank" href="/api/public/{{ $carousel_image->carousel_image }}"><img src="/api/public/{{ $carousel_image->carousel_image }}" width="100"/></a></td>
                            <td>{{ $carousel_image->main_section->main_section_name}}</td>
                            <td class="text-center">
                            <a class="btn btn-danger" href="#"
                                onclick="event.preventDefault();
                                document.getElementById('delete-form-{{ $carousel_image->id }}').submit();">
                                <i class="fa fa-trash mr-1" aria-hidden="true"></i>delete
                            </a>
                            <form id="delete-form-{{ $carousel_image->id }}" action="{{ route('delete_carousel_image.destroy', ['id' => $carousel_image->id]) }}"
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
