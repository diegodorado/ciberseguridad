<?php namespace Fourmi\CyberSecurity\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateDimensionsTable extends Migration
{

    public function up()
    {
        Schema::create('fourmi_cybersecurity_dimensions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fourmi_cybersecurity_dimensions');
    }

}
