<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl">
        <h2 class="text-2xl font-bold mb-6 text-center">Book Your Ticket</h2>
        <p class="mb-4 text-gray-700 text-center">Please help us to know your book type:</p>
        <form action="" method="post" class="space-y-6">
            <div class="flex justify-center space-x-8 mb-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="book_type" value="single" class="form-radio text-blue-600">
                    <span class="ml-2 text-gray-800">Single</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="book_type" value="people" class="form-radio text-blue-600">
                    <span class="ml-2 text-gray-800">People</span>
                </label>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <button type="button" name="East africans" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded transition">East Africans</button>
                <button type="button" name="Rwandans" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded transition">Rwandans</button>
                <button type="button" name="Foreign resident" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded transition">Foreign Resident</button>
                <button type="button" name="internationals" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 rounded transition">Internationals</button>
            </div>
            <div class="input-boxes">
                <label class="block mb-2 text-gray-700">Choose your ticket duration:</label>
                <select name="ticket_duration" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled>Select ticket type</option>
                    <option value="single" selected>Single day Ticket</option>
                    <option value="monthly">Monthly Ticket</option>
                </select>
                <label class="block mt-4 mb-2 text-gray-700">Select ticket type:</label>
                <select name="ticket_type" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled selected>Select type</option>
                    <option value="kid_only">Kid Only Ticket</option>
                    <option value="adult_only">Adult Only Ticket</option>
                    <option value="adult_with_kids">Adult with Kids Ticket</option>
                </select>
                <label class="block mt-4 mb-2 text-gray-700">Nationality:</label>
                <select id="nationality" name="nationality" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled selected>Select nationality</option>
                    <option value="rwandan">Rwandan</option>
                    <option value="other">Other</option>
                </select>
                <input 
                    type="text" 
                    id="other_country" 
                    name="other_country" 
                    class="form-input mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Please specify your country"
                    style="display:none;"
                >
                <script>
                    document.getElementById('nationality').addEventListener('change', function() {
                        var otherInput = document.getElementById('other_country');
                        if (this.value === 'other') {
                            otherInput.style.display = 'block';
                        } else {
                            otherInput.style.display = 'none';
                            otherInput.value = '';
                        }
                    });
                </script>
                <label class="block mt-4 mb-2 text-gray-700">Full Names:</label>
                <input 
                    type="text" 
                    name="fullname" 
                    class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Full Name" 
                    required
                >
                <label class="block mt-4 mb-2 text-gray-700">Email Address:</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Email Address" 
                    required
                >
                <label class="block mt-4 mb-2 text-gray-700">Phone Number:</label>
                <div class="flex">
                    <select 
                        name="country_code" 
                        class="form-select mt-1 block w-1/3 border-gray-300 rounded-l-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required
                    >
                        <option value="+250" selected>+250 (RW)</option>
                        <option value="+254">+254 (KE)</option>
                        <option value="+255">+255 (TZ)</option>
                        <option value="+256">+256 (UG)</option>
                        <option value="+257">+257 (BI)</option>
                        <option value="+211">+211 (SS)</option>
                        <option value="+1">+1 (US)</option>
                        <option value="+44">+44 (UK)</option>
                        <option value="+33">+33 (FR)</option>
                        <!-- Add more as needed -->
                    </select>
                    <input 
                        type="tel" 
                        name="phone" 
                        class="form-input mt-1 block w-2/3 border-gray-300 rounded-r-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Phone Number" 
                        required
                    >
                    
                </div>
                <div id="children-section" class="mt-6">
                    <button type="button" id="add-child-btn" class="w-full min-w-[200px] bg-purple-500 hover:bg-purple-600 text-white font-semibold py-2 px-6 rounded transition mb-4">
                        Add Children
                    </button>
                    <div id="children-inputs"></div>
                    <div id="children-list" class="mt-4"></div>
                </div>
                <script>
                    let childCount = 0;
                    document.getElementById('add-child-btn').className = "w-full min-w-[200px] bg-transparent hover:bg-gray-200 text-gray-700 font-semibold py-2 px-6 rounded transition mb-4 flex items-center justify-center border border-gray-300";
                    document.getElementById('add-child-btn').innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>Add Children`;

                    document.getElementById('add-child-btn').addEventListener('click', function() {
                        const childrenInputs = document.getElementById('children-inputs');
                        const childDiv = document.createElement('div');
                        childDiv.className = "bg-gray-50 p-4 rounded mb-4 border";
                        childDiv.innerHTML = `
                            <label class="block mb-2 text-gray-700">Child Name:</label>
                            <input type="text" name="children[${childCount}][name]" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm mb-2" placeholder="Child Name" required>
                            <label class="block mb-2 text-gray-700">Child Nationality:</label>
                            <input type="text" name="children[${childCount}][nationality]" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm mb-2" placeholder="Nationality" required>
                            <label class="block mb-2 text-gray-700">Date of Birth:</label>
                            <input type="date" name="children[${childCount}][dob]" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm mb-2" required>
                            <button type="button" class="add-child-confirm bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded transition mt-2">Add Child</button>
                        `;
                        childrenInputs.appendChild(childDiv);

                        childDiv.querySelector('.add-child-confirm').addEventListener('click', function() {
                            const name = childDiv.querySelector(`input[name="children[${childCount}][name]"]`).value;
                            const nationality = childDiv.querySelector(`input[name="children[${childCount}][nationality]"]`).value;
                            const dob = childDiv.querySelector(`input[name="children[${childCount}][dob]"]`).value;
                            if(name && nationality && dob) {
                                // Add to children list display (name only)
                                const childrenList = document.getElementById('children-list');
                                const childInfo = document.createElement('div');
                                childInfo.className = "p-2 mb-2 bg-white rounded shadow";
                                childInfo.innerHTML = `<strong>${name}</strong>`;
                                childrenList.appendChild(childInfo);

                                // Keep hidden inputs for form submission
                                const hiddenInputs = document.createElement('div');
                                hiddenInputs.innerHTML = `
                                    <input type="hidden" name="children[${childCount}][name]" value="${name}">
                                    <input type="hidden" name="children[${childCount}][nationality]" value="${nationality}">
                                    <input type="hidden" name="children[${childCount}][dob]" value="${dob}">
                                `;
                                childrenList.appendChild(hiddenInputs);

                                childDiv.remove();
                                childCount++;
                            }
                        });
                    });
                </script>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-8 rounded transition">
                    Submit
                </button>
            </div>

        </form>
    </div>
</body>
</html>