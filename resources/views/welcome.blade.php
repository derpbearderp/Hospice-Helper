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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @if(Auth::check())
</head>
<body class="antialiased">
<header class="header">
    <div class="container">
        <h1>Hospice Helper</h1>
        <div class="nav-links">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</header>

<main class="main-content">
    <div class="group-card new-group-button">
        <a href="{{ url('/newGroup') }}">
            <i class="fas fa-plus"></i> Make new group
        </a>
    </div>
    @foreach ($groups as $group)
        @if ($group->members()->where('user_id', auth()->id())->exists())
            <div class="group-card">
                <a href="{{ route('group.view', ['group_id' => $group->group_id, 'group_name' => $group->group_name]) }}">
                    {{ $group->group_name }}
                </a>
            </div>
        @endif
    @endforeach
    @endif
</main>

@guest
    <header class="header">
        <div class="container">
            <h1>Hospice Helper</h1>
            <div class="nav-links">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </div>
        </div>
    </header>
    <main class="main-content">
        <p class="alert-message">You are not logged in. Please login or register to view and create groups.</p>
    </main>
@endguest
</body>
</html>
