<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuthException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth.jwt', ['except' => ['login','phoneNumberVerification']]);
    }
    private $api_key = 'APA91bEacXF96n2qYk8IhHbGT4ZUc12uOtBcT6jgorKrdionryG8W1D6q';
    
    public function checkAPIKey($key) 
    {
        if($this->api_key === $key){
          return true;
        }else{
            return false;
        }
    }
    public function phoneNumberVerification(Request $request){
    //    return response()->json($response);
        $validator = Validator::make($request->all(), [
            'mobile_number' => 'required',
            'device_id' => 'required',
        ]);
         if ($validator->fails()) {
            $response = array(
                'success'=>false,
                'messageId'=>203,
                'message'=>'Invalid Parameter',
                'error'=>$validator->errors()
            );
           return response()->json($response);
        }
        $comman = new CommanController;
        $number =$request->mobile_number;
        $device_id =$request->device_id;
        $res = $comman->validateNumber($number);
        if(!$res['status']){
            $response = array(
                'status'=>false,
                'messageId'=>203,
                'message'=>'Invalid Phone Number',
                'error'=>$validator->errors()
            );
           return response()->json($response);
        }
        
        $phone_number = $res['number'];
        $country_code = $res['country_code'];
        $messageFlag = $this->sendOtp($phone_number);
        $otp = 123456;
        if($messageFlag['status']){
            $flag = \App\Models\User::where('mobile_number',$phone_number)->get()->count();
            if($flag>0){
                \App\Models\User::where('mobile_number',$phone_number)->update(['otp_count'=>1,'device_id'=>$device_id,'otp'=>$otp]);
            }else{
                $flag =\App\Models\User::create([
                    'device_id'=>$device_id,
                    'mobile_number'=>$phone_number,
                    'contry_code'=>$country_code,
                    'otp_count'=>1,
                    'otp'=>$otp,
                    // 'user_reg_status'=>"NEW"
                ]);
            }

            if(!$flag){
                $response = [
                    'status'=>false,
                    'messageId'=>203,
                    'message'=>'Something went wrong. Please try again later',
                ];
                return response()->json($response);
            } else{
                $response = [
                    'status'=>true,
                    'messageId'=>200,
                    'message'=>'We have sent an OTP to '.$request->mobile_number,
                    'data'=>[
                        'phone_number'=>$request->mobile_number,
                        'otp'=>$otp,
                    ]
                ];
            }
        }else {
            $response = [
                'status'=>false,
                'messageId'=>203,
                'message'=>'Something went wrong. Please try again later',
            ];
        }
        return response()->json($response);
    }

    public function sendOtp($mobile='919926331375'){
        return ['status'=>true,'data'=>[]];
        // $mobile = '91'.$mobile;
        // $curl = curl_init();
        // $auth_key = config('constants.auth_key');
        // $template_id = config('constants.template_id');
        // $extra_param = '';
        // $url = "https://api.msg91.com/api/v5/otp?authkey=".$auth_key."&template_id=".$template_id."&extra_param=".$extra_param."&mobile=".$mobile."&";
        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => $url,
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => "",
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 30,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => "GET",
        //   CURLOPT_SSL_VERIFYHOST => 0,
        //   CURLOPT_SSL_VERIFYPEER => 0,
        //   CURLOPT_HTTPHEADER => array(
        //     "content-type: application/json"
        //   ),
        // ));
        
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        
        // curl_close($curl);
        
        // if ($err) {
        //   return ['status'=>fasle];
        // } else {
        //     $arr = json_decode($response);
        //     if($arr->type == "success"){
        //        return ['status'=>true,'data'=>$arr];
        //     }else{
        //         return ['status'=>fasle];
        //     }
        // }
    }
    public function otpVerification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_number' => 'required',
            'otp' => 'required',
        ]);
        // $api = new ApiController;
        $comman = new CommanController;
        $number =$request->mobile_number;
        $res = $comman->validateNumber($number);
        // return response()->json($res);
        if(!$res['status']){
            $response = array(
                'status'=>false,
                'messageid'=>203,
                'message'=>'Phone Number Required',
                'error'=>$validator->errors()
            );
           return response()->json($response);
        }

        $mobile_number = $res['number'];
        $country_code = $res['country_code'];
        // $ress = $this->verifyOtp($mobile_number,$request->otp);
        $user = \App\Models\User::where(['mobile_number'=>$mobile_number,'otp'=>$request->otp])->first();
        if($user){
            // $user = \App\Customer::where(['mobile_number'=>$mobile_number])->first();
            $customClaims = ['sid' => $user->id, 'baz' => 'bob','exp' => date('Y-m-d', strtotime('+12 month', strtotime(date('Y-m-d'))))];
            $token = JWTAuth::fromUser($user, $customClaims);
            $response = [
                'status'=>true,
                'messageId'=>200,
                'message'=>'Your phone number verified successfully.',
                'data'=>[
                    'token'=>$token,
                    'user'=>$user
                ]
            ];
            \App\Models\User::where(['mobile_number'=>$mobile_number])->update(['otp'=>'','otp_count'=>0]);
            return response()->json($response);
            return response()->json($user);
        }else{
                    $response = array(
                    'status'=>false,
                    'message'=>'Operation failed please try again',
                    'messageId'=>203
                );
                return response()->json($response);
        }  
    }

    public function signup($user)
    {
        $user =\App\Customer::create([
            'mobile_number'=>$user['mobile'],
            // 'otp'=>$user['otp'],
            'otp_count'=>1,
            'country_code'=>$user['country_code'],
            'user_reg_status'=>"NEW"
          ]);
        if($user){
            return ['status'=>true,'data'=>$user];
        }else{
            return ['status'=>false,'data'=>[]];
        }
    }
}
