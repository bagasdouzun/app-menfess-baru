<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Mengambil semua data kontak dari database
        $contacts = Contact::all();

        // Mengirim data kontak ke view
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'link' => 'nullable|url',
        ]);

        Contact::create($validated);

        return redirect()->route('home')->with('success', 'Pengaduan berhasil dikirim.');
    }
}
