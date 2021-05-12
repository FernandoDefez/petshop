<?php

namespace App\Http\Livewire\Admin\Pet;
use App\Models\Pet;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class PetsTable extends Component
{
    public $pets;

    /**
     * The listeners waiting for being emitted
     */
    protected $listeners = [
        'refresh-pets-table' => 'render',
        'delete-pet' => 'destroy'
    ];

    /**
     * Removes a pet from the database based on its ID
     *
     * @var payload
     */
    public function destroy($payload){
        $id = $payload['id'];
        $pet = Pet::find($id);

        $products = Product::select(
            'products.img',
            'pets.id'
        )->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('pets', 'pets.id', '=', 'categories.pet_id')->where('pets.id', '=', $pet->id)
            ->get();

        foreach ($products as $product){
            Storage::delete('products/'.$product->img);
        }

        $pet->delete();
        Storage::delete('pets/'.$pet->img);
        $this->render();
    }


    /**
     * The view rendered by the PetsTable Component.
     *
     * This view is located in the following directory resources/views/livewire/admin/pet
     *
     * @return view
     */
    public function render()
    {
        $this->pets = Pet::all();
        return view('livewire.admin.pet.pets-table', compact($this->pets));
    }
}
