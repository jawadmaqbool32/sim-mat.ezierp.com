<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Referent1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('referent1', 'Referent1:') !!}
    {{-- {!! Form::text('referent1', null, ['class' => 'form-control']) !!} --}}
    {!! Form::select('referent1', $users, @$areaOfInterest->referent1 ? $areaOfInterest->referent1 : Null ,  ['placeholder' => 'Select ref1', 'class' => 'form-control custom-select']) !!}

</div>

<!-- Referent2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('referent2', 'Referent2:') !!}
    {{-- {!! Form::text('referent2', null, ['class' => 'form-control']) !!} --}}
    {!! Form::select('referent2', $users, @$areaOfInterest->referent2 ? $areaOfInterest->referent2 : Null ,  ['placeholder' => 'Select ref2', 'class' => 'form-control custom-select']) !!}

</div>

<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Parent:') !!}
    {{-- {!! Form::select('parent_id', ['1' => '1', '2' => '2', '3' => '3', '4' => '4'], null, ['class' => 'form-control custom-select']) !!} --}}
    {!! Form::select('parent_id', $parent_id, @$areaOfInterest->parent_id ? $areaOfInterest->parent_id : Null ,  ['placeholder' => 'Select Parent', 'class' => 'form-control custom-select']) !!}
</div>
