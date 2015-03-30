<?php namespace Fourmi\CyberSecurity\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateIndicatorsTable extends Migration
{

    public function up()
    {
        Schema::create('fourmi_cybersecurity_indicators', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('factor_id')->unsigned()->index();
            $table->string('title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fourmi_cybersecurity_indicators');
    }

}
