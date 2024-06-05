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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->length(200);
            $table->text('ingredients');
            $table->text('steps');
            $table->integer('cooking_time');
            $table->integer('calories');
            $table->integer('fat');
            $table->integer('protein');
            $table->integer('carbs');      
            
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            //$table->tinyInteger('status')->default(1)->comment("0 = Inactive, 1 = Active");
            // $table->integer('created_by')->nullable();
            // $table->integer('updated_by')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
