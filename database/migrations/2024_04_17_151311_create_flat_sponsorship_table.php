<?php

use App\Models\Flat;
use App\Models\Sponsorship;
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
        // Creazione tabella ponte flat_sponsorship
        Schema::create('flat_sponsorship', function (Blueprint $table) {
            $table->id();
            //ID proveniente dalla tabella flats
            $table->foreignIdFor(Flat::class)->constrained()->cascadeOnDelete();
            //ID proveniente dalla tabella services
            $table->foreignIdFor(Sponsorship::class)->constrained()->cascadeOnDelete();
            $table->dateTime('expiration_date')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flat_sponsorship');
    }
};
