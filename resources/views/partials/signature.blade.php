<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/17/16
 * Time: 11:28 AM
 */
?>

@if(get_class($thing) == 'App\Article')
@can('update-article',$article)<a href="{{ route('article.edit',[$article]) }}">@endcan<i class="fa fa-pencil"></i>@can('update-article',$article)</a>@endcan
@endif

@if(get_class($thing) == 'App\Photo')
@can('update-photo',$photo)<a href="{{ route('photo.edit',[$photo]) }}">@endcan<i class="fa fa-camera"></i>@can('update-photo',$photo)</a>@endcan
@endif

<a href="{{ route('articles',[null,'query'=>$thing->user->name]) }}">{{ $thing->user->name }}</a>

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
<a href="{{ route('articles',[$thing->category->slug]) }}">
    {{ $thing->category->name }}
</a>

@if($thing->views)
<span class="text-muted">
    <i class="fa fa-eye"></i> {{ number_format($thing->views) }}
</span>
@endif
