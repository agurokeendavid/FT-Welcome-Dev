<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
    <title>FT-Welcome-Dev</title>
</head>
<body class="bg-gray-100 antialiased flex font-sans text-gray-900">
<form class="px-4 rounded mx-auto max-w-3xl w-full my-32 inputs space-y-6" method="POST" id="form">
    <div>
        <h1 class="text-4xl font-bold">Create Account</h1>
    </div>
    <div class="flex space-x-4">
        <div class="w-1/2">
            <label for="name">Name</label>
            <input
                class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                type="text"
                name="name"
                id="name"
                autofocus
                required
            />
        </div>
        <div class="w-1/2">
            <label for="email">Email Address</label>
            <input
                class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                type="text"
                name="email"
                id="email"
                autofocus
                required
            />
        </div>
    </div>
    <div>
        <label for="bio">Bio</label>
        <input
            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
            type="text"
            name="bio"
            id="bio"
            autofocus
            required
        />
    </div>
    <div class="text-right">
        <a href="index.html" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View Profile</a>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
<script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'api_actions.php?action=create',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: $('#form').serialize(),
                success: function(data) {
                    alert(data);
                },
                error: function() {
                    alert('Error creating account');
                }
            });
        });
    });
</script>
</body>
</html>