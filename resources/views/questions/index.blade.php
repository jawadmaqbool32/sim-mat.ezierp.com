@extends('layouts.basic')

@section('content')
    <section class="content-header">
        <div class="row mb-3">
            <div class="col-md-12">
                <x-breadcrums :links="[
                    'Home' => route('dashboard'),
                    'Questions' => false,
                ]" />
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Questions</h1>
                </div>
                <div class="col-sm-6">

                    <a class="btn btn-sm btn-primary float-right " style="float:right; margin-right: 5px"
                       href="{{ route('questions.create') }}">
                        Add New
                    </a>
                    <a class="btn btn-sm btn-primary float-right " style="float:right; margin-right: 5px"
                       href="{{ route('sections.index') }}">
                        Sections
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')
        <div class="clearfix"></div>

        <div class="card mb-5 mb-xl-8">
            <div class="card-body pt-3">
                @include('questions.table')

                <div class="card-footer clearfix">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

