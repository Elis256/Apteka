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
        Schema::create('drug_releases', function (Blueprint $table) {
            $table->id();

            $table->integer('quantity')->nullable();
            $table->unsignedBigInteger('drug_id');
            $table->unsignedBigInteger('release_id');

            $table->index('drug_id', 'drug_release_drug_idx');
            $table->index('release_id', 'drug_release_release_idx');

            $table->foreign('drug_id', 'drug_release_drug_fk')->on('drugs')->references("id");
            $table->foreign('release_id', 'drug_release_release_fk')->on('releases')->references("id");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_releases');
    }
};
