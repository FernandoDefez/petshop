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

    protected $listeners = [
        'refresh-pets-table' => 'render',
        'delete-pet' => 'destroy'
    ];
    /*
     * @method render() show all the pets
     */
    public function render()
    {
        $this->pets = Pet::all();
        return view('livewire.admin.pet.pets-table', compact($this->pets));
    }

    /*
     * @method destroy() remove a pet from the database as well as delete its image from the storage
     * @array $payload contains the id of the pet so it can be deleted from de DDBB
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

}
