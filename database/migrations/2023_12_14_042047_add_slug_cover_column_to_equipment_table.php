<?php

use Illuminate\Contracts\Translation\HasLocalePreference;
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
        Schema::table('sportsequip', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->after('title');
            $table->string('cover', 255)->nullable()->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sportsequip', function (Blueprint $table) {
            if (Schema::hasColumn('sportsequip', 'slug')) {
                $table->dropColumn('slug');
            }

            if (Schema::hasColumn('sportsequip', 'cover')) {
                $table->dropColumn('cover');
            }
        });
    }
};
