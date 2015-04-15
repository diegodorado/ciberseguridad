<?php namespace Fourmi\CyberSecurity\Models;

use Model;

/**
 * Indicator Model
 */
class Indicator extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'fourmi_cybersecurity_indicators';

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
    public $hasMany = [];
    public $belongsTo = [
        'factor' => ['Fourmi\CyberSecurity\Models\Factor']
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];


    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = ['title','maturity_level1_text','maturity_level2_text','maturity_level3_text','maturity_level4_text','maturity_level5_text'];

}
