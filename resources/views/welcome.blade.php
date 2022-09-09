@extends('layouts.index')

@section('content')
<a href="/create">Add </a>
@foreach ($photos as $photo)

@if (pathinfo($photo->src)['extension']=='png' )
<img src="{{ asset('storage/img/'.$photo->src) }}" alt="">
@endif
@if (pathinfo($photo->src)['extension'] != "png" )
<p>
    Pas un file
</p>
@endif

@endforeach

@endsection
