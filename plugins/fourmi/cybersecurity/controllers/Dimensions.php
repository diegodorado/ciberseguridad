<?php namespace Fourmi\CyberSecurity\Controllers;

use Fourmi\CyberSecurity\Models\Dimension;

use BackendMenu;
use Backend\Classes\Controller;

class Dimensions extends Controller
{


    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['fourmi.cybersecurity.access_dimensions'];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Fourmi.CyberSecurity', 'cybersecurity', 'dimensions');
    }



}
