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
        'name' => 'Index',
    ],
];

$data['data'] = [
    'name' => 'Roles',
    'title'=>'List Of Roles',
    'heading' => 'List Of Roles',
];

?>

@extends('admin.layout.master', $data)

@section('contents')
    <div class="portlet light">

        <div class="portlet-body form">
            <a href="{{ route('admin.roles.create') }}" class="btn green"> <i class="fa fa-plus"> Add Role </i></a>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
    <div class="row">
        <!-- BEGIN SAMPLE FORM PORTLET-->

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td> # </td>
                        <td> Display Name </td>
                        <td> Name </td>
                        <td> Manage </td>
                    </tr>
                    @foreach( $roles as $role)
                        <tr>
                            <td> {{ $loop->index + 1 }} </td>
                            <td> {{ $role->display_name }} </td>
                            <td> {{ $role->name }} </td>
                            <td>
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-xs btn-success">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <a href="javascript:void(0);" class="btn btn-xs btn-danger delete-confirm" data-target="{{  route('admin.roles.destroy', $role->id) }}">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right">
                            {{ $roles->links() }}
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
@endsection




