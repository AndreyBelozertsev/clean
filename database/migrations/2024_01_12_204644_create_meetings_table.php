<?php

use Domain\City\Models\City;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content')->nullable();
            $table->string('address');
            $table->string('thumbnail')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('coordinates')->nullable();
            $table->foreignIdFor(City::class)
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->nullOnDelete('cascade');
            $table->boolean('status')->default(true);    
            $table->dateTime('start_at');                                 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};