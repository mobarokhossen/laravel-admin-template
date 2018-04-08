<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 2/18/2018
 * Time: 10:12 PM
 */
?>
@if (session('status'))
    <div class="alert alert-{{ session('status')['type'] }} alert-out">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> {{ ucfirst(session('status')['type']) }}</h4>
        {{ session('status')['message'] }}
    </div>
@endif

