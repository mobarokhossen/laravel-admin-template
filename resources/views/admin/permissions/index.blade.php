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
        'name' => 'Index',
    ],
];

$data['data'] = [
    'name' => 'Permissions',
    'title'=>'List Of Permissions',
    'heading' => 'List Of Permissions',
];

?>

@extends('admin.layout.master', $data)

@section('contents')

    <div class="portlet light">

        <div class="portlet-body form">
            <a href="{{ route('admin.permissions.create') }}" class="btn green"> <i class="fa fa-plus"> Add Permission </i></a>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
    <div class="row">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        @include('common._alert')

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
                    @foreach( $permissions as $permission)
                        <tr>
                            <td> {{ $loop->index + 1 }} </td>
                            <td> {{ $permission->display_name }} </td>
                            <td> {{ $permission->name }} </td>
                            <td>
                                <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-xs btn-success">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <a href="javascript:void(0);" class="btn btn-xs btn-danger delete-confirm" data-target="{{  route('admin.permissions.destroy', $permission->id) }}">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right">
                            {{ $permissions->links() }}
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
@endsection




