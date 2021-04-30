@extends('layouts.app')

@section('content')
    {{-- Navigation --}}
    <section class="dark p-4" style="height: 100%; overflow-y: scroll;" id="menu">
        <nav class="my-2">
            <p class="text-light fw-bold">Entities</p>
            <ul class="d-flex flex-column p-0">
                <a href="{{url('admin/pets')}}" class="nav-link text-secondary fw-bold">Pets</a>
                <a href="{{url('admin/categories')}}" class="nav-link text-secondary fw-bold">Categories</a>
                <a href="{{url('admin/products')}}" class="nav-link text-secondary fw-bold">Products</a>
            </ul>
        </nav>
    </section>
    @yield('main')
@endsection

