<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Prompts\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('address');
            $table->unsignedTinyInteger('room');
            $table->unsignedTinyInteger('bed');
            $table->unsignedTinyInteger('bathroom');
            $table->unsignedSmallInteger('sq_m');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('image')->nullable();
            $table->boolean('is_visible');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('flats', function (Blueprint $table){
            $table->string('slug')->nullable()->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('flats', function (Blueprint $table) {
        //     $table->dropForeignIdFor(User::class);
        // });
        Schema::dropIfExists('flats');
    }
};
