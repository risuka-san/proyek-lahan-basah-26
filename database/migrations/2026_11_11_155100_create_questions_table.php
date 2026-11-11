
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();

            // Soal dimiliki oleh satu level
            $table->foreignId('level_id')
                ->constrained('levels')
                ->cascadeOnDelete();

            $table->text('pertanyaan');

            // Urutan soal dalam satu level
            $table->unsignedInteger('urutan');

            $table->timestamps();

            // Mencegah nomor urut soal yang sama dalam satu level
            $table->unique(['level_id', 'urutan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
