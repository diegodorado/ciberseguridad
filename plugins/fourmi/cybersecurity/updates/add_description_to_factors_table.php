<?php namespace Fourmi\CyberSecurity\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddDescriptionToFactorsTable extends Migration
{

    public function up()
    {
      Schema::table('fourmi_cybersecurity_factors', function($table)
      {
          $table->text('description');
      });
    }

    public function down()
    {
      Schema::table('fourmi_cybersecurity_factors', function($table)
      {
          $table->dropColumn('description');
      });
    }

}
