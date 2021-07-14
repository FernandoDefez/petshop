<div>
    <div class="dropdown">
        <div class="input-group">
            <input type="search" class="form-control" placeholder="Buscar producto" aria-label="Search" id="search-dropdown" style="width: 210px"
                wire:model="query">
                @if (!empty($query))
                    @if (!empty($products))
                        <div class="dropdown-menu dropdown-menu-lg-right shadow-sm" aria-labelledby="search-dropdown" style="display: block; min-width:100%">
                            <h5 class="dropdown-header text-dark px-3 font-weight-bold">Resultados de la búsqueda</h5>
                            @foreach($products as $product)
                                <div class="dropdown-item col-12 d-flex align-items-center px-1">
                                    <div class="col-4 p-0 m-auto" style="height: 80px; width: 110px">
                                        <img src="{{asset('storage/products/'.$product['img'])}}" alt="" style="width: 100%; height: 100%">
                                    </div>
                                    <div class="col-8 m-0 p-0">
                                        <a class="d-flex text-secondary p-0 m-0 text-wrap text-decoration-none"
                                           href="{{route('product', ['product' => $product['slug']]) }}">
                                            {{ $product['name'] }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                    <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="search-dropdown" style="display: block; min-width:100%">
                        <h6 class="dropdown-header text-dark font-weight-bold">No se encontró</h6>
                    </div>
                    @endif
                @endif
        </div>
    </div>
</div>
