<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Pet;
use App\Models\Category;
use App\Models\Product;

class Create extends Component
{
    use WithFileUploads;

    public $pets;
    public $categories;
    public $input_id;

    //Product data
    public $selectedPet;
    public $selectedCategory;
    public $product;
    public $price;
    public $description;
    public $image;
    public $slug;

    protected $rules = [
        'product' => 'required|min:3',
        'image' => 'required|image|max:5120',
        'description' => 'required|min:5',
        'price' => 'required',
        'selectedPet' => 'required|integer|min:1',
        'selectedCategory' => 'required|integer|min:1'
    ];

    public function mount()
    {
        $this->input_id = rand();
        $this->selectedPet = 0;
        $this->selectedCategory = Null;
        $this->pets = Pet::all();
        $this->categories = collect();
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $this->slug =  Str::of($this->product)->slug('-') .'-'.substr(str_shuffle($permitted_chars), 0, 16)
            .'-d-'.substr( $this->description ,0, 16)
            .'-p-'.$this->selectedPet
            .'-c-'.$this->selectedCategory;
        $this->slug = strtolower($this->slug);
    }

    public function updatedSelectedPet($pet)
    {
        if (!is_null($pet)) {
            $this->categories = Category::where('pet_id', $pet)->get();
        }
    }

    public function store()
    {
        $this->validate();

        $image = $this->image->store('products');
        $image = explode ("/", $image);

        Product::create([
            'product' => $this->product,
            'description' => $this->description,
            'price' => $this->price,
            'slug' => $this->slug,
            'img' => $image[1],
            'category_id' => $this->selectedCategory,
        ]);


        $this->input_id = rand();
        $this->reset(['product', 'description', 'price', 'image']);
        $this->emit('refresh_products_table');
        $this->emit('product_created_alert', "Product created succesfully");
    }

    public function resetModal()
    {
        $this->selectedPet = 0;
        $this->selectedCategory = 0;
        $this->reset(['product', 'description', 'price', 'image', 'slug']);
        $this->input_id = rand();
    }

    public function render()
    {
        return view('livewire.admin.product.create');
    }
}
