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
        
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('description');
            $table->string('packaging'); 
            $table->string('weight');
            $table->string('weight_unit');
            $table->string('quantity_inhand');
            $table->string('price');
            $table->string('currency');
            $table->string('age');
            $table->string('expiry');
            $table->string('listed');
            $table->foreignId('user_id')->constrained();
            
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
