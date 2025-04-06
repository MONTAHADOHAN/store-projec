<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Online Store') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #2E1A47;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }
        .welcome-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .welcome-card {
            background-color: #3C2569;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 25px rgba(255, 255, 255, 0.05);
        }
        .welcome-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .welcome-text h1 {
            font-size: 2.2rem;
            font-weight: bold;
        }
        .welcome-text p {
            font-size: 1.1rem;
            margin-bottom: 25px;
            color: #EDEDED;
        }
        @media (max-width: 768px) {
            .welcome-image {
                height: 250px;
            }
        }
    </style>
</head>
<body>

<div class="container welcome-container">
    <div class="row g-0 welcome-card w-100" style="max-width: 960px;">
        
        <!-- Left: Image -->
        <div class="col-md-6">
            <img src="{{ asset('storage/images/welcome.jpg') }}" alt="Welcome Image" class="welcome-image">
        </div>

        <!-- Right: Text -->
        <div class="col-md-6 d-flex align-items-center justify-content-center p-4">
            <div class="welcome-text text-center">
                <h1>Welcome to Our Store</h1>
                <p>Your destination for smart and stylish shopping.</p>
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2" >Log In</a>
                <a href="{{ route('register') }}" class="btn btn-light" >Register</a>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
