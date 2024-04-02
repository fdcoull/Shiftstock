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
            $table->double('weight', 12, 3);
            $table->tinyText('weight_unit');
            $table->integer('quantity_inhand');
            $table->double('price', 11, 2);
            $table->tinyText('currency');
            $table->date('age');
            $table->date('expiry');
            $table->boolean('listed');
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
