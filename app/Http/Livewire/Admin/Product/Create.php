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
    public $availability;


    /**
     * Declaring the validation rules
     */
    protected $rules = [
        'product' => 'required|min:4',
        'image' => 'required|image|max:5120',
        'description' => 'required|min:6',
        'price' => 'required',
        'availability' => 'required|integer|min:1',
        'selectedPet' => 'required|integer|min:1',
        'selectedCategory' => 'required|integer|min:1'
    ];


    /**
     * The Create Component's constructor.
     */
    public function mount()
    {
        $this->input_id = rand();
        $this->selectedPet = 0;
        $this->selectedCategory = 0;
        $this->selectedCategory = Null;
        $this->pets = Pet::all();
        $this->categories = collect();
    }

    /**
     * Update all the values
     */
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    /**
     * Update the selected pet <select> so the selected category <select> changes
     */
    public function updatedSelectedPet($pet)
    {
        if (!is_null($pet)) {
            $this->categories = Category::where('pet_id', $pet)->get();
        }
    }

    /**
     * Store a newly product
     */
    public function store()
    {
        $this->validate();

        $image = $this->image->store('products');
        $image = explode ("/", $image);

        Product::create([
            'name' => $this->product,
            'description' => $this->description,
            'price' => sprintf("%.2f", $this->price),
            'slug' => Str::of($this->product)->slug('-'),
            'img' => $image[1],
            'availability' => $this->availability,
            'category_id' => $this->selectedCategory,
        ]);


        $this->input_id = rand();
        $this->reset(['product', 'description', 'price', 'image', 'selectedPet', 'selectedCategory', 'availability']);
        $this->selectedCategory = 0;
        $this->emit('refresh-products-table');
        $this->emit('product-created-alert', "Product created successfully");
    }

    /**
     * Reset the values so the modal can show empty values on the inputs
     */
    public function resetModal()
    {
        $this->selectedPet = 0;
        $this->reset(['product', 'description', 'price', 'image', 'selectedPet', 'selectedCategory', 'availability']);
        $this->input_id = rand();
    }


    /**
     * The view rendered by the Create Component.
     *
     * This view is located in the following directory resources/views/livewire/admin/product
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.admin.product.create');
    }
}
