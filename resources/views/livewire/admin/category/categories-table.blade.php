<div>
    <div class="m-auto mb-2 d-flex flex-wrap" style="width: 98%" id="categories-table">
        @foreach($categories as $category)
            <div class="col-sm-6 col-md-4 col-lg-3 m-0 mb-4">
                <div class="card">
                    <div class="card-body p-0 pb-0">
                        <div class="col-12 px-3 py-3 d-flex justify-content-between align-items-center flex-wrap">
                            <div class="col-8 mb-0 px-2">
                                <h5 class="col-12 font-weight-bold px-0 mb-0 text-left">
                                    {{$category->name}}
                                </h5>
                                <p class="col-12 font-weight-bold px-0 text-secondary mb-0 text-left">
                                    {{$category->name}}
                                </p>
                            </div>
                            <h5 class="col-4 font-weight-bold px-0 mb-0 px-2 text-right">
                                {{$category->id}}
                            </h5>
                        </div>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between">
                        <button class="btn btn-danger btn-sm col-5" value="{{$category->id}}"> Remove </button>
                        <button class="btn btn-primary btn-sm col-5"> Edit </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
