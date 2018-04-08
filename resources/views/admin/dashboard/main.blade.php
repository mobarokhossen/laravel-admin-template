<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 12/2/2017
 * Time: 10:42 PM
 */

$data['breadcrumb'] = [
[
'name' => 'Home',
'href' => route('admin.dashboard'),
'icon' => 'fa fa-home',
],
[
'name' => 'Dashboard',
]
];

$data['data'] = [
'name' => 'Dashboard',
'title'=>'Dashboard',
'heading' => 'Dashboard',
];

?>

@extends('admin.layout.master', $data)

@section('contents')

    <h1> Hello, Admin </h1>

@endsection
