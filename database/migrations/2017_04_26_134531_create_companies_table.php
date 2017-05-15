<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('comp_id')->nullable();
            $table->string('comp_vat')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('postcode')->nullable();
            $table->string('register_nr')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('mob_phone')->nullable();
            $table->string('website')->nullable();
            $table->string('prices_vat')->nullable();
            $table->string('vat');
            $table->string('logo');
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
        Schema::dropIfExists('companies');
    }
}
