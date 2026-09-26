<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

return new class extends Migration {
    public function up(): void
    {
        if (!User::where('email', 'admin@flowsee.local')->first()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@flowsee.local',
                'password' => Hash::make('ChangeMe1!'),
            ]);
        }
    }
    public function down(): void
    {
        User::where('email', 'admin@flowsee.local')->delete();
    }
};
