<?php

use App\Models\Car;
use App\Models\CarBooking;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_bookings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('car_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');

            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars');
        });

        $cars = Car::all();

        for ($i = 0; $i < 10; $i++) {
            $car = $cars->random();

            $startDate = Carbon::now()->addDays(rand(-1, 7));
            $endDate = $startDate->copy()->addDays(rand(1, 7));

            CarBooking::create([
                'car_id' => $car->id,
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_bookings');
    }
};
