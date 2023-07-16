<?php

use App\Models\Position;
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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        $positions = [
            ['title' => 'Руководитель отдела'],
            ['title' => 'Менеджер проекта'],
            ['title' => 'Разработчик программного обеспечения'],
            ['title' => 'Дизайнер пользовательского интерфейса'],
            ['title' => 'Финансовый аналитик'],
            ['title' => 'Маркетинговый специалист'],
            ['title' => 'Системный администратор'],
            ['title' => 'Технический писатель'],
            ['title' => 'Консультант по продажам'],
            ['title' => 'Ассистент руководителя'],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
