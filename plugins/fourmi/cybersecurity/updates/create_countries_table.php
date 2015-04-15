<?php namespace Fourmi\CyberSecurity\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCountriesTable extends Migration
{

    public function up()
    {
        Schema::create('fourmi_cybersecurity_countries', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->text('excerpt');
            $table->text('description');
            $table->integer('population');
            $table->integer('people_with_internet');
            $table->integer('people_with_broadband');
            $table->integer('people_with_mobile_phone');
            $table->timestamps();
        });


    }

    public function down()
    {
      Schema::dropIfExists('fourmi_cybersecurity_countries');
    }

}
