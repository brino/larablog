<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/16/16
 * Time: 5:56 PM
 */
?>

@foreach($photos as $photo)
        <div class="col-xs-3">
            <div class="photo-list">
                <a href="{{ route('photo',[$photo->slug]) }}">
                    <img class="img-responsive img-thumbnail" src="{{ asset('storage/'.$photo->url) }}" />
                </a>
            </div>
            <h4 class="article-title"><a href="{{ route('photo',[$photo->slug]) }}">{{ $photo->title }}</a> </h4>
            <div class="text-muted">
                <small>
                    @include('partials.signature',['thing'=>$photo])
                </small>
            </div>
        </div>
@endforeach

