<?php

namespace App\Http\Controllers;

use App\Models\DataPelanggan;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;



class loginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }


    public function login_post(Request $request){
        Session::flash('email', $request->email);
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);
    
        $loginproses= [
            'email'     => $request->email,
            'password'  => $request->password
        ];
    
        if(Auth::attempt($loginproses)){
            if(Auth::user()->role == 'admin') {
                return redirect('admin-dashboard');
            } else {
                return redirect('halamanutama');
            }
        } else {
            return redirect()->route('login')->withErrors('Email atau Password Anda Salah');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success','Anda berhasil logout');
    }

     
    public function register()
    {
        return view('auth.register');
    }

   
    public function register_post (Request $request){
        Session::flash('nama', $request->nama);
        Session::flash('email', $request->email);
            $data1 = $request->validate([
                
                'name'     => 'required',
                'email'     => 'required',
                'password'  => 'required',
                'alamat'  => 'required',
                'nomor_handphone'  => 'required',
            ],[
               'name.required' => 'Nama wajib diisi',
               'email.required' => 'Email wajib diisi',
               'email.email' => 'Silahkan masukkan email yang valid',
               'password.required' => 'Password wajib diisi',
               'password.min' => 'Minimun password yang digunakan 6 karakter',
            ]);

               $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'alamat' => $request->alamat,
                'nomor_handphone' => $request->nomor_handphone,
            ]);

            
            DataPelanggan::create([
                'nama' => $request->name,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'no_handphone' => $request->nomor_handphone,
            ]);

            if (Auth::login($user)) {
                // Redirect ke halaman yang sesuai setelah login
                if ($user->role == 'admin') {
                    return redirect('admin-dashboard');
                } else {
                    return redirect('halamanutama');
                }
            } else {
                // Gagal autentikasi
                return redirect()->route('login')->withErrors('Gagal login.');
            }
       }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    //forget password
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Temukan pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        // Tentukan broker berdasarkan peran pengguna
        $broker = $user->role === 'admin' ? 'admins' : 'users';

        $status = Password::broker($broker)->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
  
   
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Temukan pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email address not found.']);
        }

        // Tentukan broker berdasarkan peran pengguna
        $broker = $user->role === 'admin' ? 'admins' : 'users';

        $status = Password::broker($broker)->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
