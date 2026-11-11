
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Hapus batasan agar satu level bisa memiliki banyak materi.
        Schema::table('materials', function (Blueprint $table) {
            $table->dropUnique('materials_level_id_unique');
        });

        // Samakan tipe level_id dengan levels.id (BIGINT UNSIGNED).
        DB::statement('ALTER TABLE materials MODIFY level_id BIGINT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE user_progress MODIFY level_id BIGINT UNSIGNED NOT NULL');

        // Hubungkan materials dengan levels.
        Schema::table('materials', function (Blueprint $table) {
            $table->foreign('level_id')
                ->references('id')
                ->on('levels')
                ->restrictOnDelete();
        });

        // Hubungkan user_progress dengan levels.
        Schema::table('user_progress', function (Blueprint $table) {
            $table->foreign('level_id')
                ->references('id')
                ->on('levels')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->dropForeign(['level_id']);
        });

        Schema::table('user_progress', function (Blueprint $table) {
            $table->dropForeign(['level_id']);
        });

        DB::statement('ALTER TABLE materials MODIFY level_id INT NOT NULL');
        DB::statement('ALTER TABLE user_progress MODIFY level_id INT NOT NULL');

        Schema::table('materials', function (Blueprint $table) {
            $table->unique('level_id');
        });
    }
};
