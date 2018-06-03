<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarantines extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reason',
        'ended_at',
    ];


    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
