<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function(Blueprint $table){
            $table->id();
            $table->date('date');
            $table->foreignId('id_customer');
            $table->string('product_name');
            $table->string('color');
            $table->string('quantity');
            $table->integer('gramasi');
            $table->integer('status')->nullable();
            $table->string('nopol');
            $table->timestamps();

            $table->foreign('id_customer')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
