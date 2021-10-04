<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Domain\Payments\Enums\PaymentMethod;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid')->unique()->index();

            $table->uuid('ref_uuid')->unique()->index();

            $table->unsignedBigInteger('client_id')->index();
            $table->string('action');
            
            $table->string('service', 15);
            $table->string('type', 20);
         
            $table->string('state', 15);
            // $table->string('sub_state', 15);

            $table->string('method', 20)->default(PaymentMethod::CARD());
            $table->bigInteger('amount');

            $table->json('meta')->nullable();

            $table->json('purchaced_items')->nullable();
            
            $table->softDeletes();
            $table->timestamp('completed_at')->nullable();

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
        Schema::dropIfExists('payments');
    }
}
