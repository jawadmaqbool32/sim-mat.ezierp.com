{{-- {!! Form::open(['route' => ['questions.destroy', $id], 'method' => 'delete']) !!} --}}
<div class='btn-group'>
    {{-- <a href="{{ route('questions.show', $id) }}" class='btn btn-sm btn-default'>
        <i class="fa fa-eye"></i>
    </a> --}}
    <a href="{{ route('questions.edit', $id) }}" class='btn btn-sm btn-default'>
        <i class="fa fa-edit"></i>
    </a>
    {{-- {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-sm btn-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!} --}}
</div>
{{-- {!! Form::close() !!} --}}
