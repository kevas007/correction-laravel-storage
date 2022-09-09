@extends('layouts.index')

@section('content')
<section>

    <img width="25%" src="{{ asset('storage/img/'.$photo->src) }}" alt="">
    <form action="/store/{{$photo->id }}}"  enctype="multipart/form-data"  method="post">
        @csrf
        @method('PUT')
        <input type="file" name="img" id="">
        <input type="submit">
    </form>


</section>

@endsection
