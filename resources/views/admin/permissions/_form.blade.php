
<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 1/1/2018
 * Time: 11:37 PM
 */
?>

@if(!isset($permission))
<div class="row">
    <div class="col-md-6 col-lg-6  col-sm-12 col-xs-12 form-group {{ $errors->has('name') ? 'has-error' : '' }} ">
        {!! Form::label('name', 'Name') !!} <span class="required red"> * </span>
        <div class="form-group">
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']); !!}
        </div>
        {!! $errors->first('name', '<span class="help-block red"><strong>:message</strong></span>') !!}
    </div>
</div>
@endif

<div class="row">
    <div class="col-md-6 col-lg-6  col-sm-12 col-xs-12 form-group {{ $errors->has('display_name') ? 'has-error' : '' }} ">
        {!! Form::label('display_name', 'Display Name') !!} <span class="required red"> * </span>
        <div class="form-group">
            {!! Form::text('display_name',null,['class'=>'form-control','placeholder'=>'Display Name']); !!}
        </div>
        {!! $errors->first('display_name', '<span class="help-block red"><strong>:message</strong></span>') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-6  col-sm-12 col-xs-12 form-group">
        {!! Form::label('description', 'Description') !!}
        <div class="form-group">
            {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Description', 'rows' =>2]); !!}
        </div>
        {!! $errors->first('description', '<span class="help-block red"><strong>:message</strong></span>') !!}
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 text-right">
        <button type="submit" class="btn green">Save</button>
        <button type="reset" class="btn red">Reset</button>
    </div>
</div>


