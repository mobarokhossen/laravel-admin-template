<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 12/2/2017
 * Time: 10:38 PM
 */
?>

<!-- BEGIN PAGE BAR -->

@isset($breadcrumb)

<div class="page-bar">
    <ul class="page-breadcrumb">

            @foreach($breadcrumb as $b)
                <li class="{{ $loop->last ? 'active' : '' }}">
                    @if(isset($b['href']))
                        <a href="{{$b['href']}}">
                            <i class="{{ isset($b['icon']) ? $b['icon'] : '' }}"></i>
                            {{$b['name']}}
                        </a>
                        <i class="fa fa-circle"></i>
                    @else
                        <strong>{{$b['name']}}</strong>
                    @endif
                </li>
            @endforeach
    </ul>
</div>
<!-- END PAGE BAR --

     <!-- BEGIN PAGE TITLE-->
@if( isset($data['heading']) )
<h1 class="page-title">
    {{ $data['heading'] ? $data['heading'] : $data['name']}}
</h1>
@endif


@endisset
<!-- END PAGE TITLE-->
