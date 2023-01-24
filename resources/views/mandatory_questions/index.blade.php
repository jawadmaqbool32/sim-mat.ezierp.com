@extends('layouts.basic')

@section('content')
    <section class="content-header">
        <div class="row mb-3">
            <div class="col-md-12">
                <x-breadcrums :links="[
                    'Home' => route('dashboard'),
                    'Mandatory Questions' => false,
                ]" />
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mandatory Questions</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-sm btn-primary float-right" style="float:right; margin-left:8px;"
                       href="{{ route('mandatoryQuestions.create') }}">
                        Add New
                    </a>
                    <a class="btn btn-sm btn-primary float-right" style="float:right;margin-left:8px;"
                       href="{{ route('mandatoryQuestions.preview') }}">
                        Preview
                    </a>
                    <a class="btn btn-sm btn-primary float-right" style="float:right;margin-left:8px;"
                       href="{{ route('areaOfInterests.index') }}">
                       Area Of Interests
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
                <div class="table-responsive">
                @include('mandatory_questions.table')
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

