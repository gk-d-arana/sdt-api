@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('edit_product.update', ['id'=>$product->id]) }}"  enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="product_name" class=" col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="">
                                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ $product->product_name }}" autocomplete="product_name" autofocus>

                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_arabic_name" class=" col-form-label text-md-right">{{ __('Product Arabic Name') }}</label>

                            <div class="">
                                <input id="product_arabic_name" type="text" class="form-control @error('product_arabic_name') is-invalid @enderror" name="product_arabic_name" value="{{ $product->product_arabic_name }}" autocomplete="product_arabic_name" autofocus>

                                @error('product_arabic_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_arabic_description" class=" col-form-label text-md-right">{{ __('Product Description') }}</label>
                            <div class="">
                                <textarea style="white-space: normal" id="product_description" class="form-control @error('product_description') is-invalid @enderror" name="product_description">
                                    {{ $product->product_description }}
                                </textarea>
                                @error('product_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_arabic_description" class=" col-form-label text-md-right">{{ __('Product Arabic Description') }}</label>
                            <div class="">
                                <textarea style="white-space: normal" id="product_arabic_description" class="form-control @error('product_arabic_description') is-invalid @enderror" name="product_arabic_description">
                                    {{ $product->product_arabic_description }}
                                </textarea>
                                @error('product_arabic_description')
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
                                    <option hidden selected value="{{ $product->section->id }}">{{ $product->section->section_name }}</option>
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
                        <div class="form-group">
                            <label for="product_image" class=" col-form-label text-md-right">{{ __('Product Image') }}</label>
                            <div class="mb-3">
                                <input id="product_image" type="file" class="form-control @error('product_image') is-invalid @enderror" name="product_image" autocomplete="product_image">

                                @error('product_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <a href="/api/public/{{ $product->product_image }}"><img  src="/api/public/{{$product->product_image}}" width="200"/></a>

                        </div>

                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary px-4">
                                    {{ __('Edit') }}
                                </button>
                                <a href="{{route("products")}}" type="button" class="btn btn-success mx-2">
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
