<?php namespace Fourmi\CyberSecurity;

use System\Classes\PluginBase;

/**
 * CyberSecurity Plugin Information File
 */
class Plugin extends PluginBase
{

    public $require = ['RainLab.Translate'];


    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'CyberSecurity',
            'description' => 'A Plugin which adds Cyber Security features',
            'author'      => 'Fourmi',
            'icon'        => 'icon-leaf'
        ];
    }


    public function registerComponents(){
        return [
      'Fourmi\CyberSecurity\Components\LiveReport' => 'liveReport'
        ];
    }

    public function registerNavigation()
    {
        return [
            'cybersecurity' => [
                'label'       => 'Ciber Seguridad',
                'url'         => \Backend::url('fourmi/cybersecurity/dimensions/index'),
                'icon'        => 'icon-signal',
                'permissions' => ['fourmi.cybersecurity.*'],
                'order'       => 500,

                'sideMenu' => [
                    'dimensions' => [
                        'label'       => 'Dimensiones',
                        'icon'        => 'icon-th-large',
                        'url'         => \Backend::url('fourmi/cybersecurity/dimensions/index'),
                        'permissions' => ['fourmi.cybersecurity.access_dimensions'],
                    ],
                    'factors' => [
                        'label'       => 'Factores',
                        'icon'        => 'icon-th-list',
                        'url'         => \Backend::url('fourmi/cybersecurity/factors/index'),
                        'permissions' => ['fourmi.cybersecurity.access_factors']
                    ],
                    'indicators' => [
                        'label'       => 'Indicadores',
                        'icon'        => 'icon-th',
                        'url'         => \Backend::url('fourmi/cybersecurity/indicators/index'),
                        'permissions' => ['fourmi.cybersecurity.access_indicators']
                    ],
                    'countries' => [
                        'label'       => 'Paises',
                        'icon'        => 'icon-globe',
                        'url'         => \Backend::url('fourmi/cybersecurity/countries/index'),
                        'permissions' => ['fourmi.cybersecurity.access_countries']
                    ],
                ]

            ]
        ];
    }



    public function registerFormWidgets()
    {
        return [
            'Fourmi\CyberSecurity\FormWidgets\MaturityLevel' => [
                'label' => 'Maturity levels',
                'code'  => 'maturity_levels'
            ]
        ];
    }

}
