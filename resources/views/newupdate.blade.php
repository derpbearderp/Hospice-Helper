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
                    <h1>Create update</h1>
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


    <div class="main-content">
        <form action="{{ route('updates.store') }}" method="POST">
            @csrf

            <input type="hidden" name="group_id" value="{{ $groupId }}">
            <input type="hidden" name="group_name" value="{{ $groupName }}">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="group_name" class="col-md-4 col-form-label text-md-end">Update name</label>
                        <input type="update_name" name="update_name" class="form-control">
                    </div>
                </div>
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="group_name" class="col-md-4 col-form-label text-md-end">Update text</label>
                        <textarea class="form-control" style="height:150px" name="update_description" ></textarea>
                    </div>

                </div>
<br>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="for_medstaff_only" id="for_medstaff_only" value="1" {{ old('medical_staff') ? 'checked' : '' }}>
                        <label class="form-check-label" for="for_medstaff_only">
                            This post should only be able to be seen by medical staff
                        </label>
                    </div>
                </div>
<br>
                <div class="main-content">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" id="update_author" name="update_author" value="{{auth::user()->name}}" class="btn btn-primary">Submit</button>
                </div>
                </div>

            </div>

        </form>
    </div>

</div>
@endif

