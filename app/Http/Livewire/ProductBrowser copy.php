<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductBrowserkot extends Component
{
    public $category;


    public function render()
    {
        // $products = Product::search('', function($meilisearch, string $query, array $options) {
        //     $options['filter'] = 'category_ids = ' . $this->category->id;
        //     dd($options);
        //     // dd($meilisearch);
        //     // dd($$client->index('movies')->getFilterableAttributes(););
        //     return $meilisearch->search($query, $options);
        // })->get();
        // dd($products);

        return view('livewire.product-browser', [
            'products' => $products
        ]);
    }
}
