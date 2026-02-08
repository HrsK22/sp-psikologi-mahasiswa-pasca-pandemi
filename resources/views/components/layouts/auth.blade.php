@props(['title'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('assets/images/logo/logo-umc.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">


</head>
<body>
    <!-- =============================================== -->
    <!-- MAIN CONTENT AREA                                 -->
    <!-- =============================================== -->
    <div class="card auth-card">
        {{ $slot }}
    </div>

    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if($message = Session::get('info'))
    <script>
        Swal.fire({
            title: "{{ $message }}",
            icon: "info", // Ganti ikon menjadi "info"
            showConfirmButton: false,
            timer: 3000, // Mungkin perlu waktu lebih lama agar user bisa membaca
            background: '#ffffff',
        }); 
    </script>
    @endif
</body>
</html>
