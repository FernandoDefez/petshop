@extends('layouts.app')

@section('content')
    {{-- Main --}}
    <section class="m-auto" style="width: 100%; height: 100%;">
        <div class="m-auto my-2 py-4" style="width: 100%">
            <div class="d-flex mt-0 justify-content-between">
                <div>
                    <h3 class="font-weight-bold text-white">Pets</h3>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success font-weight-bold" data-toggle="modal" data-target="#createPetModal">
                    <i class="bi bi-plus"></i> New pet
                </button>
            </div>
        </div>
        <livewire:admin.pet.pets-table />
        <br>
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
    {{-- Main Ending --}}

    <!-- Modal for creating a new pet-->
    <div class="modal fade" id="createPetModal" tabindex="-1" aria-labelledby="createPetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <livewire:admin.pet.create/>
        </div>
    </div>

@endsection

@section('scripts')
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
