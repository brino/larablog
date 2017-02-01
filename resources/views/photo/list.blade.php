<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/16/16
 * Time: 5:56 PM
 */
?>

<div class="columns">
    @foreach($photos as $photo)
        @if($loop->index % 4 == 0)
            <div class="column">
        @endif
        <div class="container">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-image">
                    <figure class="image is-square">
                        <a href="{{ route('photo',[$photo->slug]) }}">
                            <img class="image" src="@if(str_contains($photo->url,'placehold.it')){{ $photo->url }}@else{{ asset('storage/'.$photo->url) }}@endif" />
                        </a>
                    </figure>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h5 class="title"><a href="{{ route('photo',[$photo->slug]) }}">{{ str_limit($photo->title,25) }}</a></h5>
                    </div>
                    <nav class="level">
                        <div class="level-left photo-signature">
                            <small>@include('partials.signature',['thing'=>$photo])</small>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        @if($loop->index % 4 == 3)
            </div>
        @endif
    @endforeach
</div>

