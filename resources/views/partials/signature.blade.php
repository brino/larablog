<a href="{{ route('profile',$thing->user) }}">
    @if(empty($thing->user->avatarUrl()))
        <span class="icon"><i class="fa fa-user-circle"></i></span>
    @else
        <span class="icon"><img src="{{ $thing->user->avatarUrl() }}"></span>
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