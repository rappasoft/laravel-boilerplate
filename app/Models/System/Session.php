<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Session
 * package App.
 */
class Session extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * @var array
     */
    protected $guarded = ['*'];
}
