<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Mail;
use App\Mail\ResetPassword;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = User::latest()->paginate(20);
        return view('users.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'photo' => 'required',
            'password' => 'required|confirmed'
        ]);
        if($validator->fails()){
            flash()->error($validator->errors()->first());
            return back();
        }
        $request->merge(['password' => bcrypt($request->password)]);
        $users = User::create($request->all());
        if ($request->hasFile('photo')) {
            $path = public_path();
            $destinationPath = $path . '/uploads/users/'; // upload path
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $users->photo = 'uploads/users/' . $name;
        }
        $users->save();
        flash()->success("Success");
        return redirect(route('users.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::findOrFail($id);
        return view('users.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = User::findOrFail($id);
        $record->update($request->all());
        flash()->success("Success");
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = User::findOrFail($id);
        $record->delete();
        return back();
    }

    public function login(){
        return view('auth.login');
    }

    public function login_check(Request $request){

        $validator = validator()->make($request->all(),[
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);
        if($validator->fails()){
            flash()->error($validator->errors()->first());
            return back();
        }

        $user = User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                if(Auth::guard('web')->attempt($request->only('email', 'password'))){
                    return redirect(route('home'));
                }else{
                    flash()->success("There Is Something Wrong");
                    return back();
                }
            }else{
                flash()->error("There Is Something Wrong");
                return back();
            }
        }else{
            falsh()->error("There Is Something Wrong");
            return back();
        }

    }

    public function my_information(){
        $user = Auth::user();
        return view('users.info',compact('user'));
    }

    public function reset_password(){
        return view('auth.reset');
    }

    public function reset_password_pin_code(Request $request){

        $validator = validator()->make($request->all(),[
            'email' => 'required|exists:users,email'
        ]);
        if($validator->fails()){
            flash()->error($validator->errors()->first());
            return back();
        }

        $user = User::where('email',$request->email)->first();
        if($user){
            $code = rand(1111, 9999);
            $update = $user->update(['pin_code' => $code]);
            if($update){
                Mail::to($user->email)
                    ->bcc("amrhussien99@gmail.com")
                    ->send(New ResetPassword($code));
                return view('auth.resetpassword');
            }
        }else{
            flash()->error("There Is Something Wrong");
            return back();
        }

    }

    public function reset_password_save(Request $request){

        $validator = validator()->make($request->all(),[
            'phone' => 'required|exists:users,phone',
            'pin_code' => 'required|exists:users,pin_code',
            'password' => 'required|confirmed'
        ]);
        if($validator->fails()){
            flash()->error($validator->errors()->first());
            return back();
        }

        $user = User::where('phone',$request->phone)->first();
        if($user){
            $pin = $user->where('pin_code',$request->pin_code)->first();
            if($pin){
                $user->password = bcrypt($request->input('password'));
                $user->pin_code = null;
                $user->save();
                return redirect(route('home'));
            }else{
                flash()->error("The Pin Code Is Invalid");
                return back();
            }
        }else{
            flash()->error("The Data Is Not Correct");
            return back();
        }

    }

    public function change_password(){
        return view('users.changepassword');
    }

    public function change_password_save(Request $request){

        $validator = validator()->make($request->all(),[
            'old-password' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            flash()->error($validator->errors()->first());
            return back();
        }

        $user = Auth::user();
        if(Hash::check($request->input('old-password'),$user->password)){
            $user->password = bcrypt($request->input('password'));
            $user->save();
            flash()->success("Password Chenged");
            return back();
        }else{
            flash()->error("There Is Something Wronge");
            return back();
        }

    }


}
