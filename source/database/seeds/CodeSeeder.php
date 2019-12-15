<?php

use App\Code;
use Illuminate\Database\Seeder;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add Code 5%
        for ($i=0; $i < 1230; $i++) {
            $sCode   = 'MC05';
            $sNumber = sprintf('%04d', $i);
            $sCode .= $sNumber;
            Code::create(
                [
                    'store_id' => null,
                    'code_type'=> '1',
                    'code'     => $sCode,
                    'status'   => 0
                ]
            );
        }

        //Add Code 10%
        for ($j=1; $j < 840; $j++) {
            $sCode   = 'MC1';
            $sNumber = sprintf('%04d', $j);
            $sCode .= $sNumber;
            Code::create(
                [
                    'store_id' => null,
                    'code_type'=> '2',
                    'code'     => $sCode,
                    'status'   => 0
                ]
            );
        }
    }
}
