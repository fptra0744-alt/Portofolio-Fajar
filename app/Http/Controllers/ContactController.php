<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'nama'   => 'required|string|max:100',
            'email'  => 'required|email',
            'subjek' => 'required|string|max:150',
            'pesan'  => 'required|string|max:2000',
        ]);

        // Data buat email
        $data = $validated;
        $recipient = 'fptra0744@gmail.com';

        // Kirim email SETELAH response dikirim ke user
        // User gak nunggu email terkirim
        register_shutdown_function(function() use ($data, $recipient) {
            try {
                Mail::to($recipient)->send(new ContactMail($data));
            } catch (\Exception $e) {
                \Log::error('Email send failed: ' . $e->getMessage());
            }
        });

        // Response cepet — user langsung lihat pesan hijau
        return back()->with('success', 'Pesan kamu berhasil dikirim! Saya akan balas secepatnya.');
    }
}