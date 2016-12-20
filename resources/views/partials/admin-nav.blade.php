<aside class="menu">
    <p class="menu-label">
        Administration
    </p>
    <ul class="menu-list">
        <li><a class="@if(Route::is('admin')){{'is-active'}}@endif" href="{{ route('admin') }}">Dashboard</a></li>
        <li><a class="@if(Route::is('article.index')){{'is-active'}}@endif" href="{{ route('article.index') }}">Articles</a></li>
        <li><a class="@if(Route::is('photo.index')){{'is-active'}}@endif" href="{{ route('photo.index') }}">Photos</a></li>
        <li><a class="@if(Route::is('category.index')){{'is-active'}}@endif" href="{{ route('category.index') }}">Categories</a></li>
        <li><a class="@if(Route::is('tag.index')){{'is-active'}}@endif" href="{{ route('tag.index') }}">Tags</a></li>
        <li><a class="@if(Route::is('user.index')){{'is-active'}}@endif" href="{{ route('user.index') }}">Users</a></li>
    </ul>

    {{--<p class="menu-label">--}}
        {{--Actions--}}
    {{--</p>--}}

    {{--<ul class="menu-list">--}}
        {{--@can('create-article')--}}
            {{--<li><a class="@if(Route::is('article.create')){{'is-active'}}@endif" href="{{ route('article.create') }}">Create Article</a></li>--}}
        {{--@endcan--}}

        {{--@can('create-photo')--}}
            {{--<li><a class="@if(Route::is('photo.create')){{'is-active'}}@endif" href="{{ route('photo.create') }}">Create Photo</a></li>--}}
        {{--@endcan--}}

        {{--@can('create-category')--}}
            {{--<li><a class="@if(Route::is('category.create')){{'is-active'}}@endif" href="{{ route('category.create') }}">Dashboard</a></li>--}}
        {{--@endcan--}}

        {{--@can('create-tag')--}}
            {{--<li><a class="@if(Route::is('tag.create')){{'is-active'}}@endif" href="{{ route('tag.create') }}">Dashboard</a></li>--}}
        {{--@endcan--}}

        {{--@can('create-user')--}}
            {{--<li><a class="@if(Route::is('user.create')){{'is-active'}}@endif" href="{{ route('user.create') }}">Dashboard</a></li>--}}
        {{--@endcan--}}

        {{--<li><a href="{{ url('/logout') }}">Logout</a></li>--}}
    {{--</ul>--}}

</aside>