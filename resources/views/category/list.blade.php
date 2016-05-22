<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/17/16
 * Time: 6:23 AM
 */
?>
<h3><span class="fa fa-th-list"></span> Categories</h3>
<div class="list-group">
    @foreach($categories as $category)

        <a
            @if(!empty($category->count))
                href="{{ route('articles',['category'=>$category->id,'search'=>$search->get('string'),'page'=>$page]) }}"
            @else
                href="{{ route('category',[$category->slug]) }}"
            @endif
            class="category list-group-item @if($category->id == $categoryFilterID){{ ' active' }}@endif"
        >
            {{ $category->name }}

            @if(!empty($category->count))
                <span class="badge">{{ $category->count }}</span>
            @elseif($category->id == $categoryFilterID)
                <span class="badge">{{ $search->get('hits') }}</span>
            @endif

        </a>

    @endforeach
</div>
