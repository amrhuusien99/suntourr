<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\Models\Hotel;
use App\Models\Client;
use Mail;
use App\Mail\ResetPassword;

class AuthController extends Controller
{   
    ///////////////////////////////////////////////////////////////////////////// start hotel auth

    public function hotel_register(Request $request){

        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed',
            'photo' => 'required',
            'average_price' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'governorate_id' => 'required|exists:governorates,id',
            'category_id' => 'required|exists:categories,id',
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $request->merge(['password'=>bcrypt($request->password)]);
        $hotels = Hotel::create($request->all());
        $hotels->api_token = str_random(60);
        if ($request->hasFile('photo')) {
            $path = public_path();
            $destinationPath = $path . '/uploads/hotels/'; // upload path
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $hotels->photo = 'uploads/hotels/' . $name;
        }
        $hotels->save();
        return responseJson(1, 'success', [
            'api_token' => $hotels->api_token,
            'hotel' => $hotels
        ]);

    }

    public function hotel_login(Request $request){

        $validator = validator()->make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return responseJson(1, $validator->errors()->first());
        }

        $hotel = Hotel::where('email',$request->email)->first();
        if($hotel){
            if(Hash::check($request->password,$hotel->password)){
                return responseJson(1, 'success', [
                    'api_token' => $hotel->api_token,
                    'hotel' => $hotel
                ]);
            }else{
                return responseJson(0, 'error', 'password not Correct');
            }
        }else{
            return responseJson(0, 'error', 'The Data is not Correct');
        }

    }

    public function hotel_reset_password(Request $request){

        $validator = validator()->make($request->all(),[
            'email' => 'required|exists:hotels,email'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $hotel = Hotel::where('email',$request->email)->first();
        if($hotel){
            $code = rand(1111, 9999);
            $update = $hotel->update(['pin_code' => $code]);
            $hotel->save();
            if($update){
                //smsMisr($hotel->phone,"Your Rest Code Is : ".$code);
                Mail::to($hotel->email)
                    ->bcc("amrhuusien99@gmail.com")
                    ->send(new ResetPassword($code));
                return responseJson(1, 'success', 'The Code Was Send Successfully');   
            }
        }else{
            return responseJson(0, 'Error', 'The Data Is Not Correct');
        }

    }
    
    public function hotel_reset_password_save(Request $request){
        
        $validator = validator()->make($request->all(),[
            'phone' => 'required|exists:hotels,phone',
            'pin_code' => 'required|exists:hotels,pin_code',
            'password' => 'required|confirmed'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $hotel = Hotel::where('phone',$request->phone)->first();
        if($hotel){
            $code = Hotel::where('pin_code',$request->pin_code)->first();
            if($code){
                $hotel->password = bcrypt($request->input('password'));
                $hotel->pin_code = null;
                $hotel->save();
                return responseJson(1, 'The Password Has Chenged');
            }else{
                return responseJson(0, 'The Pin Code Is Invalid');
            }
        }else{
            return responseJson(0, 'The Data Is Not Correct');
        }

    }


    ///////////////////////////////////////////////////////////////////////// end hotel auth

    ///////////////////////////////////////////////////////////////////////// start client auth

    public function client_register(Request $request){

        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'photo' => 'required',
            'password' => 'required|confirmed',
            'governorate_id' => 'required|exists:governorates,id'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $request->merge(['password'=>bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = str_random(60);
        if ($request->hasFile('photo')) {
            $path = public_path();
            $destinationPath = $path . '/uploads/clients/'; // upload path
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $client->photo = 'uploads/clients/' . $name;
        }
        $client->save();
        return responseJson(1, 'success', [
            'api_token' => $client->api_token,
            'client' => $client
        ]);

    }

    public function client_login(Request $request){

        $validator = validator()->make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return responseJson(0, $vaalidator->errors()->first());
        }

        $client = CLient::where('email',$request->email)->first();
        if($client){
            if(Hash::check($request->password,$client->password)){
                return responseJson(1, 'success', [
                    'api_token' => $client->api_token,
                    'client' => $client
                ]);
            }else{
                return responseJson(0, 'Password Not Correct');
            }
        }else{
            return responseJson(0, 'The Data Is Not Correct');
        }

    }

    public function client_reset_password(Request $request){

        $validator = validator()->make($request->all(),[
            'email' => 'required'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $client = Client::where('email',$request->email)->first();
        if($client){
            $code = rand(1111, 9999);
            $update = $client->update(['pin_code' => $code]);
            if($update){
                Mail::to($client->email)
                    ->bcc("amrhuusien99@gmail.com")
                    ->send(new ResetPassword($code));
                return responseJson(1, 'success', 'The Code Was Send Successfully');
            }
        }else{
            return responseJson(0, 'The Data Is Not Correct');
        }

    }

    public function client_reset_password_save(Request $request){

        $validator = validator()->make($request->all(),[
            'phone' => 'required',
            'pin_code' => 'required',
            'password' => 'required|confirmed'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $client = Client::where('phone',$request->phone)->first();
        if($client){
            $code = Client::where('pin_code',$request->pin_code)->first();
            if($code){
                $client->password = bcrypt($request->input('password'));
                $client->pin_code = null;
                $client->save();
                return responseJson(1, 'success', 'The Password Has Chenged');
            }else{
                return responseJson(0, 'The Code Is Invalid');
            }
        }else{
            return responseJson(0, 'The Data Is Not Correct');
        }

    }

}
