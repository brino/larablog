
<div class="columns">
    <div class="column">

        @foreach($contributors as $contributor)
            <article class="media">
                @unless(empty($contributor->avatarUrl()))
                <figure class="media-left">
                    <p class="image is-64x64">
                        <a href="{{ route('profile',$contributor) }}">
                            <img src="{{ $contributor->avatarUrl() }}">
                        </a>
                    </p>
                </figure>
                @endunless
                <div class="media-content">
                    <div class="media-heading">
                        <a href="{{ route('profile',$contributor) }}">{{ $contributor->name }}</a> <small>joined {{ $contributor->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="content">
                        <p>
                            {{ $contributor->bio }}
                        </p>
                    </div>
                    <nav class="level">
                        <ul class="level-left">
                            <li class="level-item">
                                <span class="icon is-small"><i class="fa fa-file-text-o"></i></span> {{ $contributor->articles->count() }}
                            </li>
                            <li class="level-item">
                                <span class="icon is-small"><i class="fa fa-file-image-o"></i></span> {{ $contributor->media->count() }}
                            </li>
                            <li class="level-item">
                                <span class="icon is-small"><i class="fa fa-eye"></i></span>
                                {{ $contributor->articles->sum->views + $contributor->media->sum->views }}
                            </li>
                        </ul>
                    </nav>
                </div>
            </article>
@if(round($loop->count/2) == $loop->remaining)
    </div>
    <div class="column">
@endif
        @endforeach

    </div>
</div>


@if(method_exists($contributors,'render'))
    <div class="container" style="margin-top: 20px;">
        {!! $contributors->render() !!}
    </div>
@endif