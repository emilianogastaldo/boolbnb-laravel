<?php

use App\Models\Flat;
use App\Models\Service;
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
        // Creazione tabella ponte flat_service
        Schema::create('flat_service', function (Blueprint $table) {
            $table->id();
            //ID proveniente dalla tabella flats
            $table->foreignIdFor(Flat::class)->constrained()->cascadeOnDelete();
            //ID proveniente dalla tabella services
            $table->foreignIdFor(Service::class)->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flat_service');
    }
};
