<?php

namespace App\Http\Livewire;

// use index;
use App\Models\Product;
use Livewire\Component;
// use MeiliSearch\Endpoints\Indexes;

class ProductBrowser extends Component
{
    public $category;


    public function render()
    {
        // $products = Product::search('')->get();

        $search = Product::search('', function($meilisearch, string $query, array $options) {
            // $options['filter'] = 'category_ids = ' . $this->category->id;

            $options['facetsDistribution'] = ['ngjyra'];

            return $meilisearch->search($query, $options);
            // return $meilisearch->search($query);
        })->raw();

        $products = $this->category->products->find(collect($search['hits'])->pluck('id'));

        // dd($products);

        return view('livewire.product-browser', [
            'products' => $products,
            'filters' => $search['facetsDistribution']
        ]);
    }
}
