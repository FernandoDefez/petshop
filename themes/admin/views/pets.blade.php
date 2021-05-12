@extends('layouts.app')

@section('content')
    <section>
        <nav class="my-2">
            <ul class="d-flex p-0">
                <a href="{{route('admin.pets')}}" class="nav-link text-secondary font-weight-bold">Create a Pet</a>
                <a href="{{route('admin.categories')}}" class="nav-link text-secondary font-weight-bold">Create a Category</a>
                <a href="{{route('admin.products')}}" class="nav-link text-secondary font-weight-bold">Create a Product</a>
            </ul>
        </nav>
    </section>
    {{-- Main --}}
    <section class="m-auto" style="width: 100%; height: 100%;">
        <div class="m-auto my-2 py-4 px-3" style="width: 98%">
            <div class="d-flex mt-0 justify-content-between">
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
        <footer class="d-flex flex-column align-items-center py-3">
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
        window.livewire.on('pet-created-alert', ($message) => {
            Swal.fire(
                'New pet created!',
                $message,
                'success'
            );
            setTimeout(function(){
                $('#createPetModal').modal('hide');
            }, 1200) // 5 seconds.
        });

        $('#pets-table').on('click', function(event) {
            if (event.target.outerText == "Remove"){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('delete-pet', { id : event.target.value });
                        Swal.fire(
                            'Deleted!',
                            'Pet has been deleted.',
                            'success'
                        )
                    }
                })
            }
        });
    </script>
@endsection
