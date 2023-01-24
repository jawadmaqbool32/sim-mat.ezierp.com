<!-- Section Field -->
<div class="form-group col-sm-6">
    {!! Form::label('section', 'Section:') !!}
    {!! Form::select('section', $section, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Question Field -->
<div class="form-group col-sm-6">
    {!! Form::label('score', 'Score:') !!}
    {!! Form::number('score', null, ['class' => 'form-control']) !!}

</div>

<!-- Score Field -->
<div class="form-group col-sm-8">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::text('question', null, ['class' => 'form-control']) !!}
</div>

<!-- Correct Answer Field -->
<div class="form-group col-sm-4 ">
    <br>
    {!! Form::label('correct_answer', 'Correct Answer', ['class' => 'form-check-label']) !!}

    <div class="form-label">

        <label>
            {!! Form::radio('correct_answer', '1', null, ['class' => 'form-check-input']) !!} Yes
        </label>

        <label>
            {!! Form::radio('correct_answer', '2', null, ['class' => 'form-check-input']) !!} No
        </label>
    </div>

</div>


<!-- third Option Field -->
<div class="form-group col-sm-8">
    {!! Form::label('third_option', 'third Option:') !!}
    {!! Form::text('third_option', null, ['class' => 'form-control']) !!}
</div>

<!-- Show third For Field -->
<div class="form-group col-sm-4">
    {!! Form::label('show_third_for', 'Show third For', ['class' => 'form-check-label']) !!}
    <div class="form-label">

        <label>
            {!! Form::radio('show_third_for', '1', null, ['class' => 'form-check-input']) !!} Yes
        </label>

        <label>
            {!! Form::radio('show_third_for', '2', null, ['class' => 'form-check-input']) !!} No
        </label>
    </div>
</div>


<!-- third Option Is Field -->
<div class="form-group col-sm-6">
    {!! Form::label('third_option_is', 'third Option Is:') !!}
    {!! Form::select('third_option_is', ['1' => 'Input', '2' => ' CheckBox'], null, [
        'class' => 'form-control custom-select',
    ]) !!}
</div>
