<aside class="menu">
    <p class="menu-label">
        Administration
    </p>
    <ul class="menu-list">
        <li><a class="@if(Route::is('admin')){{'is-active'}}@endif" href="{{ route('admin') }}">Dashboard</a></li>
        <li><a class="@if(Route::is('article.index')){{'is-active'}}@endif" href="{{ route('article.index') }}">Articles</a></li>
        <li><a class="@if(Route::is('media.index')){{'is-active'}}@endif" href="{{ route('media.index') }}">Media</a></li>
        <li><a class="@if(Route::is('tag.index')){{'is-active'}}@endif" href="{{ route('tag.index') }}">Tags</a></li>
        <li><a class="@if(Route::is('category.index')){{'is-active'}}@endif" href="{{ route('category.index') }}">Categories</a></li>
        @can('super')
            <li><a class="@if(Route::is('user.index')){{'is-active'}}@endif" href="{{ route('user.index') }}">Users</a></li>
        @endcan
    </ul>
</aside>