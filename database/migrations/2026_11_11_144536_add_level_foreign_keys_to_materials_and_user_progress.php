<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Cek dulu apakah unique index masih ada sebelum dihapus
        $uniqueExists = DB::select("SHOW INDEX FROM `materials` WHERE Key_name = 'materials_level_id_unique'");
        if (!empty($uniqueExists)) {
            Schema::table('materials', function (Blueprint $table) {
                $table->dropUnique('materials_level_id_unique');
            });
        }

        // 2. Samakan tipe level_id dengan levels.id (BIGINT UNSIGNED)
        DB::statement('ALTER TABLE materials MODIFY level_id BIGINT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE user_progress MODIFY level_id BIGINT UNSIGNED NOT NULL');

        // 3. Cek & hubungkan materials dengan levels jika foreign key belum ada
        $materialsFk = DB::select("SELECT CONSTRAINT_NAME FROM information_schema.TABLE_CONSTRAINTS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'materials' AND CONSTRAINT_NAME = 'materials_level_id_foreign'");
        if (empty($materialsFk)) {
            Schema::table('materials', function (Blueprint $table) {
                $table->foreign('level_id')
                    ->references('id')
                    ->on('levels')
                    ->restrictOnDelete();
            });
        }

        // 4. Cek & hubungkan user_progress dengan levels jika foreign key belum ada
        $progressFk = DB::select("SELECT CONSTRAINT_NAME FROM information_schema.TABLE_CONSTRAINTS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'user_progress' AND CONSTRAINT_NAME = 'user_progress_level_id_foreign'");
        if (empty($progressFk)) {
            Schema::table('user_progress', function (Blueprint $table) {
                $table->foreign('level_id')
                    ->references('id')
                    ->on('levels')
                    ->restrictOnDelete();
            });
        }
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