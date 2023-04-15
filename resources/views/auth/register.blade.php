<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    @vite('resources/css/app.css')

    <style>
        /* Set full height for body and html */
        body, html {
            height: 100%;
        }
        /* Set background image and size */
        .bg-image {
            background-image: url('/img/bg-img.jpeg');
            background-size: cover;
            background-position: center;
        }
        /* Center form on page */
        .form-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="bg-image h-screen">
        <div class="form-center">
            <form class="bg-white rounded-lg p-8 shadow-md  w-full m-2 sm:w-96" method="POST" action="/register">
                @csrf
                <h2 class="text-gray-800 text-2xl font-semibold">Register</h2>
                <div class="mt-4">
                    <label class="block text-gray-700 font-semibold">Name</label>
                    <input type="text" name="name" class="form-input mt-1 block w-full rounded-md border-gray-300" placeholder="Enter your name">
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700 font-semibold">Email</label>
                    <input type="text" name="email" class="form-input mt-1 block w-full rounded-md border-gray-300" placeholder="Enter your Email">
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700 font-semibold">Password</label>
                    <input type="password" name="password" class="form-input mt-1 block w-full rounded-md border-gray-300" placeholder="password">
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700 font-semibold">Password confirmation</label>
                    <input type="password" name="password_confirmation" class="form-input mt-1 block w-full rounded-md border-gray-300" placeholder="password-confirmation">
                </div>
                <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">Register</button>
                <a href="/login" class="mt-4 text-gray-500 font-semibold py-2 px-4 rounded-md">Login</a>

            </form>
        </div>
    </div>
</body>
</html>
