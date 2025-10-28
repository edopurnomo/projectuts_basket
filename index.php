<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basketball Badboy</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #ff8c00, #003366);
            color: #fff;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        header {
            padding: 40px 20px;
        }

        header img {
            width: 120px;
            height: auto;
            animation: bounce 3s infinite ease-in-out;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        h1 {
            font-size: 2.5em;
            margin: 10px 0 0;
        }

        p {
            max-width: 700px;
            margin: 10px auto 30px;
            line-height: 1.6;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        a.button {
            background: #fff;
            color: #003366;
            padding: 12px 25px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
            transition: 0.3s;
        }

        a.button:hover {
            background: #ff8c00;
            color: #fff;
            transform: scale(1.05);
        }

        footer {
            margin-top: 60px;
            font-size: 0.9em;
            color: #ddd;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <header>
        <img src="logo.jpg" alt="Logo Basketball Badboy">
        <h1>🏀 Basketball Badboy Club</h1>
        <p>
            Selamat datang di website resmi <b>Basketball Badboy</b>!  
            Kami adalah komunitas mahasiswa yang mencintai olahraga basket
            tempat di mana semangat, disiplin, dan kerja tim menjadi kunci untuk berkembang bersama.  
            Mari bergabung dan jadilah bagian dari keluarga basket kampus kita!
        </p>

        <div class="btn-container">
            <a href="input_mhs.php" class="button">➕ Input Data Mahasiswa</a>
            <a href="list_mhs.php" class="button">📋 List Mahasiswa</a>
            <a href="cari_mhs.php" class="button">🔍 Cari Mahasiswa</a>
        </div>
    </header>

    <footer>
        &copy; 2025 Basketball Badboy Club | Made with ❤️ by Edo
    </footer>
</body>
</html>
