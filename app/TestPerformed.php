<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestPerformed extends Model
{
    public $table = 'test_performeds';

    protected $fillable = [
        'user_id',
        'available_test_id',
        'catagory_id'
      
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function availableTest()
    {
        return $this->hasMany(AvailableTest::class);
    }
    public function catagory1()
    {
        return $this->belongsTo(Catagory::class);
    }
}
