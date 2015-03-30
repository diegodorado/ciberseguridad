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

}
