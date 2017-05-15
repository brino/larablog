<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 9/11/16
 * Time: 6:43 PM
 */
?>

<div class="subtitle">
    <small>
        @unless(empty(request('query')))
            Found
        @else
            Listing
        @endunless

        <strong>
            @if(method_exists($articles,'total'))
            {{ $articles->total() }}
            @else
            {{ $articles->count() }}
            @endif

            Articles
        </strong>

        @unless(empty(request('query')))
            matching <strong>{{ request('query') }}</strong>
        @endunless

        @if($category->exists)
            within <strong>{{ $category->name }}</strong>
        @endif

        @if(request()->has('tags'))
            matching tag(s):
            @foreach(request('tags') as $tag)
                <strong>{{ $tag }}</strong>
            @endforeach
        @endif
    </small>
</div>

