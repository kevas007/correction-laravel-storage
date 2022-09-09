@extends('layouts.index')

@section('content')
<a href="/create">Add </a>
@foreach ($photos as $photo)

@if (pathinfo($photo->src)['extension']=='png' )
<img width="50%" src="{{ asset('storage/img/'.$photo->src) }}" alt="">


<form action="/delete/{{ $photo->id }}" method="post">
@csrf
@method('DELETE')
    <button>
        Delete
    </button>
</form>

@endif
@if (pathinfo($photo->src)['extension'] != "png" )
<p>
    Pas un file
</p>

<form action="/delete/{{ $photo->id }}" method="post">
    @csrf
    @method('DELETE')
        <button>
            Delete
        </button>
    </form>
@endif

@endforeach

@endsection
