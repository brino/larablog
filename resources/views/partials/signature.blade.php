<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/17/16
 * Time: 11:28 AM
 */
?>
@if(!empty($article))
@can('update-article',$article)<a href="{{ route('admin.article.edit',[$article]) }}">@endcan<i class="fa fa-pencil"></i>@can('update-article',$article)</a>@endcan
@endif

@if(!empty($photo))
@can('update-photo',$photo)<a href="{{ route('admin.photo.edit',[$photo]) }}">@endcan<i class="fa fa-camera"></i>@can('update-article',$photo)</a>@endcan
@endif

<a href="#">{{ $thing->user->name }}</a>
{{--{{ dd($thing->published_at) }}--}}
@if(isset($thing->published_at))
    <span
    @if($thing->published_at->gt(\Carbon\Carbon::now()) && Route::is('admin'))
        class="text-danger"
    @elseif(Route::is('admin'))
        class="text-success"
    @endif
    >
        {{ $thing->published_at->diffForHumans() }}

    </span>
in
@endif
<a href="{{ route('category',[$thing->category->slug]) }}">
    {{ $thing->category->name }}
</a>
