<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Str;

class CategoriesCreation extends Component
{
    public $object;

    public $createNewCategory = false;

    public $newCategoryState = [
        'title' => ''
    ];

    public function createCategory()
    {
        $this->validate([
            'newCategoryState.title' => 'required | max:255'
            'newCategoryState.parent_id' => 'required | max:255'
        ]);

        // $this->object->create($this->newCategoryState);
        // $this->object->save();
        // $getslug = Str::slug($this->newCategoryState);
        $title = $this->newCategoryState['title'];
        // $obe = Str::slug($this->newCategoryState);
        $object = Category::create([
            'title' => $title,
            'slug' => Str::slug($title),
        ]);
        // dd($title);

        // dd('create');

    }


    public function mount(Category $category)
    {
        $this->category = $category ?? new Category;
        $this->slug = $this->category['slug'];
    }

    public function render()
    {
        return view('livewire.categories-creation');
    }
}
