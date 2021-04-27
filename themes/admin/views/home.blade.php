@extends('layouts.app')

@section('content')

    {{-- Navigation --}}
    <section class="bg-dark p-4" style="height: 100%; overflow-y: scroll;" id="menu">
        <nav class="my-2">
            <p class="text-light fw-bold">Entities</p>
            <ul class="d-flex flex-column p-0">
                <a href="{{url('admin/pets')}}" class="nav-link text-secondary fw-bold">Pets</a>
                <a href="{{url('admin/categories')}}" class="nav-link text-secondary fw-bold">Categories</a>
                <a href="{{url('admin/products')}}" class="nav-link text-secondary fw-bold">Products</a>
            </ul>
        </nav>
    </section>

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
        <div class="scrollspy-example mx-auto mb-4" style="width: 90%; min-height: 50vh; outline: none;">
            <div style="overflow-x: scroll">
                <table class="table table-bordered">
                    <thead class="" style="background: rgba(240, 240, 240, 0.946);">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Pet</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Remove</th>
                        <th scope="col">Update</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th class="align-middle">1</th>
                        <td class="p-2" style="min-width: 160px; max-width: 160px; height: 110px">
                            <img src="https://images.pexels.com/photos/133069/pexels-photo-133069.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                 class="rounded" style="width: 100%; height: 100%">
                        </td>
                        <td class="align-middle">Dog</td>
                        <td class="align-middle">2021-04-17T01:17:45.000000Z</td>
                        <td class="align-middle">2021-04-17T01:17:45.000000Z</td>
                        <td class="align-middle">
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </td>
                        <td class="align-middle">
                            <button class="btn btn-primary btn-sm">Update</button>
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle ">2</th>
                        <td class="p-2" style="min-width: 160px; max-width: 160px; height: 110px">
                            <img src="https://images.pexels.com/photos/133069/pexels-photo-133069.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                 class="rounded" style="width: 100%; height: 100%">
                        </td>
                        <td class="align-middle">Cat</td>
                        <td class="align-middle">2021-04-17T01:17:45.000000Z</td>
                        <td class="align-middle">2021-04-17T01:17:45.000000Z</td>
                        <td class="align-middle">
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </td>
                        <td class="align-middle">
                            <button class="btn btn-primary btn-sm">Update</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create a new pet</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="d-flex align-items-center justify-content-between">
                <p class="m-0 p-0">Uploading image, please wait</p>
                <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
            </div>
            <br>
        
            <div class="mb-1 bg-warning" style="width: 100%; height: 230px">
                <img src="https://images.pexels.com/photos/133069/pexels-photo-133069.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                style="width: 100%; height: 100%">
            </div>
            <br>

            <!-- Pet Name Input -->
            <div class="mb-2">
                <label for="PetInput" class="form-label">Name a pet</label>
                <input type="text" class="form-control is-valid" id="PetInput"
                       aria-describedby="PetInputValidationFeedback" placeholder="Pet name" required>
                <!-- Validation for Pet Input -->
                <!-- Success --><div id="PetInputValidationFeedbak" class="valid-feedback"> Pet name correct.</div>
                <!--  Error  --><div id="PetInputValidationFeedbak" class="invalid-feedback"> Please insert a pet name. </div>
            </div>
            <br>
            <!-- Pet Image Selection Input -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="ImageInputLabel">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input is-invalid" id="ImageInput" aria-describedby="ImageInputLabel">
                  <label class="custom-file-label" for="ImageInput">Choose file</label>
                    <!-- Validation for Image Input -->
                    <!-- Success --><div class="valid-feedback" id="ImageInput">Image has been selected succesfully</div>
                    <!--  Error  --><div class="invalid-feedback">Select an image</div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection