<?php namespace Fourmi\CyberSecurity\Updates;

use Fourmi\CyberSecurity\Models\Dimension;
use Fourmi\CyberSecurity\Models\Factor;
use October\Rain\Database\Updates\Seeder;

class SeedAllTables extends Seeder
{

    public function run()
    {

      Dimension::create(['id' => '1', 'name' => 'Dimensión 1','title' => 'La política y estrategia de seguridad cibernética']);
      Dimension::create(['id' => '2', 'name' => 'Dimensión 2','title' => 'La cultura cibernética y sociedad']);
      Dimension::create(['id' => '3', 'name' => 'Dimensión 3','title' => 'La educación, formación y habilidades en seguridad cibernética']);
      Dimension::create(['id' => '4', 'name' => 'Dimensión 4','title' => 'Los marcos legales y regulatorios']);
      Dimension::create(['id' => '5', 'name' => 'Dimensión 5','title' => 'Estándares, organizaciones y tecnologías']);


      Factor::create(['id' => '1', 'name' => 'D1-1','title' => 'Estrategia nacional de seguridad cibernética oficial o documentada', 'dimension_id' => '1']);
      Factor::create(['id' => '2', 'name' => 'D1-2','title' => 'Consideración de defensa cibernética', 'dimension_id' => '1']);
      Factor::create(['id' => '3', 'name' => 'D2-1','title' => 'Mentalidad de seguridad cibernética', 'dimension_id' => '2']);
      Factor::create(['id' => '4', 'name' => 'D2-2','title' => 'Conciencia de seguridad cibernética', 'dimension_id' => '2']);
      Factor::create(['id' => '5', 'name' => 'D2-3','title' => 'La transparencia y confianza en Internet', 'dimension_id' => '2']);
      Factor::create(['id' => '6', 'name' => 'D2-4','title' => 'Privacidad en línea', 'dimension_id' => '2']);
      Factor::create(['id' => '7', 'name' => 'D3-1','title' => 'La disponibilidad nacional de educación y formación cibernética', 'dimension_id' => '3']);
      Factor::create(['id' => '8', 'name' => 'D3-2','title' => 'El desarrollo nacional de la educación en seguridad cibernética', 'dimension_id' => '3']);
      Factor::create(['id' => '9', 'name' => 'D3-3','title' => 'Las iniciativas de formación y educativas dentro del sector público y privado', 'dimension_id' => '3']);
      Factor::create(['id' => '10', 'name' => 'D3-4','title' => 'Gobierno corporativo, conocimiento y normas', 'dimension_id' => '3']);
      Factor::create(['id' => '11', 'name' => 'D4-1','title' => 'Marcos legales de seguridad cibernética', 'dimension_id' => '4']);
      Factor::create(['id' => '12', 'name' => 'D4-2','title' => 'Investigación legal', 'dimension_id' => '4']);
      Factor::create(['id' => '13', 'name' => 'D4-3','title' => 'Presentación responsable de informes', 'dimension_id' => '4']);
      Factor::create(['id' => '14', 'name' => 'D5-1','title' => 'Adhesión a las normas', 'dimension_id' => '5']);
      Factor::create(['id' => '15', 'name' => 'D5-2','title' => 'Organizaciones de coordinación de seguridad cibernética', 'dimension_id' => '5']);
      Factor::create(['id' => '16', 'name' => 'D5-3','title' => 'Respuesta a incidentes', 'dimension_id' => '5']);
      Factor::create(['id' => '17', 'name' => 'D5-4','title' => 'Resiliencia Nacional de la Infraestructura', 'dimension_id' => '5']);
      Factor::create(['id' => '18', 'name' => 'D5-5','title' => 'Protección de la Infraestructura Crítica Nacional (CNI)', 'dimension_id' => '5']);
      Factor::create(['id' => '19', 'name' => 'D5-6','title' => 'Gestión de crisis', 'dimension_id' => '5']);
      Factor::create(['id' => '20', 'name' => 'D5-7','title' => 'Redundancia digital', 'dimension_id' => '5']);
      Factor::create(['id' => '21', 'name' => 'D5-8','title' => 'Mercado de la seguridad cibernética', 'dimension_id' => '5']);




    }

}
