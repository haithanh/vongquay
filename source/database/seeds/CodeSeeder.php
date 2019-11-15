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
        Code::create(
            [
                'store_id' => '1',
                'item_id'  => '1',
                'code'     => 'A11',
                'status'   => 0
            ]
        );
        Code::create(
            [
                'store_id' => '1',
                'item_id'  => '2',
                'code'     => 'B12',
                'status'   => 0
            ]
        );
        Code::create(
            [
                'store_id' => '1',
                'item_id'  => '1',
                'code'     => 'A11',
                'status'   => 0
            ]
        );
        Code::create(
            [
                'store_id' => '1',
                'item_id'  => '2',
                'code'     => 'B12'
            ]
        );
        Code::create(
            [
                'store_id' => '1',
                'item_id'  => '3',
                'code'     => 'A13',
                'status'   => 0
            ]
        );
        Code::create(
            [
                'store_id' => '1',
                'item_id'  => '4',
                'code'     => 'B14',
                'status'   => 0
            ]
        );
        Code::create(
            [
                'store_id' => '1',
                'item_id'  => '5',
                'code'     => 'A15',
                'status'   => 0
            ]
        );
        Code::create(
            [
                'store_id' => '1',
                'item_id'  => '6',
                'code'     => 'B16',
                'status'   => 0
            ]
        );
        Code::create(
            [
                'store_id' => '1',
                'item_id'  => '7',
                'code'     => 'A17'
            ]
        );
        Code::create(
            [
                'store_id' => '1',
                'item_id'  => '8',
                'code'     => 'B18',
                'status'   => 0
            ]
        );
    }
}
