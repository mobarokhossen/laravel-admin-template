<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 1/9/2018
 * Time: 3:50 PM
 */
?>


<a href="javascript:void(0);" class="btn btn-xs btn-info ajax-show" data-target="{{ route($route . '.show', $model->id) }}">
    <i class="fa fa-info-circle"></i>
</a>

<a href="{{ route($route . '.edit', $model->id) }}" class="btn btn-xs btn-success">
    <i class="fa fa-pencil"></i>
</a>

<a href="javascript:void(0);" class="btn btn-xs btn-danger delete-confirm" data-target="{{ route($route . '.destroy', $model->id) }}">
    <i class="fa fa-times"></i>
</a>
