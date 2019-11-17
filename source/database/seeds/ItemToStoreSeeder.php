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
        //region aItemStores
        $aItemStores = [
            [
                1 => 30,
                2 => 20
            ],
            [
                1 => 40,
                2 => 30
            ],
            [
                1 => 40,
                2 => 30
            ],
            [
                1 => 15,
                2 => 10
            ],
            [
                1 => 10,
                2 => 5
            ],
            [
                1 => 10,
                2 => 5
            ],
            [
                1 => 10,
                2 => 5
            ],
            [
                1 => 5,
                2 => 5
            ],
            [
                1 => 20,
                2 => 10,
            ],
            [
                1 => 30,
                2 => 20
            ],
            [
                1 => 20,
                2 => 10
            ],
            [
                1 => 10,
                2 => 10
            ],
            [
                1 => 10,
                2 => 10
            ],
            [
                1 => 20,
                2 => 10
            ],
            [
                1 => 20,
                2 => 10
            ],
            [
                1 => 10,
                2 => 5
            ],
            [
                1 => 10,
                2 => 5
            ],
            [
                1 => 5,
                2 => 5
            ],
            [
                1 => 10,
                2 => 10
            ],
            [
                1 => 30,
                2 => 20
            ],
            [
                1 => 20,
                2 => 20
            ],
            [
                1 => 30,
                2 => 20
            ],
            [
                1 => 10,
                2 => 5
            ],
            [
                1 => 5,
                2 => 5
            ],
            [
                1 => 10,
                2 => 5
            ],
            [
                1 => 20,
                2 => 10
            ],
            [
                1 => 20,
                2 => 20
            ],
            [
                1 => 20,
                2 => 10
            ],
            [
                1 => 20,
                2 => 10
            ],
            [
                1 => 40,
                2 => 30
            ],
            [
                1 => 10,
                2 => 10
            ],
            [
                1 => 10,
                2 => 5
            ],
            [
                1 => 10,
                2 => 10
            ],
            [
                1 => 15,
                2 => 10
            ],
            [
                1 => 10,
                2 => 10
            ],
            [
                1 => 10,
                2 => 5
            ]
        ];
        //endregion

        //region aItemMaps
        $aItemMaps = [
            1 => 2,
            2 => 3,
            3 => 1,
            4 => 3,
            5 => 1,
            6 => 2,
            7 => 3,
            8 => 1
        ];
        //endregion

        //region aPercents
        $aItemsPercent =[
            1 => 30,
            2 => 10,
            3 => 60
        ];
        //endregion

        //region Create Store
        $iStoreId = 0;
        foreach ($aItemStores as $aItemStore) {
            $iStoreId++;
            foreach ($aItemMaps as $iItemId => $iItemMapId) {
                $aData = [
                    'store_id' => $iStoreId,
                    'item_id'  => $iItemId
                ];

                //Set number
                if ($iItemMapId == 1) {
                    $aData['number']  = round($aItemStore[$iItemMapId] / 3);
                    $aData['percent'] = round($aItemsPercent[$iItemMapId] / 3);
                } elseif ($iItemMapId == 2) {
                    $aData['number']  = round($aItemStore[$iItemMapId] / 2);
                    $aData['percent'] = round($aItemsPercent[$iItemMapId] / 2);
                } else {
                    $aData['number']  = -1;
                    $aData['percent'] = round($aItemsPercent[$iItemMapId] / 3);
                }
                ItemToStore::create($aData);
            }
        }
        //endregion
    }
}
