<div>
    <div class="dropdown">
        <div class="input-group">
            <input type="search" class="form-control" placeholder="Search product" aria-label="Search" id="search-dropdown" style="width: 210px"
                wire:model="query">
                @if (!empty($query))
                    @if (!empty($products))
                        <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="search-dropdown" style="display: block; min-width:100%">
                            <h5 class="dropdown-header text-dark font-weight-bold px-3">Search Results</h5>
                            @foreach($products as $product)
                                <div class="dropdown-item col-12 d-flex align-items-center px-1">
                                    <div class="col-4 p-0 m-auto" style="height: 70px; width: 100$">
                                        <img src="{{asset('storage/products/'.$product['img'])}}" alt="" style="width: 100%; height: 100%">
                                    </div>
                                    <a class="col-8 text-secondary px-0 mx-0" href="{{route('product', ['product' => $product['slug']])}}">
                                        {{ $product['name'] }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                    <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="search-dropdown" style="display: block; min-width:100%">
                        <h6 class="dropdown-header text-dark font-weight-bold">No Results</h6>
                    </div>
                    @endif
                @endif
        </div>
    </div>
</div>
