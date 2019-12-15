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
                'name'      => 'Giảm giá 10%',
                'seo'       => 'giam-gia-10',
                'angle'     => '334',
                'code_type' => 2
            ]
        );
        Item::create(
            [
                'name'      => 'Chúc bạn may mắn',
                'seo'       => 'chuc-ban-may-man',
                'angle'     => '292',
                'code_type' => 0
            ]
        );
        Item::create(
            [
                'name'      => 'Giảm giá 5%',
                'seo'       => 'giam-gia-5',
                'angle'     => '247',
                'code_type' => 1
            ]
        );
        Item::create(
            [
                'name'      => 'Chúc bạn may mắn',
                'seo'       => 'chuc-ban-may-man-2',
                'angle'     => '202',
                'code_type' => 0
            ]
        );
        Item::create(
            [
                'name'      => 'Giảm giá 5%',
                'seo'       => 'giam-gia-5-2',
                'angle'     => '157',
                'code_type' => 1
            ]
        );
        Item::create(
            [
                'name'      => 'Giảm giá 10%',
                'seo'       => 'giam-gia-10-2',
                'angle'     => '112',
                'code_type' => 2
            ]
        );
        Item::create(
            [
                'name'      => 'Chúc bạn may mắn',
                'seo'       => 'chuc-ban-may-man-3',
                'angle'     => '67',
                'code_type' => 0
            ]
        );
        Item::create(
            [
                'name'      => 'Giảm giá 5%',
                'seo'       => 'giam-gia-5-3',
                'angle'     => '22',
                'code_type' => 1
            ]
        );
    }
}
