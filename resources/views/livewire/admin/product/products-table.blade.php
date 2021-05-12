<div>
    <div>
        <div class="scrollspy-example mx-auto mb-4" style="width: 96%; min-height: 50vh; outline: none;" id="products-table">
            <div style="overflow-x: scroll">
                <table class="table table-bordered bg-light">
                    <thead class="" style="background: rgba(240, 240, 240, 0.946);">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Pet</th>
                        <th scope="col">Category</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Remove</th>
                        <th scope="col">Update</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th class="align-middle"> {{ $product->id }} </th>
                            <td class="px-2 py-3" style="min-width: 110px; max-width: 130px; height: 120px">
                                <img
                                    loading="lazy"
                                    decoding="async"
                                    src="{{asset('storage/products/'.$product->img)}}"
                                    class="rounded-sm"
                                    style="width: 100%; height: 100%;">
                            </td>
                            <td class="align-middle"> {{ $product->name }} </td>
                            <td class="align-middle p-2"> {{ substr($product->description, 0, 190) .'...' }} </td>
                            <td class="align-middle"> {{ '$' . number_format($product->price, 2) }} </td>
                            <td class="align-middle"> {{ $product->pet_name }} </td>
                            <td class="align-middle"> {{ $product->cat_name }} </td>
                            <td class="align-middle"> {{ $product->availability }} </td>
                            <td class="align-middle">
                                <button class="btn btn-danger btn-sm" value="{{$product->id}}">Remove</button>
                            </td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#editProductModal">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12 d-flex justify-content-center mt-5 font-weight-bold">
                @if($links->links())
                    {{ $links->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
