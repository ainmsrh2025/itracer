<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Alumni</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; padding: 20px; }
        .container { max-width: 600px; margin: auto; }
        input, button { display: block; width: 100%; padding: 10px; margin-bottom: 10px; }
        img { max-width: 150px; display: block; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Profil Saya</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('alumni.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama:</label>
        <input type="text" name="name" value="{{ old('name', $alumni->name) }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $alumni->email) }}" required>

        <label>No Telefon:</label>
        <input type="text" name="phone" value="{{ old('phone', $alumni->phone) }}">

        <label>Alamat:</label>
        <input type="text" name="address" value="{{ old('address', $alumni->address) }}">

        <label>Pekerjaan:</label>
        <input type="text" name="job" value="{{ old('job', $alumni->job) }}">

        <label>Gambar Profil:</label>
        <input type="file" name="image">

        @if($alumni->image)
            <img src="{{ asset('storage/' . $alumni->image) }}" alt="Profil">
        @endif

        <button type="submit">Kemaskini</button>
    </form>
</div>

</body>
</html>

