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

        @if($filterCategory->exists)
            within <strong>{{ $filterCategory->name }}</strong>
        @endif
    </small>
</div>

