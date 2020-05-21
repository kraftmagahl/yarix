<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebappTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webapp_vulns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Titolo_non_ufficiale')->nullable();
            $table->string('Titolo_ufficiale')->nullable();
            $table->string('OWASP')->nullable();
            $table->string('Gravità')->nullable();
            $table->string('Descrizione')->nullable();
            $table->string('Soluzione')->nullable();
            $table->string('PoC')->nullable();
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
        //
    }
}
