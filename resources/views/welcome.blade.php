<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <section class="flex items-center justify-center min-h-screen">
        <article class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Register</h1>
            <section class="links flex justify-center space-x-4">
                <a href="{{ route('register') }}" class="btn px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Register</a>
                <a href="{{ route('login') }}" class="btn px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Login</a>
            </section>
        </article>
    </section>

</body>
</html>
