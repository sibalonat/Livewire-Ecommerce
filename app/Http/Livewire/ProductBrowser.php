<?php

namespace App\Http\Livewire;

// use index;
use App\Models\Product;
use Livewire\Component;
// use MeiliSearch\Endpoints\Indexes;

class ProductBrowser extends Component
{
    public $category;

    public $queryFilters = [];
    public $priceRange = [
        'max' => null
    ];

    public function mount()
    {
        $this->queryFilters = $this->category->products->pluck('variations')
        ->flatten()
        ->groupBy('type')
        ->keys()
        ->mapWithKeys(fn($key) => [$key => []]);
    }

    public function render()
    {
        $search = Product::search('', function($meilisearch, string $query, array $options) {

            $filters = collect($this->queryFilters)
            ->filter(fn($filter) => !empty($filter))
            ->recursive()
            ->map(function($value, $key) {
                return $value->map(fn ($value) => $key . ' = "' . $value . '"');
            })
            ->flatten()
            ->join(' OR ');


            $options['facetsDistribution'] = ['color', 'size'];

            $options['filter'] = null;

            if ($filters) {
                $options['filter'] = $filters;
            }

            if ($this->priceRange['max']) {
                $options['filter'] .= (isset($options['filter']) ? ' AND ' : '') . 'price <= ' . $this->priceRange['max'] ;
            }
            return $meilisearch->search($query, $options);
        })->raw();

        $products = $this->category->products->find(collect($search['hits'])->pluck('id'));


        $maxPrice = $this->category->products->max('price');

        $this->priceRange['max'] = $this->priceRange['max'] ?: $maxPrice;

        return view('livewire.product-browser', [
            'products' => $products,
            'filters' => $search['facetsDistribution'],
            'maxPrice' => $maxPrice
        ]);
    }
}



        // $products = Product::search('')->get();
        // $options['filter'] = 'category_ids = ' . $this->category->id;

        // dd($filters);
        // ->toArray();
        // dd($filters);
        // return $value->map(fn ($value) => $key . ' = "' . $value . '" AND');
        // return $meilisearch->search($query);
