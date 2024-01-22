<?php

use Domain\Meeting\Models\Meeting;
use Domain\Volunteer\Models\Volunteer;
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
        Schema::create('meeting_volunteer', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Meeting::class)
                    ->constrained();
            $table->foreignIdFor(Volunteer::class)
                    ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_volunteer');
    }
};
