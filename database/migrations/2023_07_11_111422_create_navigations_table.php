<?php


use Domain\Setting\Models\Navigation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url')->nullable();
            $table->integer('sort')->default(500)->nullable();
            $table->enum('type',['top','bottom'])
                ->default('top');
            $table->foreignIdFor(Navigation::class)
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->nullOnDelete('cascade');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navigations');
    }
};
