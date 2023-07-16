<?php

use App\Models\ComfortCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comfort_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $comfortCategories = [
            ['name' => 'Economy'],
            ['name' => 'Comfort'],
            ['name' => 'Business'],
            ['name' => 'VIP'],
        ];

        foreach ($comfortCategories as $category) {
            ComfortCategory::create($category);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comfort_categories');
    }
};
