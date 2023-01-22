@extends('layouts.basic')

@section('content')
    <section class="content-header">
        <div class="row mb-3">
            <div class="col-md-12">
                <x-breadcrums :links="[
                    'Home' => route('dashboard'),
                    'Area Of Interests' => route('areaOfInterests.index'),
                    'Edit' => false,
                ]" />
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Area Of Interest</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>

        <div class="card mb-5 mb-xl-8">


            {!! Form::model($areaOfInterest, ['route' => ['areaOfInterests.update', $areaOfInterest->id], 'method' => 'patch']) !!}

            <div class="card-body pt-3">
                <div class="row">
                    @include('area_of_interests.fields')
                </div>
            </div>

            <div class="card-footer clearfix">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('areaOfInterests.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
