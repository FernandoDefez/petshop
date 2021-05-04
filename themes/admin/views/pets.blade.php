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
                    <h3 class="font-weight-bold">Pets</h3>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success font-weight-bold" data-toggle="modal" data-target="#createPetModal">
                    Create a new pet <i class="bi bi-plus"></i>
                </button>
            </div>
        </div>
        <livewire:admin.pet.pets-table />
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
    {{-- Main Ending --}}

    <!-- Modal for creating a new pet-->
    <div class="modal fade" id="createPetModal" tabindex="-1" aria-labelledby="createPetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <livewire:admin.pet.create/>
        </div>
    </div>

    <!-- Modal for updating a selected pet-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('myscripts')
    <script type="text/javascript">
        //Actions for creating a new pet
        window.livewire.on('pet_created_alert', ($message) => {
            Swal.fire(
                'New pet created!',
                $message,
                'success'
            );
            setTimeout(function(){
                $('#createPetModal').modal('hide');
            }, 1200) // 5 seconds.
        });
    </script>
@endsection
