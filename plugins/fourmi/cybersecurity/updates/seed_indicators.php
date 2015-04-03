<?php namespace Fourmi\CyberSecurity\Updates;

use Fourmi\CyberSecurity\Models\Indicator;
use October\Rain\Database\Updates\Seeder;

class SeedIndicators extends Seeder
{

    public function run()
    {

      Indicator::create(['id' => '1', 'title' => 'Desarrollo de la Estrategia','factor_id' => '1']);
      Indicator::create(['id' => '2', 'title' => 'Organización','factor_id' => '1']);
      Indicator::create(['id' => '3', 'title' => 'Contenido','factor_id' => '1']);
      Indicator::create(['id' => '4', 'title' => 'Estrategia','factor_id' => '2']);
      Indicator::create(['id' => '5', 'title' => 'Organización','factor_id' => '2']);
      Indicator::create(['id' => '6', 'title' => 'Coordinación','factor_id' => '2']);
      Indicator::create(['id' => '7', 'title' => 'Gobierno','factor_id' => '3']);
      Indicator::create(['id' => '8', 'title' => 'Sector Privado','factor_id' => '3']);
      Indicator::create(['id' => '9', 'title' => 'Sociedad','factor_id' => '3']);
      Indicator::create(['id' => '10', 'title' => 'Sensibilización','factor_id' => '4']);
      Indicator::create(['id' => '11', 'title' => 'La confianza en el uso de servicios en línea','factor_id' => '5']);
      Indicator::create(['id' => '12', 'title' => 'La confianza en el gobierno electrónico','factor_id' => '5']);
      Indicator::create(['id' => '13', 'title' => 'La confianza en el comercio electrónico','factor_id' => '5']);
      Indicator::create(['id' => '14', 'title' => 'Normas de privacidad','factor_id' => '6']);
      Indicator::create(['id' => '15', 'title' => 'Privacidad del Empleado','factor_id' => '6']);
      Indicator::create(['id' => '16', 'title' => 'Educación','factor_id' => '7']);
      Indicator::create(['id' => '17', 'title' => 'Formación','factor_id' => '7']);
      Indicator::create(['id' => '18', 'title' => 'Desarrollo nacional de la educación de seguridad cibernética','factor_id' => '8']);
      Indicator::create(['id' => '19', 'title' => 'Formación a empleados en seguridad cibernética','factor_id' => '9']);
      Indicator::create(['id' => '20', 'title' => 'Comprensión de seguridad cibernética de empresas privadas y estatales','factor_id' => '10']);
      Indicator::create(['id' => '21', 'title' => 'Los marcos legislativos para la seguridad de las TIC','factor_id' => '11']);
      Indicator::create(['id' => '22', 'title' => 'Privacidad, protección de datos y otros derechos humanos','factor_id' => '11']);
      Indicator::create(['id' => '23', 'title' => 'Derecho sustantivo de delincuencia cibernética','factor_id' => '11']);
      Indicator::create(['id' => '24', 'title' => 'Derecho procesal de delincuencia cibernética','factor_id' => '11']);
      Indicator::create(['id' => '25', 'title' => 'Cumplimiento de la ley','factor_id' => '12']);
      Indicator::create(['id' => '26', 'title' => 'La fiscalía','factor_id' => '12']);
      Indicator::create(['id' => '27', 'title' => 'Tribunales','factor_id' => '12']);
      Indicator::create(['id' => '28', 'title' => 'Divulgación responsable','factor_id' => '13']);
      Indicator::create(['id' => '29', 'title' => 'Aplicación de las normas y prácticas mínimas aceptables','factor_id' => '14']);
      Indicator::create(['id' => '30', 'title' => 'Adquisiciones','factor_id' => '14']);
      Indicator::create(['id' => '31', 'title' => 'Desarrollo de software','factor_id' => '14']);
      Indicator::create(['id' => '32', 'title' => 'Centro de mando y control','factor_id' => '15']);
      Indicator::create(['id' => '33', 'title' => 'Capacidad de respuesta a incidentes','factor_id' => '15']);
      Indicator::create(['id' => '34', 'title' => 'Determinación y designación','factor_id' => '16']);
      Indicator::create(['id' => '35', 'title' => 'Organización','factor_id' => '16']);
      Indicator::create(['id' => '36', 'title' => 'Coordinación','factor_id' => '16']);
      Indicator::create(['id' => '37', 'title' => 'Tecnológica de la infraestructura','factor_id' => '17']);
      Indicator::create(['id' => '38', 'title' => 'Resiliencia Nacional','factor_id' => '17']);
      Indicator::create(['id' => '39', 'title' => 'Identificación','factor_id' => '18']);
      Indicator::create(['id' => '40', 'title' => 'Organización','factor_id' => '18']);
      Indicator::create(['id' => '41', 'title' => 'Planeación de respuesta','factor_id' => '18']);
      Indicator::create(['id' => '42', 'title' => 'Coordinación','factor_id' => '18']);
      Indicator::create(['id' => '43', 'title' => 'Gestión de riesgos','factor_id' => '18']);
      Indicator::create(['id' => '44', 'title' => 'Planeación','factor_id' => '19']);
      Indicator::create(['id' => '45', 'title' => 'Evaluación','factor_id' => '19']);
      Indicator::create(['id' => '46', 'title' => 'Planeación','factor_id' => '20']);
      Indicator::create(['id' => '47', 'title' => 'Organización','factor_id' => '20']);
      Indicator::create(['id' => '48', 'title' => 'Tecnologías de seguridad cibernética','factor_id' => '21']);
      Indicator::create(['id' => '49', 'title' => 'Seguros de delincuencia cibernética','factor_id' => '21']);


    }

}
