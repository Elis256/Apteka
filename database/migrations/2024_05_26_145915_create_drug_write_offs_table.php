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
        Schema::create('drug_write_offs', function (Blueprint $table) {
            $table->id();

            $table->integer('quantity')->nullable();

            $table->unsignedBigInteger('drug_id');
            $table->unsignedBigInteger('write_off_id');

            $table->index('drug_id', 'drug_write_off_drug_idx');
            $table->index('write_off_id', 'drug_write_off_write_off_idx');

            $table->foreign('drug_id', 'drug_write_off_drug_fk')->on('drugs')->references("id");
            $table->foreign('write_off_id', 'drug_write_off_write_off_fk')->on('write_offs')->references("id");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_write_offs');
    }
};
