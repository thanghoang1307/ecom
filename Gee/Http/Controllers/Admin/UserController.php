<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller as Controller;
use Auth;

class UserController extends Controller
{
    
    public function index(){
     $users = User::all();
     return view('admin.user.index',compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('success','Thay đổi thông tin thành công');
    }

    public function create(Request $request){
    $password = Hash::make($request->new_password);
     $users = User::create(['name' => $request->name,'email' => $request->email,'password' => $password]);
     return redirect()->route('admin.user.index');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.user.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.prd.index');
    }

    public function validatePasswordRequest(Request $request)
    {
        // Kiểm tra email có tồn tại
        $user = DB::table('users')->where('email', '=', $request->email)
            ->first();
        if (!$user) {
            return redirect()->back()->with(['error' => 'Không tồn tại người dùng với email này']);
        }

        // Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);

        //Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return redirect()->route('admin.user.forget_password_page')->with('success', 'Email tạo lại mật khẩu đã được gửi. Vui lòng kiểm tra hộp thư của bạn');
        } else {
            return redirect()->route('admin.user.forget_password_page')->with(['error' => 'Đã có lỗi xảy ra']);
        }
    }

    private function sendResetEmail($email, $token)
    {
        //Retrieve the user from the database
        $user = User::where('email', $email)->first();
        //Generate, the password reset link. The token generated is embedded in the link
        $link = url('/admin') . '/cai-lai-mat-khau/' . $token . '?email=' . urlencode($user->email);
        try {
            //Here send the link with CURL with an external email API
            Mail::to($user->email)->send(new ResetPassword($link, $user));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function resetPassword(Request $request)
    {
        //Validate input
        $validatedData = $request->validate([
            'password' => 'required',
        ]);

        $password = $request->password;
        // Validate the token
        $tokenData = DB::table('password_resets')
            ->where('token', $request->token)->first();
        // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return redirect()->route('admin.user.forget_password_page')->with('error', 'Link thiết lập mật khẩu đã hết hạn');

        $user = User::where('email', $tokenData->email)->first();
        // Redirect the user back if the email is invalid
        if (!$user) return redirect()->route('admin.user.forget_password_page')->with(['error' => 'Không tìm thấy email']);
        //Hash and update the new password
        $user->password = \Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
            ->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Mật khẩu đã được tạo lại thành công');
    }

}
