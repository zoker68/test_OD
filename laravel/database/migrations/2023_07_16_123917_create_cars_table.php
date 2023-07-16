<?php

use App\Models\Car;
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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->string('model');
            $table->unsignedBigInteger('comfort_category_id');

            $table->timestamps();

            $table->foreign('comfort_category_id')->references('id')->on('comfort_categories');
        });

        $cars = [
            'Toyota Camry',
            'Honda Civic',
            'Ford Mustang',
            'Chevrolet Impala',
            'Nissan Altima',
            'BMW 3 Series',
            'Mercedes-Benz E-Class',
            'Audi A4',
            'Lexus ES',
            'Hyundai Sonata',
            'Kia Optima',
            'Volkswagen Passat',
            'Subaru Legacy',
            'Mazda6',
            'Volvo S60',
            'Jaguar XE',
            'Infiniti Q50',
        ];

        $comfortCategories = ComfortCategory::all();

        foreach ($cars as $car) {
            Car::create([
                    'model' => $car,
                    'comfort_category_id' => $comfortCategories->random()->id,
                ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
