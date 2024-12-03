<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_Mahasiswa;

class Data_MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mahasiswa = Data_Mahasiswa::paginate(2);
        // $mahasiswa = Data_Mahasiswa::all();
        return view("mahasiswa.index-mahasiswa", compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = Data_Mahasiswa::all();
        return view('mahasiswa.create-mahasiswa', compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'npm' => 'required|string|max:20',
            'name' => 'required|string|max:50',
            'prodi' => 'required|string|max:50',
        ]);

        // dd($request->all());

        // Create the mahasiswa with the validated data
        Data_Mahasiswa::create($validatedData);
        
        // Redirect to the mahasiswa list with a success message
        return redirect()->back()->with('success', 'Data Mahasiswa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Data_Mahasiswa::find($id);
        if ($mahasiswa){
            $mahasiswa->delete();
            return redirect()->route('mahasiswa-index')->with('success', 'Data Mahasiswa deleted successfully!');
        }
        return redirect()->route('mahasiswa-index')->with('error', 'Data Mahasiswa tidak ditemukan!');
    }
}
