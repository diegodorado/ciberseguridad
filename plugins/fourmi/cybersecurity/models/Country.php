<?php namespace Fourmi\CyberSecurity\Models;

use Model;

/**
 * Country Model
 */
class Country extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'fourmi_cybersecurity_countries';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'maturity_levels' => ['Fourmi\CyberSecurity\Models\MaturityLevel']
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public $hasManyThrough = [
        'indicators' => [
            'Fourmi\CyberSecurity\Models\Indicator',
            'through' => 'Fourmi\CyberSecurity\Models\MaturityLevel'
        ],
    ];




    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = ['name','excerpt','description'];


}
