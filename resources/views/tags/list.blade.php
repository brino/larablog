@foreach($tags as $tag)
    <span class="tag @if(collect(request('tags'))->search($tag->slug)!==false){{ 'is-primary' }}@endif">
        <a
            @if(collect(request('tags'))->search($tag->slug)===false)
            href="{!! route('articles',['category'=>!empty($category)?$category->slug:null,'query'=>request('query'),'tags'=>collect(request('tags'))->merge($tag->slug)->toArray()]) !!}"
            @else
            style="color:white;"
            href="{!! route('articles',['category'=>$category?$category->slug:null,'query'=>request('query'),'tags'=>collect(request('tags'))->filter(function($requestTag) use($tag) {return $requestTag!=$tag->slug;})->toArray()]) !!}"
            @endif
        >

            <span class="icon is-small"><i class="fa fa-tag"></i></span>
            {{ $tag->name }}
            @if(collect(request('tags'))->search($tag->slug)!==false)
                <span class="delete is-small"></span>
            @endif
        </a>
    </span>
@endforeach