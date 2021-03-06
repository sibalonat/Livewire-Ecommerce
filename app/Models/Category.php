<?php

namespace App\Models;

// use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;
    // use Searchable;

    public $fillable = [
        'title',
        'slug',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
