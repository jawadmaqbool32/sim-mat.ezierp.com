<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $question->id }}</p>
</div>

<!-- Section Field -->
<div class="col-sm-12">
    {!! Form::label('section', 'Section:') !!}
    <p>{{ $question->section }}</p>
</div>

<!-- Question Field -->
<div class="col-sm-12">
    {!! Form::label('question', 'Question:') !!}
    <p>{{ $question->question }}</p>
</div>

<!-- Score Field -->
<div class="col-sm-12">
    {!! Form::label('score', 'Score:') !!}
    <p>{{ $question->score }}</p>
</div>

<!-- Correct Answer Field -->
<div class="col-sm-12">
    {!! Form::label('correct_answer', 'Correct Answer:') !!}
    <p>{{ $question->correct_answer }}</p>
</div>

<!-- third Option Field -->
<div class="col-sm-12">
    {!! Form::label('third_option', 'third Option:') !!}
    <p>{{ $question->third_option }}</p>
</div>

<!-- Show third For Field -->
<div class="col-sm-12">
    {!! Form::label('show_third_for', 'Show third For:') !!}
    <p>{{ $question->show_third_for }}</p>
</div>

<!-- third Option Is Field -->
<div class="col-sm-12">
    {!! Form::label('third_option_is', 'third Option Is:') !!}
    <p>{{ $question->third_option_is }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $question->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $question->updated_at }}</p>
</div>

