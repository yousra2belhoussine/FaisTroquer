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
        Schema::create('optioni_immobilier', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Optioni::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Immobilier::class)->constrained()->cascadeOnDelete();
            $table->primary(['optioni_id', 'immobilier_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('optioni_immobilier');
    }
};
