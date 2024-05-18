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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('content')->nullable();
            $table->text('shipping_icon')->nullable();
            $table->text('shipping')->nullable();
            $table->text('shipping_content')->nullable();
            $table->text('returning_icon')->nullable();
            $table->text('returning')->nullable();
            $table->text('returning_content')->nullable();
            $table->text('support_icon')->nullable();
            $table->text('support')->nullable();
            $table->text('support_content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
