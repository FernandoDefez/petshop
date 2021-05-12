<div>
    <div class="m-auto mb-2 d-flex flex-wrap" style="width: 98%" id="pets-table">
        @foreach($pets as $pet)
        <div class="col-sm-6 col-md-4 col-lg-3 m-0 mb-5 shadow-sm">
            <div class="card bg-dark">
                <div class="card-body p-0 pb-0">
                    <div class="mb-2 dark" style="height: 120px">
                        <img
                            loading="lazy"
                            decoding="async"
                            src="{{asset('storage/pets/'.$pet->img)}}"
                            class="rounded-sm"
                            style="width: 100%; height: 100%; object-fit: cover">
                    </div>
                    <div class="col-12 px-3 py-1 mb-2 d-flex justify-content-between align-items-center">
                        <h5 class="col-9 font-weight-bold px-0 mb-0 px-2 text-left text-white">
                            {{$pet->name}}
                        </h5>
                        <h5 class="col-3 font-weight-bold px-0 mb-0 px-2 text-right text-white">
                            {{$pet->id}}
                        </h5>
                    </div>
                </div>
                <div class="card-footer bg-dark d-flex justify-content-between">
                    <button class="btn btn-danger btn-sm col-5 font-weight-bold" value="{{$pet->id}}"> Remove </button>
                    <button class="btn btn-primary btn-sm col-5 font-weight-bold"> Edit </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

