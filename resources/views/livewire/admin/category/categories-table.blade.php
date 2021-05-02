<div>
    <div class="scrollspy-example mx-auto mb-4" style="width: 90%; min-height: 50vh; outline: none;">
        <div style="overflow-x: scroll">
            <table class="table table-bordered bg-white">
                <thead class="" style="background: rgba(240, 240, 240, 0.946);">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Category</th>
                    <th scope="col">Pet</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Remove</th>
                    <th scope="col">Update</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <th class="align-middle">{{ $category->id }}</th>
                    <td class="align-middle">{{ $category->category_name }}</td>
                    <td class="align-middle">{{ $category->pet_name }}</td>
                    <td class="align-middle">{{ $category->created_at }}</td>
                    <td class="align-middle">{{ $category->updated_at }}</td>
                    <td class="align-middle">
                        <button class="btn btn-danger btn-sm">Remove</button>
                    </td>
                    <td class="align-middle">
                        <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#editModal">
                            Edit
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
