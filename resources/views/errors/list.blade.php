<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/17/16
 * Time: 9:31 PM
 */
?>

@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4><i class="glyphicon glyphicon-fire"></i> Error</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
