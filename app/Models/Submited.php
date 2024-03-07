<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submited extends Model
{
    use HasFactory;
    // gname, gsubmit, gmessage, goriginname
    protected $fillable = ['gname', 'gsubmit', 'gmessage', 'goriginname'];
    public $timestamps = false;
    protected $table = 'submitted';
}
