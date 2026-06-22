<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIPES - Sistem Informasi Pesantren</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body{
            margin:0;
            font-family:Arial, sans-serif;
            background:#f4f6f9;
        }

        .sidebar{
            position:fixed;
            left:0;
            top:0;
            width:250px;
            height:100%;
            background:#198754;
            color:white;
            padding-top:20px;
        }

        .logo{
            text-align:center;
            margin-bottom:30px;
        }

        .logo img{
            width:80px;
            height:80px;
            border-radius:50%;
            background:white;
            padding:5px;
        }

        .logo h3{
            margin-top:10px;
            font-size:18px;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:15px 25px;
            transition:0.3s;
        }

        .sidebar a:hover{
            background:#146c43;
        }

        .content{
            margin-left:250px;
            padding:25px;
        }

        .logout-btn{
            width:100%;
            border:none;
            background:#dc3545;
            color:white;
            padding:12px;
            cursor:pointer;
        }

        .logout-btn:hover{
            background:#bb2d3b;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">

        <div class="logo">

            <!-- Ganti dengan logo pesantren -->
            <img src="{{ asset('images/sipes.jpg.jpg') }}" alt="Logo SIPES">

            <h3>SIPES</h3>

            <small>Sistem Informasi Pesantren</small>

        </div>

        <a href="{{ url('/dashboard') }}">
            <i class="fas fa-home"></i> Dashboard
        </a>

        <a href="#">
            <i class="fas fa-user-graduate"></i> Data Santri
        </a>

        <a href="#">
            <i class="fas fa-chalkboard-teacher"></i> Data Ustadz
        </a>

        <a href="#">
            <i class="fas fa-calendar"></i> Jadwal Kegiatan
        </a>

        <a href="#">
            <i class="fas fa-file-alt"></i> Laporan
        </a>

        <a href="{{ route('keuangan.index') }}">
            <i class="fas fa-money-bill-wave"></i> Keuangan
        </a>

        <div style="position:absolute;bottom:20px;width:100%;padding:0 20px;">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>

        </div>

    </div>

    <!-- Konten -->
    <div class="content">
        @yield('content')
    </div>

</body>
</html>
