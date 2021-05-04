<div>
    <div class="m-auto mb-2 d-flex flex-wrap" style="width: 90%">
        @foreach($pets as $pet)
        <div class="col-lg-4 m-0 mb-5">
            <div class="card">
                <div class="card-body p-0 pb-0">
                    <div class="mb-2" style="height: 140px">
                        <img
                            loading="lazy"
                            decoding="async"
                            src="{{asset('storage/pets/'.$pet->img)}}"
                            class="rounded-sm"
                            style="width: 100%; height: 100%; object-fit: cover">
                    </div>
                    <div class="col-12 px-3 py-1 mb-2 d-flex justify-content-between align-items-center">
                        <h5 class="col-9 font-weight-bold px-0 text-dark mb-0 px-2 text-left">
                            {{$pet->pet_name}}
                        </h5>
                        <h5 class="col-3 font-weight-bold px-0 text-dark mb-0 px-2 text-right">
                            {{$pet->id}}
                        </h5>
                    </div>
                </div>
                <div class="card-footer bg-white d-flex justify-content-between">
                    <button class="btn btn-danger btn-sm col-5"> Remove </button>
                    <button class="btn btn-primary btn-sm col-5"> Edit </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

