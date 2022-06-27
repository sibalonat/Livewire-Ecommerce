<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Cart
 *
 * @property int $id
 * @property string $uuid
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|\App\Models\Variation[] $variations
 * @property-read int|null $variations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUuid($value)
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|Category[] $children
 * @property-read int|null $children_count
 * @property-read Category|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|static[] all($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category breadthFirst()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category depthFirst()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|static[] get($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category getExpressionGrammar()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category hasChildren()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category hasParent()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category isLeaf()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category isRoot()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category newModelQuery()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category newQuery()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category query()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category tree($maxDepth = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category treeOf(callable $constraint, $maxDepth = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category whereDepth($operator, $value = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category whereId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category whereParentId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category whereSlug($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category whereTitle($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category withGlobalScopes(array $scopes)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Category withRelationshipExpression($direction, callable $constraint, $initialDepth, $from = null, $maxDepth = null)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property int $price
 * @property string|null $live_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|\App\Models\Variation[] $variations
 * @property-read int|null $variations_count
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLiveAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Stock
 *
 * @property int $id
 * @property int $variation_id
 * @property int $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereVariationId($value)
 */
	class Stock extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Variation
 *
 * @property int $id
 * @property int $product_id
 * @property string $title
 * @property int $price
 * @property string $type
 * @property string|null $sku
 * @property int|null $parent_id
 * @property int|null $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|Variation[] $children
 * @property-read int|null $children_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read Variation|null $parent
 * @property-read \App\Models\Product $product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Stock[] $stocks
 * @property-read int|null $stocks_count
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|static[] all($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation breadthFirst()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation depthFirst()
 * @method static \Database\Factories\VariationFactory factory(...$parameters)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|static[] get($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation getExpressionGrammar()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation hasChildren()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation hasParent()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation isLeaf()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation isRoot()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation newModelQuery()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation newQuery()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation query()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation tree($maxDepth = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation treeOf(callable $constraint, $maxDepth = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation whereCreatedAt($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation whereDepth($operator, $value = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation whereId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation whereOrder($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation whereParentId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation wherePrice($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation whereProductId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation whereSku($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation whereTitle($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation whereType($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation whereUpdatedAt($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation withGlobalScopes(array $scopes)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Variation withRelationshipExpression($direction, callable $constraint, $initialDepth, $from = null, $maxDepth = null)
 */
	class Variation extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

