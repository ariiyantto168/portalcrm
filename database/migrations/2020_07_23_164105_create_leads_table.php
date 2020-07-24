<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('idleads');
            $table->integer('idsources');
            $table->integer('idindustries');
            $table->string('gelar')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('account');
            $table->string('tittle');
            $table->string('website');
            $table->string('statusleads')->nullable();
            $table->string('tipemoney')->nullable();
            $table->string('amount');
            $table->text('alamat');
            $table->text('description');
            $table->boolean('active');
            $table->softDeletes();
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
        Schema::dropIfExists('leads');
    }
}
