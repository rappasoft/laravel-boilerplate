<?php

namespace App\Models;

use Altek\Accountant\Contracts\Recordable;
use Altek\Accountant\Recordable as RecordableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RecordingModel.
 */
abstract class RecordingModel extends Model implements Recordable
{
    use RecordableTrait;
}
