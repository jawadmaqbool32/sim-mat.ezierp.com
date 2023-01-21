<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {{-- {!! Form::select('type', ['1' => 'Single Answer', '2' => 'Allow Multiple', '3' => '3', '4' => '4'], null, ['class' => 'form-control custom-select']) !!} --}}
    {!! Form::select('type', ['1' => 'Single Answer', '2' => 'Allow Multiple'], null, ['class' => 'form-control custom-select']) !!}
</div>
