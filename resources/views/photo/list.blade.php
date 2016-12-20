<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/16/16
 * Time: 5:56 PM
 */
?>

<div class="column">
    <div class="container">
        @foreach($photos as $photo)
            @if($photo->id % 4 == 1)
                <div class="card is-fullwidth" style="margin-bottom: 20px;">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <a href="{{ route('photo',[$photo->slug]) }}">
                                <img class="image" src="{{ asset('storage/'.$photo->url) }}" />
                            </a>
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <h5 class="title"><a href="{{ route('photo',[$photo->slug]) }}">{{ $photo->title }}</a></h5>
                        </div>
                        <nav class="level">
                            <div class="level-left">
                                <small>@include('partials.signature',['thing'=>$photo])</small>
                            </div>
                        </nav>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
<div class="column">
    <div class="container">
        @foreach($photos as $photo)
            @if($photo->id % 4 == 2)
                <div class="card is-fullwidth" style="margin-bottom: 20px;">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <a href="{{ route('photo',[$photo->slug]) }}">
                                <img class="image" src="{{ asset('storage/'.$photo->url) }}" />
                            </a>
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <h5 class="title"><a href="{{ route('photo',[$photo->slug]) }}">{{ $photo->title }}</a></h5>
                        </div>
                        <nav class="level">
                            <div class="level-left">
                                <small>@include('partials.signature',['thing'=>$photo])</small>
                            </div>
                        </nav>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
<div class="column">
    <div class="container">
        @foreach($photos as $photo)
            @if($photo->id % 4 == 3)
                <div class="card is-fullwidth" style="margin-bottom: 20px;">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <a href="{{ route('photo',[$photo->slug]) }}">
                                <img class="image" src="{{ asset('storage/'.$photo->url) }}" />
                            </a>
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <h5 class="title"><a href="{{ route('photo',[$photo->slug]) }}">{{ $photo->title }}</a></h5>
                        </div>
                        <nav class="level">
                            <div class="level-left">
                                <small>@include('partials.signature',['thing'=>$photo])</small>
                            </div>
                        </nav>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
<div class="column">
    <div class="container">
        @foreach($photos as $photo)
            @if($photo->id % 4 == 0)
                <div class="card is-fullwidth" style="margin-bottom: 20px;">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <a href="{{ route('photo',[$photo->slug]) }}">
                                <img class="image" src="{{ asset('storage/'.$photo->url) }}" />
                            </a>
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <h5 class="title"><a href="{{ route('photo',[$photo->slug]) }}">{{ $photo->title }}</a></h5>
                        </div>
                        <nav class="level">
                            <div class="level-left">
                                <small>@include('partials.signature',['thing'=>$photo])</small>
                            </div>
                        </nav>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

