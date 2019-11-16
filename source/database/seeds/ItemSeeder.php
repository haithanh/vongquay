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
                'name'  => 'Giảm giá 10%',
                'seo'   => 'giam-gia-10',
                'angle' => '22'
            ]
        );
        Item::create(
            [
                'name'  => 'Chúc bạn may mắn',
                'seo'   => 'chuc-ban-may-man',
                'angle' => '67'
            ]
        );
        Item::create(
            [
                'name'  => 'Giảm giá 5%',
                'seo'   => 'giam-gia-5',
                'angle' => '112'
            ]
        );
        Item::create(
            [
                'name'  => 'Chúc bạn may mắn',
                'seo'   => 'chuc-ban-may-man-2',
                'angle' => '157'
            ]
        );
        Item::create(
            [
                'name'  => 'Giảm giá 5%',
                'seo'   => 'giam-gia-5-2',
                'angle' => '202'
            ]
        );
        Item::create(
            [
                'name'  => 'Giảm giá 10%',
                'seo'   => 'giam-gia-10-2',
                'angle' => '247'
            ]
        );
        Item::create(
            [
                'name'  => 'Chúc bạn may mắn',
                'seo'   => 'chuc-ban-may-man-3',
                'angle' => '292'
            ]
        );
        Item::create(
            [
                'name'  => 'Giảm giá 5%',
                'seo'   => 'giam-gia-5-3',
                'angle' => '337'
            ]
        );
    }
}
