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
        'name' => 'Permissions',
        'href' => route('admin.permissions.index'),
    ],
    [
        'name' => 'Edit',
    ],
];

$data['data'] = [
    'name' => 'Permissions',
    'title'=>'Edit Permission',
    'heading' => 'Edit Permission',
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
                    {!! Form::model($permission, ['route' => ['admin.permissions.update', $permission],  'method' => 'put']) !!}

                    <div class="form-body">
                        @include('admin.permissions._form')
                    </div>

                    {!! Form::close() !!}
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
    </div>
@endsection
