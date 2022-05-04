<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

<<<<<<< HEAD
class City extends Model
{
    use HasFactory, SoftDeletes;
  
=======

class City extends Model
{
    use HasFactory, SoftDeletes;

>>>>>>> ac2e7a6d4b05d3bb56d6a63336f4212729d70e2e
    protected $fillable = [
        'name',
        'manager_id',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function manager()
    {
        return $this->belongsTo(User::class);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> ac2e7a6d4b05d3bb56d6a63336f4212729d70e2e
