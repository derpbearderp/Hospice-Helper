<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @if(Auth::check())
</head>
<body class="antialiased">
<header class="header">
    <div class="container">
        <a href="javascript:history.back()" class="back-arrow">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1>Updates: {{ $groupName }}</h1>
        <div class="nav-links">
            <a href="{{ route('update.updates', ['group_id' => $groupId, 'group_name' => $groupName]) }}" class="new-group-link">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>
</header>

<div class="main-content">
    @if(isset($updates))
        @foreach ($updates as $update)
            <em>Update posted by: {{ $update->update_author }}</em>
            <em>on: {{ $update->created_at }}</em>

            <div class="new-update-card">
                <h2>{{ $update->update_name }}</h2>
                <p>{{ $update->update_description }}</p>
            </div>
        @endforeach
    @else
        <p class="alert-message">No updates found.</p>
    @endif
</div>

</body>
@endif
</html>
