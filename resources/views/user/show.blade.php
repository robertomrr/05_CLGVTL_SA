<!-- resources/views/user/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.3/tailwind.min.css">
</head>
<body>
    <div class="container mx-auto mt-5">
        <h2 class="text-2xl mb-4">User Details</h2>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">ID</label>
                <p class="text-gray-700 text-base">{{ $user->id }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <p class="text-gray-700 text-base">{{ $user->name }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <p class="text-gray-700 text-base">{{ $user->email }}</p>
            </div>
            <div class="mb-4">
                <a href="{{ route('user.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to User List</a>
            </div>
        </div>
    </div>
</body>
</html>
