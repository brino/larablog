@foreach($medias as $media)
    <div class="card pull-left" style="margin-bottom: 20px;">
        <div class="card-image">
            <figure class="image is-3by2">
                <a href="{{ route('media',[$media->slug]) }}">
                    <img class="image" src="{{ $media->url() }}" />
                </a>
            </figure>
        </div>
        <div class="card-content">
            <div class="content">
                <h5 class="title"><a href="{{ route('media',[$media->slug]) }}">{{ str_limit($media->title,25) }}</a></h5>
            </div>
            <nav class="level">
                <div class="level-left media-signature">
                    <small>@include('partials.signature',['thing'=>$media])</small>
                </div>
            </nav>
        </div>
    </div>
@endforeach

