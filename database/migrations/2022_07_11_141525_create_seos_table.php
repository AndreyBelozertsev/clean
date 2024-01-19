<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->string('url')
                ->unique();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('open_graph')->nullable();
            $table->integer('seoable_id')->nullable();
            $table->string('seoable_type')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        if(!app()->isProduction()) {
            Schema::dropIfExists('seos');
        }
    }
};
