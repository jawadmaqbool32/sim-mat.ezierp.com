@extends('layouts.basic')

@section('content')
    <section class="content-header">
        <div class="row mb-3">
            <div class="col-md-12">
                <x-breadcrums :links="[
                    'Home' => route('dashboard'),
                    'Sections' => route('sections.index'),
                    'Show' => false,
                ]" />
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Section Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default" style="float:right"
                       href="{{ route('sections.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="clearfix"></div>

        <div class="card mb-5 mb-xl-8">
            <div class="card-body pt-3">
                <div class="row">
                    @include('sections.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
