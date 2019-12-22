<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * массив, в котором перечисляются поля, доступные для mass-assignment.
     * Все что там не перечислено будет игнорироваться.
     * @var array
     */
    protected $fillable = ['name', 'description', 'notes'];
}
