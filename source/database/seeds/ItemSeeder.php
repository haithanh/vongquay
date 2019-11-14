<?php

use App\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create(
            [
                'name'  => 'Giảm giá 5%',
                'seo'   => 'giam-gia-5',
                'angle' => '0'
            ]
        );
        Item::create(
            [
                'name'  => 'Giảm giá 10%',
                'seo'   => 'giam-gia-10',
                'angle' => '12'
            ]
        );
        Item::create(
            [
                'name'  => 'Giảm giá 5%',
                'seo'   => 'giam-gia-5-2',
                'angle' => '25'
            ]
        );
        Item::create(
            [
                'name'  => 'Giảm giá 10%',
                'seo'   => 'giam-gia-10-2',
                'angle' => '37'
            ]
        );
        Item::create(
            [
                'name'  => 'Giảm giá 5%',
                'seo'   => 'giam-gia-5-3',
                'angle' => '50'
            ]
        );
        Item::create(
            [
                'name'  => 'Giảm giá 10%',
                'seo'   => 'giam-gia-10-3',
                'angle' => '62'
            ]
        );
        Item::create(
            [
                'name'  => 'Giảm giá 5%',
                'seo'   => 'giam-gia-5-4',
                'angle' => '75'
            ]
        );
        Item::create(
            [
                'name'  => 'Giảm giá 10%',
                'seo'   => 'giam-gia-10-4',
                'angle' => '87'
            ]
        );
    }
}
