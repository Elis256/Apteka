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
        Schema::create('drug_procurements', function (Blueprint $table) {
            $table->id();

            $table->integer('quantity')->nullable();

            $table->unsignedBigInteger('drug_id');
            $table->unsignedBigInteger('procurement_id');

            $table->index('drug_id', 'drug_procurement_drug_idx');
            $table->index('procurement_id', 'drug_procurement_procurement_idx');

            $table->foreign('drug_id', 'drug_procurement_drug_fk')->on('drugs')->references("id");
            $table->foreign('procurement_id', 'drug_procurement_procurement_fk')->on('procurements')->references("id");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_procurements');
    }
};
