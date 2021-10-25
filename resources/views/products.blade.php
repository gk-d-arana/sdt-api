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
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#add_product">
                        Add Product
                      </button>
                      <div class="modal" id="add_product">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Add Product</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form method="POST" action="{{ route('add_product.store') }}"  enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="product_name" class=" col-form-label text-md-right">{{ __('Product Name') }}</label>

                                        <div class="">
                                            <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="" autocomplete="product_name" autofocus>

                                            @error('product_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="product_description" class=" col-form-label text-md-right">{{ __('Product Description') }}</label>
                                        <div class="">
                                            <textarea style="white-space: normal" id="product_description" class="form-control @error('product_description') is-invalid @enderror" name="product_description">
                                            </textarea>
                                            @error('product_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="product_image" class=" col-form-label text-md-right">{{ __('Main Sction Image') }}</label>
                                        <div class="">
                                            <input id="product_image" type="file" class="form-control @error('product_image') is-invalid @enderror" name="product_image" autocomplete="product_image">

                                            @error('product_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_section" class=" col-form-label text-md-right">{{ __('Product Section') }}</label>
                                        <div class="">
                                            <select class="form-select form-select-md mb-3" name="product_section" aria-label=".form-select-lg example">
                                                <option hidden selected>Choose A Section</option>
                                                @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                                @endforeach
                                              </select>

                                            @error('product_section')
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
                            <th scope="col">Product Name</th>
                            <th class="text-center" scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($products as $product)
                          <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->product_name }}</td>
                            <td class="text-center">
                              <a class="btn btn-primary" href="/admin/product/{{$product->id}}/"> <i  class="fa fa-pencil mr-1" aria-hidden="true"></i>Edit</a>
                            <a class="btn btn-danger" href="#"
                                onclick="event.preventDefault();
                                document.getElementById('delete-form-{{ $product->id }}').submit();">
                                <i class="fa fa-trash mr-1" aria-hidden="true"></i>delete
                            </a>
                            <form id="delete-form-{{ $product->id }}" action="{{ route('delete_product.destroy', ['id' => $product->id]) }}"
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
