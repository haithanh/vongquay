<?php

namespace App\Http\Controllers\VongQuay;

use App\Http\Controllers\Controller;
use App\VongQuay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VongQuayController extends Controller
{

    private $aConfigs = null;
    private $sAccessToken = '33hyckgy8zhftqmqjbjv3zaa';
    private $sRefreshToken = 'p3aky7kxgpv6sxgp27dqaqy7';
    private $iTagId = 1228;
    private $sInClientId = 'banuwvz5hmt3zxxq6s8a6j3q';
    private $sInClientSecret = 'a3bMStUpF5';

    public function __construct()
    {
        $this->aConfigs = json_decode(file_get_contents(resource_path('config/config.json')), true);
    }

    public function home(Request $request, $sCuaHangId)
    {
        $sErrors = $this->checkConfigs($sCuaHangId);
        if (!$sErrors)
        {
            $request->session()->put('sCuaHangId', $sCuaHangId);
        }
        $bEmpty   = false;
        $aRewards = $this->getArrayReward($sCuaHangId);
        if (empty($aRewards))
        {
            $bEmpty = true;
        }
        return view('vong-quay/home2', array(
            "sError" => $sErrors,
            "bEmpty" => $bEmpty
        ));
    }

    public function register(Request $request)
    {
        $sPhone     = $request->get('phone');
        $sName      = $request->get('name');
        $sEmail     = $request->get('email');
        $sCuaHangId = $request->session()->get('sCuaHangId');
        $sError     = $this->checkConfigs($sCuaHangId);
        if ($sError)
        {
            $aResult['msg'] = $sError;
            return response()->json($aResult);
        }
        $aResult = array(
            "code" => 0,
            "msg"  => "",
            "data" => array()
        );
        if (empty($sName))
        {
            $aResult['msg'] = "Tên không được bỏ trống";
            return response()->json($aResult);
        }

        if (empty($sPhone))
        {
            $aResult['msg'] = "Số điện thoại không được bỏ trống";
            return response()->json($aResult);
        }

        if (!is_numeric($sPhone))
        {
            $aResult['msg'] = "Số điện thoại không đúng";
            return response()->json($aResult);
        }

        if (!empty($sEmail))
        {
            $bCheckEmail = filter_var($sEmail, FILTER_VALIDATE_EMAIL);
            if (!$bCheckEmail)
            {
                $aResult['msg'] = "Email không đúng";
                return response()->json($aResult);
            }
        }

        $oExist = VongQuay::wherePhone($sPhone)->first();

        if (!empty($oExist))
        {
            $aResult['msg'] = "Số điện thoại đã được đăng kí";
            return response()->json($aResult);
        }

       /* $iCheckInEmail = $this->inCheckContact($sEmail);
        if ($iCheckInEmail == 0)
        {
            $aResult['msg'] = "Bạn chưa mua hàng trên hệ thống.";
            return response()->json($aResult);
        }*/
        $oVongQuay              = new VongQuay();
        $oVongQuay->name        = $sName;
        $oVongQuay->phone       = $sPhone;
        $oVongQuay->email       = $sEmail;
        $oVongQuay->shop_id     = $sCuaHangId;
        $oVongQuay->shop_name   = $this->aConfigs[$sCuaHangId]['name'];
        $oVongQuay->reward_id   = 0;
        $oVongQuay->reward_name = '';
        if ($oVongQuay->save())
        {
            $this->controlTurn($request);
            $request->session()->put('iVongQuayId', $oVongQuay->id);
        }
        else
        {
            $aResult['msg'] = "Lỗi thêm lượt quay";
            return response()->json($aResult);
        }

        $aResult['code'] = 1;
        $aResult['msg']  = "Bạn đã được cộng thêm lượt";
        return response()->json($aResult);
    }

    public function start(Request $request)
    {
        $aResult    = array(
            "code" => 0,
            "msg"  => "",
            "data" => array()
        );
        $sCuaHangId = $request->session()->get('sCuaHangId');
        $sError     = $this->checkConfigs($sCuaHangId);
        if ($sError)
        {
            $aResult['msg'] = $sError;
            return response()->json($aResult);
        }
        $iVongQuayId = $request->session()->get('iVongQuayId');
        if (empty($iVongQuayId) || !is_numeric($iVongQuayId) || $iVongQuayId < 0)
        {
            $aResult['code'] = -1;
            $aResult['msg']  = "Chưa đăng ký";
            return response()->json($aResult);
        }
        $iTurn = $request->session()->get('iTurn');
        if (empty($iTurn) || !is_numeric($iTurn) || $iTurn <= 0)
        {
            $aResult['code'] = -1;
            $aResult['msg']  = "Hết lượt";
            return response()->json($aResult);
        }

        $oVongQuay = VongQuay::find($iVongQuayId);
        if (empty($oVongQuay))
        {
            $aResult['msg'] = "Không tìm thấy log";
            return response()->json($aResult);
        }

        $this->controlTurn($request, false);

        $aRewards = $this->getArrayReward($sCuaHangId);

        if (empty($aRewards))
        {
            $aResult['msg'] = "Quà tặng tạm thời đã hết";
            return response()->json($aResult);
        }
        $iRandom                = intval(rand(0, count($aRewards) - 1));
        $sRewardId              = $aRewards[$iRandom];
        $sRewardName            = $this->aConfigs['items'][$sRewardId]['name'];
        $oVongQuay->reward_id   = $sRewardId;
        $oVongQuay->reward_name = $sRewardName;
        if ($oVongQuay->save())
        {
            $aResult['code'] = 1;
            $aResult['msg']  = "<p style='text-align: center;'>Chúc mừng bạn đã nhận được phần quà: <br> <span style='font-weight:bold;'>{$sRewardName}</span> <br>
                        Cảm ơn bạn đã mua hàng tại Mắt Việt. Mời bạn tới quầy thanh toán để nhận quà.</p>";
            $aResult['data'] = array(
                "result" => $this->aConfigs['items'][$sRewardId]['result']
            );
            if (env('APP_ENV') == 'production')
            {
                //      $this->inCreateContact($oVongQuay->name, $oVongQuay->phone, $oVongQuay->email, $oVongQuay->reward_name, $oVongQuay->shop_name);
            }
        }
        else
        {
            $aResult['msg'] = "Không cập nhật được log";
        }

        return response()->json($aResult);
    }

    public function test(Request $request)
    {
        $this->inCreateContact($request->get('name'), $request->get('phone'), $request->get('email'));
        // $this->inApplyID(319800);
    }

    private function controlTurn(Request $request, $bAdd = true)
    {
        $iTurn = $request->session()->get('iTurn');
        if ($bAdd)
        {
            $iTurn++;
        }
        else
        {
            $iTurn--;
        }
        $request->session()->put('iTurn', $iTurn);
    }

    private function getArrayReward($sCuaHangId)
    {
        $aShopConfigs  = $this->aConfigs[$sCuaHangId];
        $aArrayReward  = array();
        $iTotalPercent = 0;
        foreach ($aShopConfigs['items'] as $sRewardId => $aItemConfigs)
        {
            $oLimit = VongQuay::whereRewardId($sRewardId)->whereShopId($sCuaHangId)->get();
            if ($oLimit->count() < $aItemConfigs["number"])
            {
                for ($i = 0; $i < $aItemConfigs['percent']; $i++)
                {
                    $aArrayReward[] = $sRewardId;
                }
                $iTotalPercent += $aItemConfigs['percent'];
            }
        }
        shuffle($aArrayReward);
        return $aArrayReward;
    }

    private function checkConfigs($sCuaHangId)
    {

        if (empty($this->aConfigs))
        {
            return "Chưa cấu hình";
        }

        if (empty($sCuaHangId))
        {
            return "Không tìm thấy cửa hàng";
        }

        if (!isset($this->aConfigs[$sCuaHangId]) || empty($this->aConfigs[$sCuaHangId]))
        {
            return "Không tìm thấy cửa hàng";
        }
        return false;
    }

    private function inCheckContact($sEmail)
    {
        $this->inRefreshToken();
        $sAccessToken = Cache::get('inAccessToken');

        $aData = array(
            "limit" => 1,
            "email" => $sEmail,
        );
        $ch    = curl_init('https://api.infusionsoft.com/crm/rest/v1/contacts?' . http_build_query($aData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $sAccessToken,
            'Accept: application/json',
            'Content-Type:application/json'
        ));
        $sResponse = curl_exec($ch);
        $oResult   = json_decode($sResponse);
        if (isset($oResult->count) && is_numeric($oResult->count) && $oResult->count > 0)
        {
            return $oResult->count;
        }
        return 0;
    }

    private function inCreateContact($name, $phone, $email, $reward, $shop)
    {
        $this->inRefreshToken();
        $sAccessToken = Cache::get('inAccessToken');

        $aData = array(
            "given_name"      => $name,
            "phone_numbers"   => array(
                array(
                    "extension" => '',
                    "field"     => "PHONE1",
                    "number"    => $phone,
                    "type"      => ''
                )
            ),
            "email_addresses" => array(
                array(
                    'email' => $email,
                    "field" => "EMAIL1"
                )
            ),
            'notes'           => $reward . "-" . $shop
        );
        $ch    = curl_init('https://api.infusionsoft.com/crm/rest/v1/contacts');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($aData));
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $sAccessToken,
            'Accept: application/json',
            'Content-Type:application/json'
        ));
        $sResponse = curl_exec($ch);
        $oResult   = json_decode($sResponse);
        if (isset($oResult->id) && is_numeric($oResult->id))
        {
            $this->inApplyID($oResult->id);
        }
    }

    private function inApplyID($contactId)
    {
        $this->inRefreshToken();
        $sAccessToken = Cache::get('inAccessToken');

        $aData = array(
            "tagIds" => array(1228)
        );
        $ch    = curl_init("https://api.infusionsoft.com/crm/rest/v1/contacts/{$contactId}/tags");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($aData));
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $sAccessToken,
            'Accept: application/json',
            'Content-Type:application/json'
        ));
        $sResponse = curl_exec($ch);
        $oResult   = json_decode($sResponse);
    }

    private function inRefreshToken()
    {
        $refreshToken = Cache::get('inRefreshToken');
        if (empty($refreshToken))
        {
            $refreshToken = $this->sRefreshToken;
        }
        $aData = array(
            "grant_type"    => 'refresh_token',
            "refresh_token" => $refreshToken
        );
        $ch    = curl_init('https://api.infusionsoft.com/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($aData));
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic ' . base64_encode($this->sInClientId . ":" . $this->sInClientSecret),
            'Accept: application/json, */*'
        ));
        $sResponse = curl_exec($ch);
        $oResult   = json_decode($sResponse);
        \Log::info($sResponse);
        if (isset($oResult->access_token) && !empty($oResult->access_token))
        {
            Cache::put('inAccessToken', $oResult->access_token, 100);
        }
        if (isset($oResult->refresh_token) && !empty($oResult->refresh_token))
        {
            Cache::put('inRefreshToken', $oResult->refresh_token, 100);
        }
    }

}
