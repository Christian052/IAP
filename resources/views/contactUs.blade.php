<!DOCTYPE html>
<html>
<head>
    <title>Report Problem - Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Report Problem</h1>
        <form method="POST" action="{{ route('contactUs') }}" class="space-y-5">
            @csrf
            <div>
                <label for="name" class="block font-semibold text-gray-700 mb-1">Your Name</label>
                <input type="text" id="name" name="name" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="email" class="block font-semibold text-gray-700 mb-1">Your Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="problem" class="block font-semibold text-gray-700 mb-1">Your Problem</label>
                <textarea id="problem" name="problem" rows="5" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
            </div>
            <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">Submit</button>
        </form>
    </div>
</body>
</html>
