<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $table = 'statuses';

    protected $fillable = [
        'Sname',
        

      
    ];

      public function testPer()
      {
          return $this->hasMany(TestPerformed::class,'Sname_id','id');
      }
     
    //  public function availableTest()
    //  {
    //      return $this->belongsTo(AvailableTest::class);
    //  }
    //  public function catagory1()
    //  {
    //      return $this->belongsTo(Catagory::class,'id');
    //  }

}
