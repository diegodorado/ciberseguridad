<?php namespace Fourmi\CyberSecurity\Models;

use Model;

/**
 * Factor Model
 */
class Factor extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'fourmi_cybersecurity_factors';

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
        'indicators' => ['Fourmi\CyberSecurity\Models\Indicator']
    ];
    public $belongsTo = [
        'dimension' => ['Fourmi\CyberSecurity\Models\Dimension']
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];


    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = ['title', 'description'];    

}
