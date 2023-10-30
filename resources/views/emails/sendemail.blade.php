<!DOCTYPE html>
<html>
<head>
    <title>PPW 2</title>
</head>
<body>
    <p>Selamat bergabung {{ $userData['name'] }}! di Clan Banteng Biru.</p>
    <p>Terima kasih telah mendaftar! Sekarang anda memiliki seluruh akses di clan ini. Simpan informasi dibawah ini jika sewaktu-waktu dibutuhkan:
    <ul>
        <li>Nama Pengguna: {{ $userData['name'] }}</li>
        <li>Alamat Email: {{ $userData['email'] }}</li>
    </ul>
    <p>Jangan beritahu informasi ini selain kepada tim Banteng Biru</p>
    <br>
    <br>
    <p>Seruduk,</p>
    <p>Banteng Biru</p>
</body>
</html>