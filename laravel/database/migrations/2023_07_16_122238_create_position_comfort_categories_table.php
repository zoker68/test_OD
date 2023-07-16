<?php

use App\Models\ComfortCategory;
use App\Models\Position;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('position_comfort_categories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('comfort_category_id');

            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('comfort_category_id')->references('id')->on('positions');

        });

        $positions = Position::all();
        $categories = ComfortCategory::all();

        foreach ($positions as $position) {
            $randomCategories = $categories->random(rand(1, 3));
            $position->comfortCategories()->attach($randomCategories);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position_comfort_categories');
    }
};
