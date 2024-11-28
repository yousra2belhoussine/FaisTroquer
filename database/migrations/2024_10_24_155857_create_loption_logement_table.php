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
        Schema::create('loption_logement', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Loption::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Logement::class)->constrained()->cascadeOnDelete();
            $table->primary(['loption_id', 'logement_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loption_logement');
    }
};
