<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    public function run()
    {
        $status = [
            [
                'id'             => 1,
                'status'           => 'Progressing',
              
            ],
            [
                'id'             => 2,
                'status'           => 'Verified',
            
            ],
            [
                'id'             => 3,
                'status'           => 'Not Received',
            
            ],
            [
                'id'             => 4,
                'status'           => 'Cancelled',
            
            ],
        ];

        Status::insert($status);

    }
}
