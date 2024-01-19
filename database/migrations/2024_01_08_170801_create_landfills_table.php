<?php

use Domain\City\Models\City;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Domain\Landfill\Models\LandfillCategory;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('landfills', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('phone');
            $table->text('content')->nullable();
            $table->string('coordinates')->nullable();
            $table->text('images')->nullable();
            $table->foreignIdFor(City::class)
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->nullOnDelete('cascade');
            $table->foreignIdFor(LandfillCategory::class)
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->nullOnDelete('cascade');
            $table->string('status')->default('moderation');                                       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landfills');
    }
};
