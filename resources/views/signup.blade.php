<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Signup</h2>
        <div class="flex justify-center mb-6">
            <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 48 48" aria-hidden="true">
                <circle cx="24" cy="16" r="8" stroke="currentColor" stroke-width="2" fill="none"/>
                <path d="M8 40c0-6.627 7.163-12 16-12s16 5.373 16 12" stroke="currentColor" stroke-width="2" fill="none"/>
            </svg>
        </div>
        <div class="flex justify-center mb-6"></div>
        <form action="{{ route('signup') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="fullnames" class="block text-gray-700 font-medium mb-1">Full Names:</label>
                <input type="text" id="fullnames" name="fullnames" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="gender" class="block text-gray-700 font-medium mb-1">Gender:</label>
                <select id="gender" name="gender" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div>
                <label for="dob" class="block text-gray-700 font-medium mb-1">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="country" class="block text-gray-700 font-medium mb-1">Country:</label>
                <select id="country" name="country" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" onchange="toggleOtherCountry(this)">
                    <option value="">Choose Country</option>
                    <option value="USA">USA</option>
                    <option value="UK">UK</option>
                    <option value="Canada">Canada</option>
                    <option value="Australia">Australia</option>
                    <option value="other">Other</option>
                </select>
                <input type="text" id="other_country" name="other_country" placeholder="Please specify your country" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 mt-2 hidden">
            </div>
            <script>
                function toggleOtherCountry(select) {
                    var otherInput = document.getElementById('other_country');
                    if (select.value === 'other') {
                        otherInput.classList.remove('hidden');
                        otherInput.required = true;
                    } else {
                        otherInput.classList.add('hidden');
                        otherInput.required = false;
                        otherInput.value = '';
                    }
                }
            </script>

            <div>
                <label for="email" class="block text-gray-700 font-medium mb-1">Email Address:</label>
                <input type="email" id="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="phone" class="block text-gray-700 font-medium mb-1">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-medium mb-1">Enter Password:</label>
                <input type="password" id="password" name="password" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-1">Repeat Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition font-semibold">Sign Up</button>
            <div class="text-center mt-4">
                <span class="text-gray-600">Already have an account?</span>
                <a href="{{ route('signIn') }}" class="text-blue-600 hover:underline font-semibold ml-1">Sign In</a>
            </div>
        </form>
    </div>
</body>
</html>