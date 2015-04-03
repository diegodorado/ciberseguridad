<?php namespace Fourmi\CyberSecurity\FormWidgets;

use Backend\Classes\FormWidgetBase;

use Fourmi\CyberSecurity\Models\Dimension;


/**
 * MaturityLevel Form Widget
 */
class MaturityLevel extends FormWidgetBase
{

    /**
     * {@inheritDoc}
     */
    protected $defaultAlias = 'fourmi_cybersecurity_maturity_level';

    /**
     * {@inheritDoc}
     */
    public function init()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('maturitylevel');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
      $this->vars['dimensions'] = Dimension::all();
      $this->vars['name'] = $this->formField->getName();
      $this->vars['value'] = $this->getLoadValue();
      $this->vars['model'] = $this->model;
    }

    /**
     * {@inheritDoc}
     */
    public function loadAssets()
    {
        $this->addCss('css/maturitylevel.css', 'Fourmi.CyberSecurity');
        $this->addJs('js/maturitylevel.js', 'Fourmi.CyberSecurity');
    }

    /**
     * {@inheritDoc}
     */
    public function getSaveValue($value)
    {
      //not so eficient but works
      foreach($value as $indicator_id=>$level){
        \Fourmi\CyberSecurity\Models\MaturityLevel::updateOrCreate(
          ['country_id' => $this->model->id, 'indicator_id'=> $indicator_id],
          ['country_id' => $this->model->id, 'indicator_id'=> $indicator_id,'level' => $level]
        );
      }


      return $value;
    }

    /**
     * Returns the value for this form field,
     * supports nesting via HTML array.
     * @return string
     */
    public function getLoadValue()
    {
      return \Fourmi\CyberSecurity\Models\MaturityLevel::where('country_id', $this->model->id)->lists('level','indicator_id');
    }


}
