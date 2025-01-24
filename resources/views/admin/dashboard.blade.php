@extends('layouts.admin')

@section('content')
    <h1 class="h2 m-0 text-center text-md-start">
        @php
            $dat = new DateTime('now', new DateTimeZone('America/New_York'));
            $date = $dat->format('H');
            if($date < 12)
              echo "Good morning";
            else if($date < 17)
              echo "Good afternoon";
            else if($date<20)
              echo "Good evening";
        @endphp,
        {{ auth()->user()->name }}!
    </h1>
@endsection
