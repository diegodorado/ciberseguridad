<?php namespace Fourmi\CyberSecurity\Updates;

use Fourmi\CyberSecurity\Models\Dimension;
use Fourmi\CyberSecurity\Models\Factor;
use October\Rain\Database\Updates\Seeder;
use RainLab\Translate\Models\Locale;

class SeedAllTables extends Seeder
{

    public function run()
    {

      Locale::create([
        'code'=> 'es',
        'name'=>'Español',
        'is_default'=>false,
        'is_enabled'=>true,
        ]);


      $d=Dimension::create(['id' => '1', 'name' => 'Dimension 1','title' => 'Cyber Security Policy and Strategy']);	$d->setTranslateAttribute('name', 'Dimension 1', 'en');	$d->setTranslateAttribute('name', 'Dimensión 1', 'es');	$d->setTranslateAttribute('title', 'Cyber Security Policy and Strategy', 'en');	$d->setTranslateAttribute('title', 'La política y estrategia de seguridad cibernética', 'es');	$d->save();
      $d=Dimension::create(['id' => '2', 'name' => 'Dimension 2','title' => 'Cyber culture and society']);	$d->setTranslateAttribute('name', 'Dimension 2', 'en');	$d->setTranslateAttribute('name', 'Dimensión 2', 'es');	$d->setTranslateAttribute('title', 'Cyber culture and society', 'en');	$d->setTranslateAttribute('title', 'Cultura cibernética y sociedad', 'es');	$d->save();
      $d=Dimension::create(['id' => '3', 'name' => 'Dimension 3','title' => 'Cyber security education, training and skills']);	$d->setTranslateAttribute('name', 'Dimension 3', 'en');	$d->setTranslateAttribute('name', 'Dimensión 3', 'es');	$d->setTranslateAttribute('title', 'Cyber security education, training and skills', 'en');	$d->setTranslateAttribute('title', 'Educación, formación y habilidades en seguridad cibernética', 'es');	$d->save();
      $d=Dimension::create(['id' => '4', 'name' => 'Dimension 4','title' => 'Legal and regulatory frameworks']);	$d->setTranslateAttribute('name', 'Dimension 4', 'en');	$d->setTranslateAttribute('name', 'Dimensión 4', 'es');	$d->setTranslateAttribute('title', 'Legal and regulatory frameworks', 'en');	$d->setTranslateAttribute('title', 'Los marcos legales y regulatorios', 'es');	$d->save();
      $d=Dimension::create(['id' => '5', 'name' => 'Dimension 5','title' => 'Standards, organisations, and technologies ']);	$d->setTranslateAttribute('name', 'Dimension 5', 'en');	$d->setTranslateAttribute('name', 'Dimensión 5', 'es');	$d->setTranslateAttribute('title', 'Standards, organisations, and technologies ', 'en');	$d->setTranslateAttribute('title', 'Estándares, organizaciones y tecnologías', 'es');	$d->save();


      $f=Factor::create(['id' => '1', 'code' => 'D1-1','title' => 'Documented or Official National Cyber Security Strategy ', 'dimension_id' => '1']);	$f->setTranslateAttribute('title', 'factor_en', 'en');	$f->setTranslateAttribute('title', 'factor_es', 'es');	$f->save();
      $f=Factor::create(['id' => '2', 'code' => 'D1-2','title' => 'Cyber Defence Consideration', 'dimension_id' => '1']);	$f->setTranslateAttribute('title', 'Documented or Official National Cyber Security Strategy ', 'en');	$f->setTranslateAttribute('title', 'Estrategia nacional de seguridad cibernética oficial o documentada', 'es');	$f->save();
      $f=Factor::create(['id' => '3', 'code' => 'D2-1','title' => 'Cyber Security Mind-set', 'dimension_id' => '2']);	$f->setTranslateAttribute('title', 'Cyber Defence Consideration', 'en');	$f->setTranslateAttribute('title', 'Consideración de defensa cibernética', 'es');	$f->save();
      $f=Factor::create(['id' => '4', 'code' => 'D2-2','title' => 'Cyber security Awareness', 'dimension_id' => '2']);	$f->setTranslateAttribute('title', 'Cyber Security Mind-set', 'en');	$f->setTranslateAttribute('title', 'Mentalidad de seguridad cibernética', 'es');	$f->save();
      $f=Factor::create(['id' => '5', 'code' => 'D2-3','title' => 'Confidence and trust on the Internet', 'dimension_id' => '2']);	$f->setTranslateAttribute('title', 'Cyber security Awareness', 'en');	$f->setTranslateAttribute('title', 'Conciencia de seguridad cibernética', 'es');	$f->save();
      $f=Factor::create(['id' => '6', 'code' => 'D2-4','title' => 'Privacy online', 'dimension_id' => '2']);	$f->setTranslateAttribute('title', 'Confidence and trust on the Internet', 'en');	$f->setTranslateAttribute('title', 'La transparencia y la confianza en Internet', 'es');	$f->save();
      $f=Factor::create(['id' => '7', 'code' => 'D3-1','title' => 'National availability of cyber education and training', 'dimension_id' => '3']);	$f->setTranslateAttribute('title', 'Privacy online', 'en');	$f->setTranslateAttribute('title', 'Privacidad en línea', 'es');	$f->save();
      $f=Factor::create(['id' => '8', 'code' => 'D3-2','title' => 'National development of cyber security education', 'dimension_id' => '3']);	$f->setTranslateAttribute('title', 'National availability of cyber education and training', 'en');	$f->setTranslateAttribute('title', 'Disponibilidad nacional de la educación y formación cibernética', 'es');	$f->save();
      $f=Factor::create(['id' => '9', 'code' => 'D3-3','title' => 'Training and educational initiatives within public and private sector', 'dimension_id' => '3']);	$f->setTranslateAttribute('title', 'National development of cyber security education', 'en');	$f->setTranslateAttribute('title', 'Desarrollo nacional de la educación de seguridad cibernética', 'es');	$f->save();
      $f=Factor::create(['id' => '10', 'code' => 'D3-4','title' => 'Corporate Governance, Knowledge and Standards', 'dimension_id' => '3']);	$f->setTranslateAttribute('title', 'Training and educational initiatives within public and private sector', 'en');	$f->setTranslateAttribute('title', 'Iniciativas educativas y de formación dentro del sector público y privado', 'es');	$f->save();
      $f=Factor::create(['id' => '11', 'code' => 'D4-1','title' => ' Cyber security legal frameworks', 'dimension_id' => '4']);	$f->setTranslateAttribute('title', 'Corporate Governance, Knowledge and Standards', 'en');	$f->setTranslateAttribute('title', 'Gobierno corporativo, conocimiento y normas', 'es');	$f->save();
      $f=Factor::create(['id' => '12', 'code' => 'D4-2','title' => 'Legal investigation', 'dimension_id' => '4']);	$f->setTranslateAttribute('title', ' Cyber security legal frameworks', 'en');	$f->setTranslateAttribute('title', 'Marcos legales de seguridad cibernética', 'es');	$f->save();
      $f=Factor::create(['id' => '13', 'code' => 'D4-3','title' => ' Responsible Reporting', 'dimension_id' => '4']);	$f->setTranslateAttribute('title', 'Legal investigation', 'en');	$f->setTranslateAttribute('title', 'Investigación Legal', 'es');	$f->save();
      $f=Factor::create(['id' => '14', 'code' => 'D5-1','title' => 'Adherence to standards', 'dimension_id' => '5']);	$f->setTranslateAttribute('title', ' Responsible Reporting', 'en');	$f->setTranslateAttribute('title', 'Reporte Responsable', 'es');	$f->save();
      $f=Factor::create(['id' => '15', 'code' => 'D5-2','title' => 'Cyber Security coordinating organisations', 'dimension_id' => '5']);	$f->setTranslateAttribute('title', 'Adherence to standards', 'en');	$f->setTranslateAttribute('title', 'Adhesión a las normas', 'es');	$f->save();
      $f=Factor::create(['id' => '16', 'code' => 'D5-3','title' => 'Incident Response', 'dimension_id' => '5']);	$f->setTranslateAttribute('title', 'Cyber Security coordinating organisations', 'en');	$f->setTranslateAttribute('title', 'Organizaciones de coordinación de seguridad cibernética', 'es');	$f->save();
      $f=Factor::create(['id' => '17', 'code' => 'D5-4','title' => 'National Infrastructure Resilience', 'dimension_id' => '5']);	$f->setTranslateAttribute('title', 'Incident Response', 'en');	$f->setTranslateAttribute('title', 'Respuesta a Incidentes', 'es');	$f->save();
      $f=Factor::create(['id' => '18', 'code' => 'D5-5','title' => 'Critical National Infrastructure (CNI) Protection', 'dimension_id' => '5']);	$f->setTranslateAttribute('title', 'National Infrastructure Resilience', 'en');	$f->setTranslateAttribute('title', 'Resiliencia nacional de infraestructura', 'es');	$f->save();
      $f=Factor::create(['id' => '19', 'code' => 'D5-6','title' => 'Crisis Management', 'dimension_id' => '5']);	$f->setTranslateAttribute('title', 'Critical National Infrastructure (CNI) Protection', 'en');	$f->setTranslateAttribute('title', 'Protección de la Infraestructura Crítica Nacional (CNI)', 'es');	$f->save();
      $f=Factor::create(['id' => '20', 'code' => 'D5-7','title' => 'Digital Redundancy', 'dimension_id' => '5']);	$f->setTranslateAttribute('title', 'Crisis Management', 'en');	$f->setTranslateAttribute('title', 'Gestión de Crisis', 'es');	$f->save();
      $f=Factor::create(['id' => '21', 'code' => 'D5-8','title' => 'Cyber security marketplace', 'dimension_id' => '5']);	$f->setTranslateAttribute('title', 'Digital Redundancy', 'en');	$f->setTranslateAttribute('title', 'Redundancia digital', 'es');	$f->save();




    }

}
