<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @if(Auth::check())
</head>

<body class="antialiased">
<header class="header">
    <div class="container">
        <a href="javascript:history.back()" class="back-arrow">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1> {{ $groupName }}</h1>
        <div class="nav-links">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</header>

<main class="main-content">
    <div class="group-card">
        <a href="{{ route('group.updates', ['group_id' => $groupId, 'group_name' => $groupName]) }}">updates</a>
    </div>
    <div class="group-card">
        <a href="{{ route('group.visit', ['group_id' => $groupId, 'group_name' => $groupName]) }}">visits</a>
    </div>
    <div class="group-card">
        <a href="{{ route('group.members', ['group_id' => $groupId, 'group_name' => $groupName]) }}">Members</a>
    </div>
</main>

</body>
@endif
</html>
