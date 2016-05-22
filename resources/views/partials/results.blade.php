<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 7:07 AM
 */
?>
@if($search->has('hits'))

    <div class="row">
        <div class="col-sm-12">
            <small class="text-muted">
                Found <strong>{{ $search->get('hits') }}</strong> {{ 'result' }}@if($search->get('hits') > 1){{ 's' }}@endif

                @if($search->has('string'))
                    for <strong>"{{ trim($search->get('string')) }}"</strong>
                @endif

                @if(!empty($categoryFilter))
                    within <strong>{{ $categoryFilter }}</strong>
                @endif

                in <strong>{{ $search->get('took') }}ms</strong>

            </small>
        </div>
    </div>

@else

    <div class="row">
        <div class="col-sm-12">
            <small class="text-muted">
                Contains {{ $articles->count() }} Articles
            </small>
        </div>
    </div>

@endif
