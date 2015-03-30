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
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}