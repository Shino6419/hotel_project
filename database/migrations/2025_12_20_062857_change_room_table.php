<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('rooms', function (Blueprint $table) {

            // thêm cột số lượng người
            if (!Schema::hasColumn('rooms', 'max_guest')) {
                $table->integer('max_guest')->default(1)->after('price');
            }

            // xoá cột wifi
            if (Schema::hasColumn('rooms', 'wifi')) {
                $table->dropColumn('wifi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {

            // khôi phục cột wifi
            $table->string('wifi')->default('yes')->after('price');

            // xoá cột số lượng người
            $table->dropColumn('max_guest');
        });
    }
};