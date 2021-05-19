<div>
    <div class="m-auto mb-2 px-0 d-flex flex-wrap" style="width: 100%" id="categories-table">
        @foreach($categories as $category)
            <div class="col-sm-6 col-md-4 col-lg-3 m-0 mb-4">
                <div class="card bg-dark">
                    <div class="card-body p-0 pb-0">
                        <div class="col-12 px-3 py-3 d-flex justify-content-between align-items-center flex-wrap">
                            <div class="col-8 mb-0 px-2">
                                <h5 class="col-12 font-weight-bold px-0 mb-0 text-left text-white">
                                    {{$category->cat_name}}
                                </h5>
                                <p class="col-12 font-weight-bold px-0 text-secondary mb-0 text-left">
                                    {{$category->pet_name}}
                                </p>
                            </div>
                            <h5 class="col-4 font-weight-bold px-0 mb-0 px-2 text-right text-white">
                                {{$category->id}}
                            </h5>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-dark">
                        <button class="btn btn-danger btn-sm col-5 font-weight-bold" value="{{$category->id}}"> Remove </button>
                        <button class="btn btn-primary btn-sm col-5 font-weight-bold"> Edit </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
