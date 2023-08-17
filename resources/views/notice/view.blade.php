@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div id="imageSlideshow" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @for ($i = 0; $i < $pageNumber; $i++)
            <li data-target="#imageSlideshow" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
        @endfor
    </ol>
    <div class="carousel-inner">
        @for ($i = 1; $i <= $pageNumber; $i++)
            <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                <img src="{{ route('image.show', ['path' =>'notice' ,'filename' => 'page'.$i.'.jpg']) }}" alt="image{{$i}}">
            </div>
        @endfor
    </div>
    <a class="carousel-control-prev" href="#imageSlideshow" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#imageSlideshow" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<script>
    $(document).ready(function(){
        $('#imageSlideshow').carousel();
    });
</script>

@endsection