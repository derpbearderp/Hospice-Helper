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
        <h1>{{ $groupName }}</h1>

    </div>
</header>
<div class="main-content">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Create visit</h1>
            </div>

        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('visits.store') }}" method="POST">
        @csrf

        <input type="hidden" name="group_id" value="{{ $groupId }}">
        <input type="hidden" name="group_name" value="{{ $groupName }}">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="visit_time" class="col-md-4 col-form-label text-md-end">Time of your visit</label>
                    <input type="datetime-local" name="visit_time" class="form-control" id="visit_time">
                </div>
            </div>

            <div class="main-content">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" id="visit_author" name="visit_author" value="{{auth::user()->name}}" class="btn btn-primary">Submit</button>
                </div>
            </div>


        </div>

    </form>
</div>

@endif
