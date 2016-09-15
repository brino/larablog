<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/17/16
 * Time: 6:23 AM
 */
?>
<h3><span class="fa fa-filter"></span> Categories</h3>
<div class="list-group">

    @foreach($categories as $category)

        <a href="{{ route('articles',[$filterCategory->slug==$category->slug?null:$category->slug,'query'=>request('query')]) }}" class="category list-group-item @if(isset($filterCategory)) @if($category->slug == $filterCategory->slug){{'active'}}@endif @endif">

            {{ $category->name }}

            <span class="badge">{{ $category->count }}</span>

        </a>

    @endforeach
</div>
