<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 1/1/2018
 * Time: 11:37 PM
 */


$data['breadcrumb'] = [
    [
        'name' => 'Home',
        'href' => route('admin.dashboard'),
        'icon' => 'fa fa-home',
    ],
    [
        'name' => 'Roles',
        'href' => route('admin.roles.index'),
    ],
    [
        'name' => 'Edit',
    ],
];

$data['data'] = [
    'name' => 'Roles',
    'title'=>'Edit Role',
    'heading' => 'Edit Role',
];

?>

@extends('admin.layout.master', $data)

@section('contents')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            @include('common._alert')

            <div class="portlet light">

                <div class="portlet-body form">
                    {!! Form::model($model, ['route' => ['admin.roles.update', $model],  'method' => 'put']) !!}

                    <div class="form-body">
                        @include('admin.roles._form')
                    </div>

                    {!! Form::close() !!}
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
    </div>
@endsection
