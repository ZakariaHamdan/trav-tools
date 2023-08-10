<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-400 flex justify-center items-center h-screen">
<form action="{{ route('troops.update', $troop->id) }}" method="post" class="bg-white p-6 rounded-lg">
    @csrf
    @method('PATCH')
    <div class="mb-4">
        <label for="name" class="block mb-2">Name:</label>
        <input type="text" id="name" name="name" class="border p-2 rounded-md w-full" value="{{ $troop->name }}">
    </div>
    <div class="mb-4">
        <label for="tribe" class="block mb-2">Tribe:</label>
        <input id="tribe" name="tribe" class="border p-2 rounded-md w-full" value="{{ $troop->tribe }}">
    </div>
    <div class="mb-4">
        <label for="lumber" class="block mb-2">Lumber:</label>
        <input id="lumber" name="lumber" class="border p-2 rounded-md w-full" value="{{ $troop->lumber }}">
    </div>
    <div class="mb-4">
        <label for="clay" class="block mb-2">Clay:</label>
        <input id="clay" name="clay" class="border p-2 rounded-md w-full" value="{{ $troop->clay }}">
    </div>
    <div class="mb-4">
        <label for="iron" class="block mb-2">Iron:</label>
        <input id="iron" name="iron" class="border p-2 rounded-md w-full" value="{{ $troop->iron }}">
    </div>
    <div class="mb-4">
        <label for="crop" class="block mb-2">Crop:</label>
        <input id="crop" name="crop" class="border p-2 rounded-md w-full" value="{{ $troop->crop }}">
    </div>
    <div class="mb-4">
        <label for="train_time" class="block mb-2">Train Time:</label>
        <input id="train_time" name="train_time" class="border p-2 rounded-md w-full" value="{{ $troop->train_time }}">
    </div>
    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Submit</button>
</form>
</body>
</html>
