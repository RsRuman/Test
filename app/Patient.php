<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
      'name',
      'dob',
      'dieses',
      'cell',
      'location'
    ];
}
