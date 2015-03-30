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
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('fourmi_cybersecurity_indicators_by_countries', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('indicator_id')->unsigned()->index();
            $table->integer('country_id')->unsigned()->index();
            $table->integer('value');
            $table->timestamps();
        });
    }

    public function down()
    {
      Schema::dropIfExists('fourmi_cybersecurity_indicators_by_countries');
      Schema::dropIfExists('fourmi_cybersecurity_countries');
    }

}
