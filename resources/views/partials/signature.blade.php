{{--@if(!empty($thing->user->avatarUrl()))--}}
        {{--<span class="image is-16x16 pull-left"><img src="{{ $thing->user->avatarUrl() }}"></span>--}}
{{--@endif&nbsp;--}}
<a href="{{ route('profile',$thing->user) }}">
    {{--<span class="icon"><i class="fa fa-user-circle"></i></span>--}}
    @if(empty($thing->user->avatarUrl()))
        <span class="icon is-small"><i class="fa fa-user-circle"></i></span>
    @else
        <img class="avatar" src="{{ $thing->user->avatarUrl() }}">
    @endif
    {{ $thing->user->name }}
</a>

{{--@if(get_class($thing) == 'App\Article')--}}
    {{--@can('update-article',$article)<a href="{{ route('article.edit',[$article]) }}">@endcan<span class="icon is-small"><i class="fa fa-pencil"></i></span>@can('update-article',$article)</a>@endcan--}}
{{--@endif--}}

{{--@if(get_class($thing) == 'App\Media')--}}
    {{--@can('update-media',$media)<a href="{{ route('media.edit',[$media]) }}">@endcan<span class="icon is-small"><i class="fa fa-camera"></i></span>@can('update-media',$media)</a>@endcan--}}
{{--@endif--}}

@if(isset($thing->published_at))
    <span
            @if($thing->published_at->gt(\Carbon\Carbon::now()) && Route::is('admin'))
                class="is-danger"
            @elseif(Route::is('admin'))
                class="is-success"
            @endif
    >
        {{ $thing->published_at->diffForHumans() }}

    </span>
@endif

{{--<a href="{{ route('articles',[$thing->category,'query'=>request()->input('query'),'tags'=>request()->input('tags')]) }}">--}}
    {{--{{ $thing->category->name }}--}}
{{--</a>--}}

{{--@if($thing->views)--}}
    {{--<span class="icon is-small"><i class="fa fa-eye"></i></span> {{ number_format($thing->views) }}--}}
{{--@endif--}}
