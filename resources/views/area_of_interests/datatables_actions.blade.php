{{-- {!! Form::open(['route' => ['areaOfInterests.destroy', $id], 'method' => 'delete']) !!} --}}
<div class='btn-group'>
    {{-- <a href="{{ route('areaOfInterests.show', $id) }}" class='btn btn-sm btn-default'>
        <i class="fa fa-eye"></i>
    </a> --}}
    <a href="{{ route('areaOfInterests.edit', $id) }}" class='btn btn-sm btn-default'>
        <i class="fa fa-edit"></i>
    </a>
    {{-- {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-sm btn-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!} --}}
</div>
{{-- {!! Form::close() !!} --}}
