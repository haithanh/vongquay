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
                1 => 60,
                2 => 38
            ],
            [
                1 => 80,
                2 => 60
            ],
            [
                1 => 80,
                2 => 60
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
                1 => 20,
                2 => 10
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
                1 => 40,
                2 => 20,
            ],
            [
                1 => 60,
                2 => 40
            ],
            [
                1 => 40,
                2 => 20
            ],
            [
                1 => 20,
                2 => 20
            ],
            [
                1 => 20,
                2 => 20
            ],
            [
                1 => 40,
                2 => 20
            ],
            [
                1 => 40,
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
                1 => 10,
                2 => 10
            ],
            [
                1 => 20,
                2 => 20
            ],
            [
                1 => 60,
                2 => 40
            ],
            [
                1 => 40,
                2 => 40
            ],
            [
                1 => 60,
                2 => 40
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
                1 => 20,
                2 => 10
            ],
            [
                1 => 40,
                2 => 20
            ],
            [
                1 => 40,
                2 => 40
            ],
            [
                1 => 40,
                2 => 20
            ],
            [
                1 => 40,
                2 => 20
            ],
            [
                1 => 80,
                2 => 60
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
                2 => 20
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
                1 => 20,
                2 => 10
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
            1 => 60,
            2 => 40,
            3 => 0
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
