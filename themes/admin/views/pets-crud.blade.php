@extends('layouts.nav')

@section('main')
{{-- Main --}}
<section class="m-auto bg-light" style="width: 100%; height: 100%; overflow-y: scroll; outline: none;">
    <div class="m-auto my-5 py-5" style="width: 90%">
        <button class="btn btn-outline-primary btn-sm fw-bold" id="menu-button">&larr; Menu</button>
        <br>
        <br>
        <div class="d-flex mt-4 justify-content-between">
            <div>
                <h3 class="font-weight-bold">Pets</h3>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal">
                Create a new pet
            </button>
        </div>
    </div>
    <livewire:admin.pet.pets-table />
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <livewire:admin.pet.create-pet />
        </div>
    </div>
</div>
@endsection
