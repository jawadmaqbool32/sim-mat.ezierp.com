@extends('layouts.basic')

@section('content')
    <div class="card mb-5 mb-xl-8">
        <div class="card-body pt-3">
            @foreach ($mandatoryQuestion as $question)
                <div class="row mb-2" id="type-{{ $question->id }}">
                    <div class="col-md-10 col-sm-10 ">
                        <div style="font-weight: bold;">
                            {{ $question->name }}
                        </div>
                    </div>
                    @if ($question->type == 2 && $question->id != 6)
                        <div class="col-md-10 col-sm-10 mb-1">

                            {{-- <textarea type="text" class="form-control custom-select" style="width: 100%"></textarea> --}}
                            <input type="text" name="input-{{ $question->id }}[]" class="form-control custom-select" style="width: 100%">

                        </div>
                        <div class="col-md-1 col-sm-1">
                            <button class="btn btn-light add_field" data-type={{ $question->id }}>+</button>
                        </div>
                    @elseif ( $question->id == 6)
                        <div class="col-md-10 col-sm-10 ">
                            <select name="areaOfInterest"  id="areaOfInterest" class="form-control custom-select select2 " multiple >
                                @foreach ($areaOfInterest as $intrest)
                                    @if ($intrest->parent_id == null)
                                        <optgroup label="{{ $intrest->name }}">
                                            @if ($intrest->child)
                                                @foreach ($intrest->child as $child)
                                                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                                                @endforeach
                                            @endif
                                        </optgroup>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="col-md-10 col-sm-10 ">
                            <input type="text" name="input-{{ $question->id }}" class="form-control custom-select" style="width: 100%">
                        </div>
                    @endif
                </div>
                <div><br></div>
            @endforeach
        </div>
    </div>
    </div>
@endsection

@push('third_party_scripts')
<script src="{{ asset('survey/script.js') }}"></script>
@endpush
