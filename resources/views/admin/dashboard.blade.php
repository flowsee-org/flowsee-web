<!DOCTYPE html>
<html>
<head><title>Admin — Dashboard</title>
<style>
*{box-sizing:border-box;font-family:system-ui,-apple-system,sans-serif}
body{background:#0f0f1a;color:#eaeaea;margin:0;padding:2rem;max-width:1200px;margin:auto}
h1{margin-bottom:.2rem}
.subtitle{color:#aaa;margin-bottom:2rem}
.card{background:#181830;border:1px solid #2a2a40;border-radius:12px;padding:1.5rem;margin-bottom:1.5rem}
h2{font-size:1.1rem;margin-top:0;border-bottom:1px solid #333;padding-bottom:.5rem}
input,textarea{width:100%;padding:.6rem;border:1px solid #333;border-radius:6px;background:#0f0f1a;color:#eee;margin:.3rem 0;font-family:inherit}
button{padding:.6rem 1rem;background:#e94560;color:#fff;border:none;border-radius:6px;cursor:pointer}
button.secondary{background:#333}
button.small{padding:.3rem .6rem;font-size:.85rem}
table{width:100%;border-collapse:collapse;font-size:.9rem}
th,td{padding:.6rem;text-align:left;border-bottom:1px solid #2a2a40}
img{max-width:120px;border-radius:6px;border:1px solid #333}
.alert{background:#e9456030;color:#e94560;padding:.7rem;border-radius:6px;margin-bottom:1rem}
.grid-2{display:grid;grid-template-columns:1fr 1fr;gap:1.5rem}
@media(max-width:900px){.grid-2{grid-template-columns:1fr}}
.edit-form{display:none;margin-top:.5rem}
</style>
</head>
<body>
<h1>Admin Panel</h1>
<p class="subtitle">/wp-admin — change profile, manage blogs, works, employees, edit contact.</p>

@if(session('ok'))<div class="alert">{{session('ok')}}</div>@endif

<div class="grid-2">
<div class="card">
<h2>Profile</h2>
<form method="POST" action="/wp-admin/profile">@csrf
<p><input type="text" name="name" value="{{auth()->user()->name}}" placeholder="Name"></p>
<p><input type="email" name="email" value="{{auth()->user()->email}}" placeholder="Email"></p>
<p><input type="password" name="password" placeholder="New password (leave blank to keep)"></p>
<button>Save</button>
</form>
</div>
<div class="card">
<h2>Contact Info</h2>
<form method="POST" action="/wp-admin/contact">@csrf
<p><input type="text" name="phone" value="{{optional($setting)->phone}}" placeholder="Phone"></p>
<p><input type="text" name="instagram" value="{{optional($setting)->instagram}}" placeholder="Instagram handle"></p>
<p><input type="text" name="telegram" value="{{optional($setting)->telegram}}" placeholder="Telegram ID/number"></p>
<button>Save Contact</button>
</form>
</div>
</div>

<div class="card">
<h2>About Us — Blogs</h2>
<form method="POST" action="/wp-admin/blogs" enctype="multipart/form-data">@csrf
<p><input type="text" name="title" placeholder="Title" required></p>
<p><textarea name="text" rows="3" placeholder="Text" required></textarea></p>
<p><input type="file" name="image" accept="image/*"></p>
<button>Add Blog</button>
</form>
<table>
<thead><tr><th>Title</th><th>Image</th><th>Actions</th></tr></thead>
<tbody>
@forelse($blogs as $b)
<tr>
<td>{{Str::limit($b->title,40)}}</td>
<td>@if($b->image)<img src="/storage/{{$b->image}}">@endif</td>
<td>
<form method="POST" action="/wp-admin/blogs/{{$b->id}}" style="display:inline">@csrf @method('PUT') <input type="text" name="title" value="{{ $b->title }}" required placeholder="Title" style="padding:.3rem;width:120px"> <textarea name="text" rows="1" required placeholder="Text" style="padding:.3rem;width:120px">{{ $b->text }}</textarea> <input type="file" name="image" accept="image/*" style="margin-top:.2rem"> <button class="small">Update</button></form>
<form method="POST" action="/wp-admin/blogs/{{$b->id}}" style="display:inline">@csrf @method('DELETE') <button class="secondary small" onclick="return confirm('Delete?')">Delete</button></form>
</td>
</tr>
@empty<tr><td colspan="3">No blogs yet.</td></tr>
@endforelse
</tbody>
</table>
</div>

<div class="card">
<h2>Works</h2>
<form method="POST" action="/wp-admin/works" enctype="multipart/form-data">@csrf
<p><input type="text" name="title" placeholder="Title" required></p>
<p><textarea name="text" rows="3" placeholder="Text" required></textarea></p>
<p><input type="file" name="image" accept="image/*"></p>
<button>Add Work</button>
</form>
<table>
<thead><tr><th>Title</th><th>Image</th><th>Actions</th></tr></thead>
<tbody>
@forelse($works as $w)
<tr>
<td>{{Str::limit($w->title,40)}}</td>
<td>@if($w->image)<img src="/storage/{{$w->image}}">@endif</td>
<td>
<form method="POST" action="/wp-admin/works/{{$w->id}}" style="display:inline">@csrf @method('PUT') <input type="text" name="title" value="{{ $w->title }}" required placeholder="Title" style="padding:.3rem;width:120px"> <textarea name="text" rows="1" required placeholder="Text" style="padding:.3rem;width:120px">{{ $w->text }}</textarea> <input type="file" name="image" accept="image/*" style="margin-top:.2rem"> <button class="small">Update</button></form>
<form method="POST" action="/wp-admin/works/{{$w->id}}" style="display:inline">@csrf @method('DELETE') <button class="secondary small" onclick="return confirm('Delete?')">Delete</button></form>
</td>
</tr>
@empty<tr><td colspan="3">No works yet.</td></tr>
@endforelse
</tbody>
</table>
</div>

<div class="card">
<h2>Employees</h2>
<form method="POST" action="/wp-admin/employees" enctype="multipart/form-data">@csrf
<p><input type="text" name="title" placeholder="Name / Title" required></p>
<p><textarea name="text" rows="2" placeholder="Bio / Description" required></textarea></p>
<p><input type="file" name="image" accept="image/*"></p>
<button>Add Employee</button>
</form>
<table>
<thead><tr><th>Title</th><th>Image</th><th>Actions</th></tr></thead>
<tbody>
@forelse($employees as $e)
<tr>
<td>{{Str::limit($e->title,40)}}</td>
<td>@if($e->image)<img src="/storage/{{$e->image}}">@endif</td>
<td>
<form method="POST" action="/wp-admin/employees/{{$e->id}}" style="display:inline">@csrf @method('PUT') <input type="text" name="title" value="{{ $e->title }}" required placeholder="Title" style="padding:.3rem;width:120px"> <textarea name="text" rows="1" required placeholder="Text" style="padding:.3rem;width:120px">{{ $e->text }}</textarea> <input type="file" name="image" accept="image/*" style="margin-top:.2rem"> <button class="small">Update</button></form>
<form method="POST" action="/wp-admin/employees/{{$e->id}}" style="display:inline">@csrf @method('DELETE') <button class="secondary small" onclick="return confirm('Delete?')">Delete</button></form>
</td>
</tr>
@empty<tr><td colspan="3">No employees yet.</td></tr>
@endforelse
</tbody>
</table>
</div>

<p style="color:#777;font-size:.85rem">Login: admin@flowsee.local / ChangeMe1! — change password after first login.</p>
</body>
</html>
