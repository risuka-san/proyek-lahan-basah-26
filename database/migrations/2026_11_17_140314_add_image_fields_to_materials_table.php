
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->string('gambar')->nullable()->after('konten');

            $table->string('gambar_caption')
                ->nullable()
                ->after('gambar');

            $table->string('gambar_sumber')
                ->nullable()
                ->after('gambar_caption');
        });
    }

    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->dropColumn([
                'gambar',
                'gambar_caption',
                'gambar_sumber',
            ]);
        });
    }
};
