@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="/admin/main_sections">Main Sections</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/sections">Sections</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/products">Products</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/carousel_images">Carousel Imagse</a>
                        </li>
                      </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
