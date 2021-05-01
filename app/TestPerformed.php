<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestPerformed extends Model
{
    public $table = 'test_performeds';

    protected $fillable = [
        'available_test_id',
        'patient_id',
        'Sname_id',
        'start_time',
        'testResult',
      
    ];
     public function patient()
     {
         return $this->belongsTo(Patient::class);

     }
     public function availableTest()
     {
         return $this->belongsTo(AvailableTest::class);

     }
     public function status()
     {
         return $this->belongsTo(Status::class);

     }
}
