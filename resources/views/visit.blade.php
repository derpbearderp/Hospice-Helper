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
        <h1>Visits: {{ $groupName }}</h1>
        <div class="nav-links">
            <a href="{{ route('visit.visits', ['group_id' => $groupId, 'group_name' => $groupName]) }}" class="new-group-link">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>
</header>

<table>
    <div class="main-content">
        @if($upcomingVisits->count() > 0)
            <h2>Visits yet to happen</h2>
            @foreach ($upcomingVisits as $visit)
                <div class="new-visit-card">
                    <em>Visit planned by: {{ $visit->visit_author }}</em>
                    <p>on: {{ $visit->visit_time }}</p>
                </div>
            @endforeach
        @else
            <p>No upcoming visits found.</p>
        @endif

        @if($pastVisits->count() > 0)
            <h2>Past visits</h2>
            @foreach ($pastVisits as $visit)
                <div class="new-visit-card">
                    <em>Visit planned by: {{ $visit->visit_author }}</em>
                    <p>on: {{ $visit->visit_time }}</p>
                </div>
            @endforeach
        @else
            <p>No past visits found.</p>
        @endif
    </div>
</table>

</body>
@endif
</html>
