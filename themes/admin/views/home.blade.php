@extends('layouts.app')

@section('content')
    {{-- Main --}}
    <section>
        <nav class="my-2">
            <ul class="d-flex p-0">
                <a href="{{route('admin.pets')}}" class="nav-link text-secondary fw-bold">Create a Pet</a>
                <a href="{{route('admin.categories')}}" class="nav-link text-secondary fw-bold">Create a Category</a>
                <a href="{{route('admin.products')}}" class="nav-link text-secondary fw-bold">Create a Product</a>
            </ul>
        </nav>
    </section>
    <div class="jumbotron mb-1">
        <h1 class="display-4">Hello, welcome to the Petshop Admin Section!</h1>
        <p class="lead">This is a simple dashboard, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('home') }}" role="button">Visit the shop</a>
    </div>
    <section>
        <footer class="d-flex flex-column align-items-center py-2">
            <div style="width: 100%">
                <div class="m-auto d-flex justify-content-between py-2">
                    <nav class="d-flex m-auto">
                        <a class="nav-link" href="#">Documentation</a>
                        <a class="nav-link" href="#">Github</a>
                    </nav>
                </div>
            </div>
        </footer>
    </section>
@endsection
