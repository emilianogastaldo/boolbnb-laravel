<?php

use App\Models\Flat;
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
        Schema::create('views', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Flat::class)->nullable()->constrained()->cascadeOnDelete();

            $table->dateTime('date');
            $table->binary('ip_address');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('views', function (Blueprint $table) {
        //     $table->dropForeignIdFor(Flat::class);
        // });
        Schema::dropIfExists('views');
    }
};
