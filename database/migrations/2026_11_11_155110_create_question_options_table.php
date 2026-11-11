
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('question_options', function (Blueprint $table) {
            $table->id();

            // Pilihan jawaban dimiliki oleh satu soal
            $table->foreignId('question_id')
                ->constrained('questions')
                ->cascadeOnDelete();

            // Label pilihan: A, B, C, atau D
            $table->string('opsi', 1);

            // Isi pilihan jawaban
            $table->text('teks_jawaban');

            // Penanda jawaban benar
            $table->boolean('is_correct')->default(false);

            $table->timestamps();

            // Setiap soal tidak boleh memiliki label pilihan yang sama
            $table->unique(['question_id', 'opsi']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('question_options');
    }
};
