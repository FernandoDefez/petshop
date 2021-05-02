<div>
    <div class="scrollspy-example mx-auto mb-4" style="width: 90%; min-height: 50vh; outline: none;">
        <div style="overflow-x: scroll">
            <table class="table table-bordered bg-white">
                <thead class="" style="background: rgba(240, 240, 240, 0.946);">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Image</th>
                    <th scope="col">Pet</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Remove</th>
                    <th scope="col">Update</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pets as $pet)
                    <tr>
                        <th class="align-middle">{{__($pet->id)}}</th>
                        <td class="p-3" style="min-width: 160px; max-width: 160px; height: 120px">
                            <img
                                loading="lazy"
                                decoding="async"
                                src="{{asset('storage/pets/'.$pet->img)}}"
                                class="rounded-sm"
                                style="width: 100%; height: 100%; object-fit: cover">
                        </td>
                        <td class="align-middle">{{__($pet->pet_name)}}</td>
                        <td class="align-middle">{{ $pet->created_at }}</td>
                        <td class="align-middle">{{ $pet->updated_at }}</td>
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

