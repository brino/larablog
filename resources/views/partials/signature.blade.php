<a href="{{ route('profile',$thing->user) }}">
    @if(empty($thing->user->avatarUrl()))
        <span class="icon is-small"><i class="fa fa-user-circle"></i></span>
    @else
        <img class="avatar" src="{{ $thing->user->avatarUrl() }}">
    @endif
    {{ $thing->user->name }}
</a>

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