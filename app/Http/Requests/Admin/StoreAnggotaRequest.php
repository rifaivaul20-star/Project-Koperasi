<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnggotaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            
            'nomor_anggota' => ['nullable', 'string', 'max:50', 'unique:anggota,nomor_anggota'],
            
            'nama_lengkap'  => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users,email'], 
            'no_hp'         => ['nullable', 'string', 'max:20'],
            'alamat'        => ['nullable', 'string'],
        ];
    }
}
