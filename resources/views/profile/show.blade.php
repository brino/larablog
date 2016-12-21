<div class="box">
    <div class="level">
        <div class="level-item">
            <p class="heading has-text-centered">Joined</p>
            <p class="title has-text-centered">{{$user->created_at->diffForHumans()}}</p>
        </div>
        <div class="level-item">
            <p class="heading has-text-centered">Articles</p>
            <p class="title has-text-centered">{{$user->articles()->published()->count()}}</p>
        </div>
        <div class="level-item">
            <p class="heading has-text-centered">Photos</p>
            <p class="title has-text-centered">{{$user->photos()->published()->count()}}</p>
        </div>
    </div>
</div>

<div class="columns">
    <div class="column">
        <div class="content">
            <p class="heading">Name:</p>
            <p class="title">{{$user->name}}</p>

            {{--<p class="heading">Email:</p>--}}
            {{--<p class="title">{{$user->email}}</p>--}}
        </div>
    </div>
    <div class="column">
        <div class="content">
            <p class="heading">Bio</p>
            {{ $user->bio }}
        </div>
    </div>
</div>

<hr>

<div class="columns">
    <div class="column">
        <p class="title"><a href="{{ route('articles',[null,'query'=>$user->name]) }}">Latest Articles</a></p>
        <table class="table">
            <thead>
                <th>Views</th>
                <th>Title</th>
                <th>Published</th>
            </thead>
            <tbody>
            @foreach($user->articles()->published()->latest()->limit(5)->get() as $article)
                <tr>
                    <td>{{$article->views}}</td>
                    <td>{{$article->title}}</td>
                    <td style="white-space: nowrap">{{ $article->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="column">
        <p class="title"><a href="{{ route('photos',[null,'query'=>$user->name]) }}">Latest Photos</a></p>
        <table class="table">
            <thead>
            <th>Views</th>
            <th>Title</th>
            <th>Published</th>
            </thead>
            <tbody>
            @foreach($user->photos()->published()->latest()->limit(5)->get() as $photo)
                <tr>
                    <td>{{$photo->views}}</td>
                    <td>{{$photo->title}}</td>
                    <td style="white-space: nowrap">{{ $photo->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@can('update-user',$user)
    <p class="heading">Api Token</p>
    @if(empty($user->api_token))
        @can('contributor')
        <a class="button is-primary is-large" href="{{ route('profile.token') }}">Create Token</a>
        @endcan
    @else
        <p class="title">{{ $user->api_token }}</p>
    @endif
@endcan