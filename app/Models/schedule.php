<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class schedule
 * @package App\Models
 * @version April 17, 2022, 9:10 am UTC
 *
 * @property \App\Models\event $id
 */
class schedule extends Model
{


    public $table = 'schedules';
    



    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'event_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function event()
    {
        return $this->belongsTo(\App\Models\event::class, 'id', 'event_id');
    }
}

