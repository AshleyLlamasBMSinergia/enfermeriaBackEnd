<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAHeredofamiliaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AHeredofamiliares', function (Blueprint $table) {
            $table->id();

            $table->enum('padresViven', ['No', 'Si'])->nullable();
            $table->string('espPadresViven')->nullable();

            $table->enum('hermanosViven', ['No', 'Si', 'N/A'])->nullable();
            $table->enum('hermanasViven', ['No', 'Si', 'N/A'])->nullable();

            $table->enum('diabetes', ['No', 'Si'])->nullable();
            $table->string('espDiabetes')->nullable();

            $table->enum('obecidad', ['No', 'Si'])->nullable();
            $table->string('espObecidad')->nullable();

            $table->enum('hipertensionArterial', ['No', 'Si'])->nullable();
            $table->string('espHipertensionArterial')->nullable();

            $table->enum('psoriasisVitiligo', ['No', 'Si'])->nullable();
            $table->string('espPsoriasisVitiligo')->nullable();

            $table->enum('cardiopatias', ['No', 'Si'])->nullable();
            $table->string('espCardiopatias')->nullable();

            $table->enum('lepra', ['No', 'Si'])->nullable();
            $table->string('espLepra')->nullable();

            $table->enum('neoplasicos', ['No', 'Si'])->nullable();
            $table->string('espNeoplasicos')->nullable();

            $table->enum('fimicos', ['No', 'Si'])->nullable();
            $table->string('espFimicos')->nullable();

            $table->enum('tiroideos', ['No', 'Si'])->nullable();
            $table->string('espTiroideos')->nullable();

            $table->enum('psiquiatricos', ['No', 'Si'])->nullable();
            $table->string('espPsiquiatricos')->nullable();

            $table->enum('alergias', ['No', 'Si'])->nullable();
            $table->string('espAlergias')->nullable();

            $table->enum('colagenopatias', ['No', 'Si'])->nullable();
            $table->string('espColagenopatias')->nullable();

            $table->enum('probMentales', ['No', 'Si'])->nullable();
            $table->string('espProbMentales')->nullable();

            $table->string('otros')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AHeredofamiliares');
    }
}
