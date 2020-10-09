@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" >
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>

                <div class="card-body" id="emp">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
					
<router-view name="Employees"></router-view>
<router-view></router-view>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
