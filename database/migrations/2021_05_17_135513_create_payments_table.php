<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->nullableMorphs('payable');
            $table->decimal('amount', 18);
            $table->string('group')->default(\App\Enums\PaymentType::Default);
            $table->string('status')->default(\App\Enums\PaymentStatus::Default);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
