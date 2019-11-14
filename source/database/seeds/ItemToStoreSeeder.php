<?php

use App\ItemToStore;
use Illuminate\Database\Seeder;

class ItemToStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemToStore::create(
            [
                'store_id'  => '1',
                'item_id'   => '1',
                'number'    => '2',
                'percent'   => '15'
            ]
        );
        ItemToStore::create(
            [
                'store_id'  => '1',
                'item_id'   => '2',
                'number'    => '2',
                'percent'   => '10'
            ]
        );
        ItemToStore::create(
            [
                'store_id'  => '1',
                'item_id'   => '3',
                'number'    => '2',
                'percent'   => '15'
            ]
        );
        ItemToStore::create(
            [
                'store_id'  => '1',
                'item_id'   => '4',
                'number'    => '2',
                'percent'   => '10'
            ]
        );
        ItemToStore::create(
            [
                'store_id'  => '1',
                'item_id'   => '5',
                'number'    => '2',
                'percent'   => '15'
            ]
        );
        ItemToStore::create(
            [
                'store_id'  => '1',
                'item_id'   => '6',
                'number'    => '2',
                'percent'   => '10'
            ]
        );
        ItemToStore::create(
            [
                'store_id'  => '1',
                'item_id'   => '7',
                'number'    => '2',
                'percent'   => '15'
            ]
        );
        ItemToStore::create(
            [
                'store_id'  => '1',
                'item_id'   => '8',
                'number'    => '2',
                'percent'   => '10'
            ]
        );
    }
}
