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
        Schema::create('drug_acceptances', function (Blueprint $table) {
            $table->id();

            $table->integer('quantity')->nullable();
            $table->unsignedBigInteger('drug_id');
            $table->unsignedBigInteger('acceptance_id');

            $table->index('drug_id', 'drug_acceptance_drug_idx');
            $table->index('acceptance_id', 'drug_acceptance_acceptance_idx');

            $table->foreign('drug_id', 'drug_acceptance_drug_fk')->on('drugs')->references("id");
            $table->foreign('acceptance_id', 'drug_acceptance_acceptance_fk')->on('acceptances')->references("id");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_acceptances');
    }
};
