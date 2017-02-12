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
            <h5 class="subtitle"><a href="{{ route('media',[$media->slug]) }}">{{ str_limit($media->title,25) }}</a></h5>
            <div class="content">
                <p>{{ $media->description }}</p>
            </div>
        </div>
        <div class="card-footer">
            <div class="card-footer-item">
                <div>
                    <small>@include('partials.signature',['thing'=>$media])</small>
                </div>
            </div>
        </div>
    </div>
@endforeach

