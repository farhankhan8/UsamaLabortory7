<?php

namespace App;
// use App\Catagory;
// use App\AvailableTest;
// use App\TestPerformed;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    public $table = 'catagories';

    protected $fillable = [
        'name',
    ];
    public function availableTest()
    {
        return $this->hasMany(AvailableTest::class,'catagory_id','id');

    }
    //   public function test()
    //   {
    //       return $this->belongsTo(Test::class);

    //   }

}
