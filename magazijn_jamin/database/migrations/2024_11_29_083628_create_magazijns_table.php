<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('magazijns', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedMediumInteger('ProductId');
            $table->decimal('VerpakkingsEenheid', 4, 1);
            $table->unsignedSmallInteger('AantalAanwezig');
            $table->boolean('IsActief')->default(true);
            $table->string('Opmerkingen')->nullable()->default(null);
            $table->dateTime('DatumAangemaakt', 6);
            $table->dateTime('DatumGewijzigd', 6);
            $table->timestamps();

            $table->foreign('ProductId')->references('Id')->on('Product');
        });
        DB::statement('ALTER TABLE magazijns ADD CONSTRAINT chk_VerpakkingsEenheid CHECK (VerpakkingsEenheid > 0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magazijns');
    }
};
