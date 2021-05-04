@extends('layouts.nav')

@section('main')
    {{-- Main --}}
    <section class="m-auto bg-light" style="width: 100%; height: 100%; overflow-y: scroll; outline: none;">
        <div class="m-auto my-2 py-4 px-3" style="width: 90%">
            <button class="btn btn-outline-primary btn-sm font-weight-bold" id="menu-button">&larr; Menu</button>
            <br>
            <br>
            <div class="d-flex mt-4 justify-content-between">
                <div>
                    <h3 class="font-weight-bold">Menu</h3>
                </div>
            </div>
        </div>
        <br>
        <div class="m-auto mb-2 d-flex flex-wrap" style="width: 90%">
            {{-- Pets Link --}}
            <div class="col-lg-4 m-0 mb-5">
                <div class="card">
                    <div class="card-body p-0 pb-0">
                        <div class="mb-2" style="height: 140px">
                            <img
                                loading="lazy"
                                decoding="async"
                                src="{{asset('storage/pets/IwQZmXi5otIiDm1OUzhvDzFNRIwHRCCccELHo4vd.jpg')}}"
                                class="rounded-sm"
                                style="width: 100%; height: 100%; object-fit: cover">
                        </div>
                        <div class="col-12 px-3 py-1 mb-2 d-flex justify-content-between align-items-center">
                            <h5 class="col-12 font-weight-bold px-0 text-dark mb-0 px-2 text-left">
                                <a href="{{url('admin/pets')}}" class="text-dark">
                                    Pets
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Categories Link --}}
            <div class="col-lg-4 m-0 mb-5">
                <div class="card">
                    <div class="card-body p-0 pb-0">
                        <div class="mb-2" style="height: 140px">
                            <img
                                loading="lazy"
                                decoding="async"
                                src="{{asset('storage/pets/IwQZmXi5otIiDm1OUzhvDzFNRIwHRCCccELHo4vd.jpg')}}"
                                class="rounded-sm"
                                style="width: 100%; height: 100%; object-fit: cover">
                        </div>
                        <div class="col-12 px-3 py-1 mb-2 d-flex justify-content-between align-items-center">
                            <h5 class="col-12 font-weight-bold px-0 text-dark mb-0 px-2 text-left">
                                <a href="{{url('admin/categories')}}" class="text-dark">
                                    Categories
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Products Link --}}
            <div class="col-lg-4 m-0 mb-5">
                <div class="card">
                    <div class="card-body p-0 pb-0">
                        <div class="mb-2" style="height: 140px">
                            <img
                                loading="lazy"
                                decoding="async"
                                src="{{asset('storage/pets/IwQZmXi5otIiDm1OUzhvDzFNRIwHRCCccELHo4vd.jpg')}}"
                                class="rounded-sm"
                                style="width: 100%; height: 100%; object-fit: cover">
                        </div>
                        <div class="col-12 px-3 py-1 mb-2 d-flex justify-content-between align-items-center">
                            <h5 class="col-12 font-weight-bold px-0 text-dark mb-0 px-2 text-left">
                                <a href="{{url('admin/products')}}" class="text-dark">
                                    Products
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <footer class="bg-light d-flex flex-column align-items-center py-3">
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

@section('myscripts')
    <script type="text/javascript">

    </script>
@endsection
