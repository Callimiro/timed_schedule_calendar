<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class event
 * @package App\Models
 * @version April 16, 2022, 8:17 pm UTC
 *
 * @property \App\Models\user $id
 * @property string $name
 * @property string $description
 * @property string $start_time
 * @property string $end_time
 * @property integer $day_of_week
 */
class event extends Model
{


    public $table = 'events';
    



    public $fillable = [
        'name',
        'description',
        'start_time',
        'end_time',
        'day_of_week'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'day_of_week' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'start_time' => 'required',
        'end_time' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function id()
    {
        return $this->belongsTo(\App\Models\user::class, 'id', 'user_id');
    }
}
