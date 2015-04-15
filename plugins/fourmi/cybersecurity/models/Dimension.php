<?php namespace Fourmi\CyberSecurity\Models;

use Model;

/**
 * Dimension Model
 */
class Dimension extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'fourmi_cybersecurity_dimensions';

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
        'factors' => ['Fourmi\CyberSecurity\Models\Factor']
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];


    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = ['name', 'title'];    


}
