<?php

namespace App\Domains\Auth\Models;

use App\Domains\Auth\Models\Traits\Attribute\ExampleAttribute;
use App\Domains\Auth\Models\Traits\Method\ExampleMethod;
use App\Domains\Auth\Models\Traits\Relationship\ExampleRelationship;
use App\Domains\Auth\Models\Traits\Scope\ExampleScope;
use Database\Factories\ExampleFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * Class Example.
 */
class Example extends Model
{
    use
        Notifiable,
        SoftDeletes,
        ExampleAttribute,
        ExampleMethod,
        ExampleRelationship,
        ExampleScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $appends = [];

    /**
     * @var string[]
     */
    protected $with = [];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ExampleFactory::new();
    }
}
