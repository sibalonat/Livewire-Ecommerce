<?php

use App\Models\ShippingAddress;
use App\Models\ShippingType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('email');
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->foreignIdFor(ShippingAddress::class)->constrained();
            $table->foreignIdFor(ShippingType::class)->constrained();
            $table->integer('subtotal');
            $table->timestamp('placed_at');
            $table->timestamp('packaged_at');
            $table->timestamp('shipped_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
