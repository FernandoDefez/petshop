@extends('layouts.header')

@section('content')
     <section class="d-flex justify-content-between m-0 pt-3" style="width: 100%; height: 100%">
        <div class="col-12" style="height: 100%; margin-bottom: 35px; width: 73%">
            <h5> Profile </h5>
            <div class="rounded p-3 bg-white" style="margin-top: 2vh; width: 100%">
                <div class="container d-flex p-0 justify-content-between">
                    <div class="rounded col-12 px-0">
                        <h6 class="py-1 mb-0"> Account Settings </h6>
                        <hr>
                    </div>
                </div>
               {{-- Account Settings --}}
                <div class="container d-flex p-0 justify-content-between">
                    <div class="col-12 rounded p-2 px-3">
                        <form>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validation1">Fullname</label>
                                    <input type="text" class="form-control" id="validation1" 
                                        value="{{ $user->name }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validation2">E-mail</label>
                                    <input type="email" class="form-control" id="validation2" 
                                        value="{{ $user->email }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validation3">New password</label>
                                    <input type="text" class="form-control" id="validation3" aria-describedby="validation3Feedback" required>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary font-weight-bold btn-sm" type="submit">Update account</button>
                            </div>
                        </form>
                    </div>
                </div>

                <livewire:address />

            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        //Actions for creating a new product
        window.livewire.on('address-alert', ($message) => {
            console.log('click');
            Swal.fire(
                'Address saved!',
                $message,
                'success'
            );
        });
        
    </script>
@endsection