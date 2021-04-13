<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailableTest extends Model
{
    public $table = 'available_tests';

    protected $fillable = [
        'catagory_id',
        'name',
        'testFee',
        'initialNormalValue',
        'finalNormalValue',
      
    
    ];


    public function catagory()
    {
        return $this->belongsTo(Catagory::class);

    }
    public function test()
    {
        return $this->hasMany(Test::class,'available_test_id','id');
    }
 

}
