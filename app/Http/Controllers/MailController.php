<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Mail;
use App\Mail\MailSend;
use App\Models\Transaksi;
use App\Models\Cart;
use App\Models\Library; // Impor model Transaksi
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;// Import Str class

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Mendapatkan alamat email pengguna yang sudah login
        $email = Auth::user()->email;

        // Ambil ID pengguna yang sedang login
        $userId = Auth::user()->id; // Ambil ID pengguna yang login

        // Misalnya, Anda ingin mengambil data dari tabel Transaksi
        $carts = Cart::where('user_id', $userId)->get(); // Mengambil semua keranjang belanja pengguna

        // Memastikan keranjang tidak kosong
        if (!$carts->isEmpty()) {
            // Menginisialisasi array untuk menyimpan produk-produk yang akan ditampilkan dalam email
            $products = [];

            // Menginisialisasi total harga
            $totalPrice = 0;

            // Mendapatkan tanggal email dikirim
            $emailSentDate = now()->format('Y-m-d H:i:s');

            // Memproses setiap item dalam keranjang
            foreach ($carts as $cart) {
                // Mengambil data game dari relasi
                $game = $cart->game;

                // Menyiapkan data produk untuk ditampilkan dalam email
                $productData = [
                    'product_name' => $game->nama, // Mengambil nama produk dari relasi 'game'
                    'product_price' => $game->harga, // Mengambil harga produk dari relasi 'game'
                    'order_id' => uniqid(), // Menggunakan ID unik sebagai order_id
                    'order_date' => now()->formatLocalized('%d %B %Y %H:%M:%S'), // Mengambil tanggal pembelian saat ini
                    'email_sent_date' => $emailSentDate, // Tanggal email dikirim
                    'qty' => $cart->qty, // Mengambil jumlah barang yang dibeli
                ];

                // Hitung total harga setiap barang dengan mengalikan harga dengan jumlah
                $itemPrice = $game->harga * $cart->qty;
                $totalPrice += $itemPrice;

                // Tambahkan produk ke dalam array produk
                $products[] = $productData;
            }

            // Membuat random string
            $randomString = Str::random(20); // Ubah angka 20 sesuai dengan panjang string yang Anda inginkan

            // Data email yang akan dikirim
            $data = [
                'subject' => 'Terima kasih telah melakukan pembelian',
                'products' => $products,
                'total_price' => $totalPrice, // Total harga dari semua item di keranjang
            ];

            try {
                // Mengirim email
                Mail::to($email)->send(new MailSend($data, $randomString)); // Meneruskan $randomString ke MailSend

                // Mengambil game_ids dari carts
                $gameIds = $carts->pluck('game_id')->toArray();

                // Jika email berhasil dikirim, panggil fungsi moveToLibrary untuk memindahkan item ke perpustakaan dan hapus dari keranjang
                $this->moveToLibrary($request->merge(['game_ids' => $gameIds]));

                return response()->json(['message' => 'Email sent successfully']);
            } catch (Exception $th) {
                // Tangkap kesalahan dan kirim pesan kesalahan yang lebih deskriptif
                return response()->json(['message' => 'Error sending email: ' . $th->getMessage()], 500);
            }            
        } else {
            return response()->json(['message' => 'Cart is empty'], 404);
        }
    }

    public function moveToLibrary(Request $request)
    {
        $userId = Auth::id();
        $gameIds = $request->game_ids;

        foreach ($gameIds as $gameId) {
            $existingLibraryItem = Library::where('user_id', $userId)
                ->where('game_id', $gameId)
                ->first();

            if (!$existingLibraryItem) {
                Library::create([
                    'user_id' => $userId,
                    'game_id' => $gameId,
                ]);
            }
        }

        Cart::whereIn('game_id', $gameIds)->delete();

        return response()->json(['message' => 'Items moved to library successfully']);
    }


    public function forgetPasswordForm() {
        return view('forget-password');
    }
    
    public function sendResetLink(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    
        $token = sha1(time().$user->email);
    
        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => now()
        ]);
    
        Mail::to($user->email)->send(new ResetPasswordMail($user->name, $token));
    
        return redirect()->back()->with('status', 'Link Reset Password Telah Dikirim Ke Email Anda');
    }
    
    public function resetPasswordForm($token) {
        $reset = DB::table('password_resets')->where('token', $token)->first();
    
        if (!$reset) {
            abort(404);
        }
    
        return view('reset-password', compact('token'));
    }
    
    public function resetPassword(Request $request) {
        $request->validate([
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);
    
        $reset = DB::table('password_resets')
                    ->where('token', $request->token)
                    ->first();
    
        if (!$reset) {
            return redirect()->back()->with('error', 'Token reset password tidak valid.');
        }
    
        $user = User::where('email', $reset->email)->first();
    
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }
    
        $user->password = Hash::make($request->password);
        $user->save();
    
        DB::table('password_resets')->where('email', $user->email)->delete();
    
        return redirect()->route('login')->with('success', 'Password berhasil direset.');
    }
}
