<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/17/16
 * Time: 6:23 AM
 */
?>
<nav class="panel">
    <p class="panel-heading">
        <span class="icon"><i class="fa fa-filter"></i></span>
        Categories
    </p>
    @foreach($categories as $category)
        <a href="{!! route('articles',[$filterCategory->slug==$category->slug?null:$category->slug,'query'=>request('query'),'tags'=>request('tags')]) !!}" class="panel-block @if($category->slug == $filterCategory->slug){{'is-active'}}@endif">
            @if($filterCategory->slug==$category->slug)
                <span class="delete is-small"></span>
            @endif
            {{ $category->name }}
            <span class="tag pull-right">{{ $category->articles->count() }}</span>
        </a>
    @endforeach
</nav>
