<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    @vite('resources/js/app.js')
    @inertiaHead
    @routes
</head>

<body class="bg-slate-100 text-slate-900 dark:bg-slate-700 dark:text-white">
    @inertia
</body>

</html>
