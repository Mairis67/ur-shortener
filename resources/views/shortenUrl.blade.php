<!DOCTYPE html>
<html>
<head>
    <title class="mb-10">Url Shortener</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<div class="">
    <h1 class="font-medium leading-tight text-5xl mt-0 mb-2 text-blue-600 text-center">Url Shortener</h1>
    <div class="">
        <div class="">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('.post') }}">
                @csrf
                <div class="mb-6">
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="link" placeholder="Enter URL">
                    <div class="">
                        <button class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="submit">Generate Shorten Link
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="text-center text-green-800 mb-6 mt-6">

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Short Link
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Long Link
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($shortUrl as $row)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <a href="{{ route('shorten.link', $row->code) }}"
                               target="_blank">{{ route('shorten.link', $row->code) }}</a>
                        </td>
                        <td class="px-6 py-4">
                            {{ $row->link }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>
