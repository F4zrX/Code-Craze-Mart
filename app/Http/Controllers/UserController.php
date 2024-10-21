<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; 

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }
    
    public function proses(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'repass' => 'required|same:password', // Menambahkan validasi untuk confirm password
        ], [
            'repass.same' => 'Password confirmation does not match password.', // Menampilkan pesan error khusus
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1,
        ]);
        
        event(new Registered($user));
        
        Session::flash('success', 'Akun berhasil dibuat. Silakan cek email untuk verifikasi.');
        
        return redirect('login');
    }
    
    public function login()
    {
        $successMessage = Session::get('success');
        return view('login', compact('successMessage'));
    }
    
    public function prosesL(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role->name == 'admin') {
                return redirect()->route('game.index');
            } else {
                return redirect()->route('landing.index');
            }
        }
    
        return redirect()->back()->with('error', 'Email atau password salah.');
    }

    public function verify(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('login')->with('success', 'Email sudah diverifikasi.');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->route('login')->with('success', 'Email berhasil diverifikasi.');
    }

    public function resendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('login');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Link verifikasi email telah dikirim ulang.');
    }

    public function validateUser(Request $request, User $user)
    {
        // Logika untuk validasi pengguna
        $user->is_validated = true; // Asumsikan ada kolom 'is_validated' di tabel pengguna
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Data pengguna berhasil divalidasi.');
    }
}

