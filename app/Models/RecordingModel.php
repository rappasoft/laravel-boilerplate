<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;
use Altek\Accountant\Recordable as RecordableTrait;

/**
 * Class RecordingModel
 *
 * @package App\Models
 */
abstract class RecordingModel extends Model implements Recordable
{
    use RecordableTrait;
}
