<?php

namespace Creasi\Package\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Illuminate\Contracts\Database\Eloquent\Builder
 */
class Sample extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
