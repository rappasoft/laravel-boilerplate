<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel 8 Livewire Charts</title>

    <link href="http://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <livewire:styles />
</head>
<body class="bg-gray-200 p-8">

<livewire:livewire-charts/>

<livewire:scripts />

<script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

<script src="http://cdn.jsdelivr.net/npm/apexcharts"></script>

</body>
</html>
