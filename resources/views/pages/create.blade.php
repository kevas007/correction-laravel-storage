@extends('layouts.index')

@section('content')
<section>
    <form action="/store" enctype="multipart/form-data"  method="post">
        @csrf
        <input type="file" name="img" id="">
        <input type="submit">
    </form>

</section>

@endsection
