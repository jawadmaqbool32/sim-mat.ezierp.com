@extends('layouts.basic')
@section('content')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column w-100">
                <span class="card-label fw-bold fs-3 mb-1">Accounts</span>
            </h3>
            <div class="row">
                <div class="col-md-12">
                    <x-breadcrums :links="[
                        'Home' => route('dashboard'),
                        'Accounts' => false,
                    ]" />
                </div>
               
            </div>
            
        </div>
        <div class="card-body pt-3">
            <div class="table-responsive" id="tree_wrapper">
            </div>
        </div>
    </div>
@endsection

@section('jsSection')
    @include('accounts._js');
@endsection
