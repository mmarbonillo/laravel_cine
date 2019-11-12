@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <form action="{{ route('logout') }}">
                    <input type="submit" class="btn btn-primary" value="Log Out">
                    <!--<button type="submit" class="btn btn-primary">
                        {{ __('Log out') }}
                    </button>-->
                </form>
                
            </div>
        </div>
</div>
@endsection
