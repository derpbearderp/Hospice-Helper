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
        <h1>Members: {{ $groupName }}</h1>
    </div>
</header>

<div class="main-content">
    <form method="POST" action="{{ route('addMember') }}" class="add-member-form">
        @csrf
        <input type="email" name="email" placeholder="Enter User Email" class="add-member-input">
        <input type="hidden" name="group_id" value="{{ $groupId }}">
        <button type="submit" class="add-member-button">Add Member</button>
    </form>
<h2>Medical Staff</h2>
<ul>
    @foreach($members as $member)
        @if($member->user->medical_staff)
            <li>{{ $member->user->name }}</li>
        @endif
    @endforeach
</ul>

<h2>Non-Medical Staff</h2>
<ul>
    @foreach($members as $member)
        @if(!$member->user->medical_staff)
            <li>{{ $member->user->name }}</li>
        @endif
    @endforeach
</ul>
</div>
</body>
@endif
</html>

