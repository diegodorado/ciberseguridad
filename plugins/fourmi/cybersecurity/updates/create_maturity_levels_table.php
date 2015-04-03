<?php namespace Fourmi\CyberSecurity\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateMaturityLevelsTable extends Migration
{

    public function up()
    {
        Schema::create('fourmi_cybersecurity_maturity_levels', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('indicator_id')->unsigned()->index();
            $table->integer('country_id')->unsigned()->index();
            $table->integer('level');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fourmi_cybersecurity_maturity_levels');
    }

}
