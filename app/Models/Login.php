<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class Login extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'password', 'tanggal_login'];

    public function create(array $data)
    {
        return Login::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'tanggal_login' => now(),
        ]);
    }
}
