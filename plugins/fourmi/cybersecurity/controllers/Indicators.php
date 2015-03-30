<?php namespace Fourmi\CyberSecurity\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Indicators Back-end Controller
 */
class Indicators extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Fourmi.CyberSecurity', 'cybersecurity', 'indicators');
    }
}