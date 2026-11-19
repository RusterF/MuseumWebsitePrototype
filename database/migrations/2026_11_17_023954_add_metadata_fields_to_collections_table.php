<?php

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
        Schema::table('collections', function (Blueprint $table) {
            $table->string('asal_instansi')->nullable()->after('contributor');
            $table->string('pembuat')->nullable()->after('asal_instansi');
            $table->text('sejarah_konteks')->nullable()->after('description');
            $table->text('nilai_penting')->nullable()->after('sejarah_konteks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('collections', function (Blueprint $table) {
            $table->dropColumn(['asal_instansi', 'pembuat', 'sejarah_konteks', 'nilai_penting']);
        });
    }
};
