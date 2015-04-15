<?php namespace Fourmi\CyberSecurity\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateFactorsTable extends Migration
{

    public function up()
    {
        Schema::create('fourmi_cybersecurity_factors', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('dimension_id')->unsigned()->index();
            $table->string('code');
            $table->string('title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fourmi_cybersecurity_factors');
    }

}
