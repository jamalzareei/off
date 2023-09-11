@extends('_master')

<!-- title -->
@section('title')
title
@endsection
@section('keywords')
keywords
@endsection
@section('description')
description
@endsection

<!-- cascle style sheet -->
@section('css')

@endsection

<!-- content -->
@section('_master')
<div class="row">
	<div class=" mfp-dialog">
        <h3 class="text-right">تنظیم پسورد</h3>
        <h5 class="text-right" dir="rtl">پسورد خود را تغییر یا ست کنید.</h5>
        <label>{{$email}}</label>
        <form class="dialog-form" method="post" action="setassword/{{$email}}/{{$code_confirm_tell}}/{{$code_confirm_email}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="email" value="{{$email}}">
            <input type="hidden" name="code_confirm_email" value="{{$code_confirm_email}}">
            <input type="hidden" name="code_confirm_tell" value="{{$code_confirm_tell}}">
            <div class="form-group">
                <label class="pull-right">رمز عبور</label>
                <input type="password" placeholder="رمز عبور: Aa123456" class="form-control" name="password" value="<?php echo old('password') ?>">
                <?php if($errors->has('password')){
                            echo '<p class="text-danger text-right f-yekan">'
                                . $errors->first('password') .'</p>';
                        } ?>
            </div>
            <div class="form-group">
                <label class="pull-right">تکرار رمز عبور</label>
                <input type="password" placeholder="تکرار رمز عبور" class="form-control" name="password_confirmation" value="<?php echo old('password_confirmation') ?>">
                <?php if($errors->has('password_confirmation')){
                            echo '<p class="text-danger text-right f-yekan">'
                                . $errors->first('password_confirmation') .'</p>';
                        } ?>
            </div>
            <input type="submit" value="ثبت رمز عبور" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection

<!-- javascript -->
@section('js')

@endsection