<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 1/1/2018
 * Time: 11:38 PM
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
        'name' => 'Add Permission',
    ],
];

$data['data'] = [
    'name' => 'Permissions',
    'title'=>'Add Permission',
    'heading' => 'Add Permission',
];

?>

@extends('admin.layout.master', $data)

@section('contents')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

            @include('common._alert')

            <div class="portlet light">

                <div class="portlet-body form">
                    {!! Form::open(['route' => 'admin.permissions.store', 'method' => 'POST', 'role'=>'form' ]) !!}

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