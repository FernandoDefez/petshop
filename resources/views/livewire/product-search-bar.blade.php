<div>
    <div class="dropdown">
        <div class="input-group">
            <input type="search" class="form-control" placeholder="Search product" aria-label="Search" id="search-dropdown" style="width: 200px"
                wire:model="query">
                @if (!empty($query))
                    @if (!empty($products))
                        <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="search-dropdown" style="display: block; min-width:100%">
                            <h6 class="dropdown-header text-dark font-weight-bold">Search Results</h6>
                            @foreach($products as $product)
                            <a class="dropdown-item text-secondary" href="{{route('product', ['product' => $product['slug']])}}">
                                {{ $product['product'] }}
                            </a>
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
