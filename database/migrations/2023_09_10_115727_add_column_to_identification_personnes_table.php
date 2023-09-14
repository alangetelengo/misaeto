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
        Schema::table('identification_personnes', function (Blueprint $table) {
            $table->string("uniqueString",50)->after("telephone")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('identification_personnes', function (Blueprint $table) {
            $table->drop("uniqueString");
        });
    }
};
