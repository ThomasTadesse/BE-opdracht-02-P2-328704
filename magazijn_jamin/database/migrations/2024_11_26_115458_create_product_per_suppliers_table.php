<?php
namespace Database\Migrations;

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
        Schema::create('product_per_suppliers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('LeverancierId')->nullable();
            $table->unsignedBigInteger('ProductId')->nullable();
            $table->date('DatumLevering')->nullable();
            $table->integer('Aantal')->nullable();
            $table->date('DatumEerstVolgendeLevering')->nullable();
            $table->boolean('IsActief')->default(true);
            $table->string('Opmerking')->nullable();
            $table->timestamps();

            $table->foreign('LeverancierId')->references('LeverancierId')->on('leverancier')->onDelete('cascade');
            $table->foreign('ProductId')->references('ProductId')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_per_suppliers');
    }
};
