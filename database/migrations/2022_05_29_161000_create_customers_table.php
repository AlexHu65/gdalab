<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('dni', 45);	
            $table->integer('id_reg')->unsigned();
            $table->integer('id_com')->unsigned();
            $table->string('email', 120)->unique();
            $table->string('name', 45);
            $table->string('last_name', 45);
            $table->string('address', 255)->nullable();
            $table->dateTime('date_reg', $precision = 0);
            $table->enum('status', ['A', 'I', 'trash'])->default('A');
        });

        Schema::table('customers', function($table) {
             //indices
            $table->primary('dni');
            $table->foreign('id_reg')->references('id_reg')->on('regions');
            $table->foreign('id_com')->references('id_com')->on('communes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
