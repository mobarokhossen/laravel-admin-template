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
        'name' => 'Roles',
        'href' => route('admin.roles.index'),
    ],
    [
        'name' => 'Add Role',
    ],
];

$data['data'] = [
    'name' => 'Roles',
    'title'=>'Add Role',
    'heading' => 'Add Role',
];

?>

@extends('admin.layout.master', $data)

@section('contents')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

            @include('common._alert')

            <div class="portlet light">

                <div class="portlet-body form">
                    {!! Form::open(['route' => 'admin.roles.store', 'method' => 'POST', 'role'=>'form' ]) !!}

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