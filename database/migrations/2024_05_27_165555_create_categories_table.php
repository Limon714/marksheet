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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->length(100);
            $table->timestamps();
            // $table->integer('parent_id')->nullable();
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
        Schema::dropIfExists('categories');
    }
};
