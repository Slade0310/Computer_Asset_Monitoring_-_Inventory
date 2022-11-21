<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComputerAsset extends Model
{
    // * SoftDeletes FOR NOT DELETING RIGHT AWAY * //
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
}
