<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AboutBlog;
use App\Models\Employee;
use App\Models\ContactSetting;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'blogs' => AboutBlog::latest()->get(),
            'employees' => Employee::latest()->get(),
            'setting' => ContactSetting::first(),
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        if ($request->filled('name')) $user->name = $request->name;
        if ($request->filled('email')) $user->email = $request->email;
        if ($request->filled('password')) $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('ok', 'Profile updated');
    }

    public function storeBlog(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'image' => 'nullable|image|max:10240',
        ]);
        $data = $request->only('title', 'text');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blogs', 'public');
            $data['image'] = $path;
        }
        AboutBlog::create($data);
        return back()->with('ok', 'Blog added');
    }

    public function destroyBlog($id)
    {
        AboutBlog::destroy($id);
        return back()->with('ok', 'Blog removed');
    }

    public function storeEmployee(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'image' => 'nullable|image|max:10240',
        ]);
        $data = $request->only('title', 'text');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('employees', 'public');
            $data['image'] = $path;
        }
        Employee::create($data);
        return back()->with('ok', 'Employee added');
    }

    public function destroyEmployee($id)
    {
        Employee::destroy($id);
        return back()->with('ok', 'Employee removed');
    }

    public function updateContact(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string',
            'instagram' => 'nullable|string',
            'telegram' => 'nullable|string',
        ]);
        $s = ContactSetting::firstOrNew();
        $s->fill($request->only('phone', 'instagram', 'telegram'));
        $s->save();
        return back()->with('ok', 'Contact updated');
    }
}
