<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/17/16
 * Time: 9:31 PM
 */
?>

@if (count($errors) > 0)
    <div class="notification is-danger">
        {{--<button class="delete"></button>--}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
