@extends('layouts.app')
@section('title','laravel第一步视频教程')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('signup') }}" class="form-horizontal">
                            {{csrf_field()}}
                            <signup-component></signup-component>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="/js/signup.js" type="text/javascript"></script>
@stop