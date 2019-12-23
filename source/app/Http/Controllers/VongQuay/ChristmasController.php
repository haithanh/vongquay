<?php

namespace App\Http\Controllers\VongQuay;

use App\Code;
use App\History;
use App\Http\Controllers\Controller;
use App\Item;
use App\ItemToStore;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChristmasController extends Controller
{
    public function home(Request $request, $sCuaHangId)
    {
        $oStore   = Store::whereSeo($sCuaHangId)->first();
        $sErrors  = '';
        $bEmpty   = false;
        if (!empty($oStore)) {
            $request->session()->put('sCuaHangId', $sCuaHangId);
            $aRewards = $this->getArrayReward($oStore);
            if (empty($aRewards)) {
                $bEmpty = true;
            }
        } else {
            $sErrors = 'Không tìm thấy cửa hàng';
        }

        return view('vong-quay/christmas', [
            'sError' => $sErrors,
            'bEmpty' => $bEmpty
        ]);
    }

    public function register(Request $request)
    {
        $sPhone       = $request->get('phone');
        $sName        = $request->get('name');
        $sAddress     = $request->get('address');
        $sCuaHangId   = $request->session()->get('sCuaHangId');
        $oStore       = Store::whereSeo($sCuaHangId)->first();
        $aResult      = [
            'code' => 0,
            'msg'  => '',
            'data' => []
        ];
        if (empty($oStore)) {
            $aResult['msg'] = 'Cửa hàng không tồn tại';

            return response()->json($aResult);
        }

        if (empty($sName)) {
            $aResult['msg'] = 'Tên không được bỏ trống';

            return response()->json($aResult);
        }

        if (empty($sPhone)) {
            $aResult['msg'] = 'Số điện thoại không được bỏ trống';

            return response()->json($aResult);
        }

        if (!is_numeric($sPhone)) {
            $aResult['msg'] = 'Số điện thoại không đúng';

            return response()->json($aResult);
        }

        /* if (!empty($sEmail)) {
             $bCheckEmail = filter_var($sEmail, FILTER_VALIDATE_EMAIL);
             if (!$bCheckEmail) {
                 $aResult['msg'] = 'Email không đúng';

                 return response()->json($aResult);
             }
         }*/

        $oExist = History::wherePhone($sPhone)->whereBetween('created_at', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->first();

        if (!empty($oExist)) {
            $aResult['msg'] = 'Số điện thoại đã được đăng kí';

            return response()->json($aResult);
        }

        /* $iCheckInEmail = $this->inCheckContact($sEmail);
         if ($iCheckInEmail == 0)
         {
             $aResult['msg'] = "Bạn chưa mua hàng trên hệ thống.";
             return response()->json($aResult);
         }*/
        $oHistory               = new History();
        $oHistory->name         = $sName;
        $oHistory->phone        = $sPhone;
        $oHistory->address      = $sAddress;
        $oHistory->store_id     = $oStore->id;
        if ($oHistory->save()) {
            $this->controlTurn($request);
            $request->session()->put('iVongQuayId', $oHistory->id);
        } else {
            $aResult['msg'] = 'Lỗi thêm lượt quay';

            return response()->json($aResult);
        }

        $aResult['code'] = 1;
        $aResult['msg']  = 'Mời bạn bắt đầu quay';

        return response()->json($aResult);
    }

    public function start(Request $request)
    {
        $aResult    = [
            'code' => 0,
            'msg'  => '',
            'data' => []
        ];
        $sCuaHangId = $request->session()->get('sCuaHangId');
        $oStore     = Store::whereSeo($sCuaHangId)->first();
        if (empty($oStore)) {
            $aResult['msg'] = 'Cửa hàng không tồn tại';

            return response()->json($aResult);
        }
        $iVongQuayId = $request->session()->get('iVongQuayId');
        if (empty($iVongQuayId) || !is_numeric($iVongQuayId) || $iVongQuayId < 0) {
            $aResult['code'] = -1;
            $aResult['msg']  = 'Chưa đăng ký';

            return response()->json($aResult);
        }
        $iTurn = $request->session()->get('iTurn');
        if (empty($iTurn) || !is_numeric($iTurn) || $iTurn <= 0) {
            $aResult['code'] = -1;
            $aResult['msg']  = 'Hết lượt';

            return response()->json($aResult);
        }

        $oHistory = History::find($iVongQuayId);
        if (empty($oHistory)) {
            $aResult['msg'] = 'Không tìm thấy log';

            return response()->json($aResult);
        }

        $this->controlTurn($request, false);

        $aRewards = $this->getArrayReward($oStore);

        if (empty($aRewards)) {
            $aRewards = [2, 4, 7];
        }
        $iRandom                = intval(rand(0, count($aRewards) - 1));
        $iItemId                = $aRewards[$iRandom];
        $oHistory->item_id      = $iItemId;
        $oHistory->save();
        $oItem  = Item::find($iItemId);
        $sCode  = '';
        DB::beginTransaction();
        if ($oItem->code_type > 0) {
            $oCode  = Code::whereCodeType($oItem->code_type)->whereStatus(0)->lockForUpdate()->first();
        }

        if (empty($oCode)) {
            $iItemId = 2;
        } else {
            $oCode->store_id = $oStore->id;
            $oCode->status   = 1;
            $oCode->save();
            $oHistory->code_id = $oCode->id;
            $oHistory->save();

            $sCode = ': ' . $oCode->code;
        }
        $oHistory->item_id = $iItemId;
        $oHistory->save();
        DB::commit();
        $aResult['code'] = 1;
        $aResult['msg']  = "<p style='text-align: center;'>Chúc mừng bạn đã nhận được
    phần quà: <br> <span style='font-weight:bold;'>{$oItem->name}{$sCode} </span> <br>
    Cảm ơn bạn đã mua hàng tại Mắt Việt.</p>";
        $aResult['data'] = [
            'result' => $oItem->angle
        ];

        return response()->json($aResult);
    }

    public function test(Request $request)
    {
        $this->inCreateContact(
            $request->get('name'),
            $request->get('phone'),
            $request->get('email')
        );
        // $this->inApplyID(319800);
    }

    private function controlTurn(Request $request, $bAdd = true)
    {
        $iTurn = $request->session()->get('iTurn');
        if ($bAdd) {
            $iTurn++;
        } else {
            $iTurn--;
        }
        $request->session()->put('iTurn', $iTurn);
    }

    private function getArrayReward(Store $oStore)
    {
        $oItems       = ItemToStore::whereStoreId($oStore->id)->get();
        $aArrayReward = [];
        if (!empty($oItems) && $oItems->count() > 0) {
            foreach ($oItems as $oItem) {
                if ($oItem->number == -1) {
                    for ($i = 0; $i < $oItem->percent; $i++) {
                        $aArrayReward[] = $oItem->item_id;
                    }
                } else {
                    $oLimit = History::whereItemId($oItem->id)->whereStoreId($oStore->id)->get();
                    if ($oLimit->count() < $oItem->number) {
                        for ($i = 0; $i < $oItem->percent; $i++) {
                            $aArrayReward[] = $oItem->item_id;
                        }
                    }
                }
            }
            shuffle($aArrayReward);
        }

        return $aArrayReward;
    }

    public function result(Request $request, $sStoreSeo = null)
    {
        $sView    = 'vong-quay/result';
        $iStoreId = 0;
        if (!empty($sStoreSeo)) {
            $oStore = Store::whereSeo($sStoreSeo)->first();
            if (!empty($oStore)) {
                $iStoreId = $oStore->id;
            }
        }
        if (!empty($iStoreId)) {
            $oHistories = History::whereStoreId($iStoreId);
        } else {
            $oHistories = History::orderBy('id', 'DESC');
        }
        $oHistories->with('item');
        $oHistories->with('store');
        $oHistories->with('code');
        $oHistories = $oHistories->orderBy('id', 'DESC')->get();
        dd($oHistories->toArray());

        return view($sView, compact('oHistories'));
    }
}
