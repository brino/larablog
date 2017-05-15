@unless(!isset($categories))
    @if(Route::is('media') || Route::is('articles') || Route::is('home') || Route::is('contributors'))
        <nav class="nav has-shadow" style="z-index:0">
            <div class="container">
                <div class="nav">
                    @foreach($categories as $category)
                        <a href="{{ route('articles',array_filter(['category'=>$category,'query'=>request('query')])) }}" class="nav-item is-tab @if(!empty(request()->route('category')) && request()->route('category')->slug == $category->slug){{'is-active'}}@endif">
                            <span class="icon">
                                <i class="fa {{ $category->icon }}"></i>
                            </span>
                            &nbsp;
                            <span class="is-hidden-mobile">{{ $category->name }}</span>

                            <span class="tag is-light">{{ $category->articles()->published()->get()->count() }}</span>
                        </a>
                    @endforeach
                </div>

                <div class="nav-right">
                    <a href="{{ route('contributors') }}" class="nav-item is-tab @if(Route::is('contributors')){{'is-active'}}@endif">
                        <span class="icon"><i class="fa fa-users"></i></span>
                        &nbsp;
                        <span class="is-hidden-mobile">Contributors</span>
                    </a>
                </div>
            </div>
        </nav>
    @endif
@endunless