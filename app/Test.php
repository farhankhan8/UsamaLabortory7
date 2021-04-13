<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public $table = 'tests';

    protected $fillable = [
        'user_id',
        'available_test_id',
        'start_time',
      
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     
    public function availableTest()
    {
        return $this->belongsTo(AvailableTest::class);
    }
    // public function catagory1()
    // {
    //     return $this->belongsTo(Catagory::class,'id');
    // }

}
