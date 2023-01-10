@extends('layouts.basic')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Mat Sim
                        Dashboard</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="../index.html" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Dashboards</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row g-5 g-xl-10 mb-xl-10">
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <div class="card card-flush mb-5 mb-xl-10">
                            <div class="card-body pt-2 pb-4 d-block align-items-center">
                                <form id="fileUploader" action="{{ route('file.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Choose file</label>
                                        <input type="file" class="form-control" name="file" id=""
                                            placeholder="" aria-describedby="fileHelpId">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="card-body d-flex align-items-end pb-0">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><strong>SR#</strong></th>
                                            <th><strong>Word</strong></th>
                                            <th><strong>Occurances</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody id="keywords">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <div class="card card-flush mb-5 mb-xl-10">
                            <div class="card-body pt-2 pb-4 d-block align-items-center" id="text_area">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row g-5 g-xl-10 mb-xl-10">
                    <div class="col-md-12 mb-md-5 mb-xl-10">
                        <div class="card card-flush mb-5 mb-xl-10">
                            <div class="card-body pt-2 pb-4 d-block align-items-center">
                                <button class="btn btn-sm btn-danger float-end mt-3 btn-add-question"><i
                                        class="bi bi-plus"></i> Add
                                    Question</button>
                            </div>

                            {{-- <div action="" id="quention_form">
                                <div class="card-body w-100 align-items-end pb-0">
                                    <div class="row">
                                        <div class="card-body w-100 align-items-end pb-0">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Question</label>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-solid"
                                                            placeholder="Question Here" aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-8 answer-type-wrapper">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Answer Type</label>
                                                        <select name="" id=""
                                                            class="form-control form-control-solid  answer-type">
                                                            <option value="">Select Answer Type</option>
                                                            <option value="text_field">Text Field</option>
                                                            <option value="mcqs">MCQs</option>
                                                            <option value="tags">Tags</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-4">
                                                    <button class="btn btn-danger mt-8"><i class="bi bi-x"></i></button>
                                                </div>
                                                <div class="col-md-12 answer p-0"></div>

                                            </div>
                                        </div>
                                        {{-- MCQs --}}
                            {{-- <div class="col-md-12 d-block">
                                            <button class="btn btn-sm btn-danger float-end mt-3 btn-add-option"><i
                                                    class="bi bi-plus"></i></button>
                                        </div>
                                        <div class="row mcq-wrapper">
                                            <div class="col-md-6 col-xs-12">
                                                <label for="" class="form-label">Choice</label>
                                                <input type="text" name="" id=""
                                                    class="form-control form-control-solid" placeholder="Choice Here"
                                                    aria-describedby="helpId">
                                            </div>
                                            <div class="col-md-4 col-xs-8">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Answer Type</label>
                                                    <select name="" id=""
                                                        class="form-control form-control-solid">
                                                        <option value="">None</option>
                                                        <option value="text_field">Text Field</option>
                                                        <option value="mcqs">MCQs</option>
                                                        <option value="tags">Tags</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-4">
                                                <button class="btn btn-danger mt-8"><i class="bi bi-x"></i></button>
                                            </div>
                                        </div> --}}




                            {{-- Single Line Answer --}}
                            {{-- <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Answer</label>
                                                <input type="text" name="" id=""
                                                    class="form-control form-control-solid" placeholder="Question Here"
                                                    aria-describedby="helpId">
                                            </div>
                                        </div> --}}
                        </div>
                    </div>
                </div> --}}

                <div action="" id="quention_form">
                    <div class="card-body w-100 align-items-end pb-0">
                        <div class="row">
                            <div class="card-body w-100 align-items-end pb-0">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Question</label>
                                            <input type="text" name="" id=""
                                                class="form-control form-control-solid" placeholder="Question Here"
                                                aria-describedby="helpId">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-8 answer-type-wrapper">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Answer Type</label>
                                            <select name="" id=""
                                                class="form-control form-control-solid  answer-type">
                                                <option value="">Select Answer Type</option>
                                                <option value="text_field">Text Field</option>
                                                <option value="mcqs">MCQs</option>
                                                <option value="tags">Tags</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-4">
                                        <button class="btn btn-danger mt-8"><i class="bi bi-x"></i></button>
                                    </div>
                                    <div class="col-md-12 answer p-0">
                                        <div class="row mcq-wrapper">
                                            <div class="col-md-12 my-6">
                                                <button class="btn btn-sm btn-danger float-end  btn-add-option"><i
                                                        class="bi bi-plus"></i> Add Option</button>
                                            </div>
                                            <div class="col-md-12 ">
                                                <div class="option-wrapper row">
                                                    <div class="col-md-6 col-xs-12">
                                                        <label for="" class="form-label">Choice</label>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-solid"
                                                            placeholder="Choice Here" aria-describedby="helpId">
                                                    </div>
                                                    <div class="col-md-4 col-xs-8 answer-type-wrapper">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Answer Type</label>
                                                            <select name="" id=""
                                                                class="form-control form-control-solid answer-type">
                                                                <option value="">None</option>
                                                                <option value="text_field">Text Field</option>
                                                                <option value="mcqs">MCQs</option>
                                                                <option value="tags">Tags</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-xs-4">
                                                        <button class="btn btn-danger mt-8"><i
                                                                class="bi bi-x"></i></button>
                                                    </div>
                                                    <div class="col-md-12 answer p-0">
                                                        <div class="row mcq-wrapper">
                                                            <div class="col-md-12 my-6">
                                                                <button
                                                                    class="btn btn-sm btn-danger float-end  btn-add-option"><i
                                                                        class="bi bi-plus"></i> Add Option</button>
                                                            </div>
                                                            <div class="col-md-12 ">
                                                            </div>
                                                            <div class="option-wrapper row">
                                                                <div class="col-md-6 col-xs-12">
                                                                    <label for=""
                                                                        class="form-label">Choice</label>
                                                                    <input type="text" name="" id=""
                                                                        class="form-control form-control-solid"
                                                                        placeholder="Choice Here"
                                                                        aria-describedby="helpId">
                                                                </div>
                                                                <div class="col-md-4 col-xs-8 answer-type-wrapper">
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Answer
                                                                            Type</label>
                                                                        <select name="" id=""
                                                                            class="form-control form-control-solid answer-type">
                                                                            <option value="">None</option>
                                                                            <option value="text_field">Text Field</option>
                                                                            <option value="mcqs">MCQs</option>
                                                                            <option value="tags">Tags</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-xs-4">
                                                                    <button class="btn btn-danger mt-8"><i
                                                                            class="bi bi-x"></i></button>
                                                                </div>
                                                                <div class="col-md-12 answer p-0">
                                                                    <div class="row mcq-wrapper">
                                                                        <div class="col-md-12 my-6">
                                                                            <button
                                                                                class="btn btn-sm btn-danger float-end  btn-add-option"><i
                                                                                    class="bi bi-plus"></i> Add
                                                                                Option</button>
                                                                        </div>
                                                                        <div class="col-md-12 ">
                                                                        </div>
                                                                        <div class="option-wrapper row">
                                                                            <div class="col-md-6 col-xs-12">
                                                                                <label for=""
                                                                                    class="form-label">Choice</label>
                                                                                <input type="text" name=""
                                                                                    id=""
                                                                                    class="form-control form-control-solid"
                                                                                    placeholder="Choice Here"
                                                                                    aria-describedby="helpId">
                                                                            </div>
                                                                            <div
                                                                                class="col-md-4 col-xs-8 answer-type-wrapper">
                                                                                <div class="mb-3">
                                                                                    <label for=""
                                                                                        class="form-label">Answer
                                                                                        Type</label>
                                                                                    <select name="" id=""
                                                                                        class="form-control form-control-solid answer-type">
                                                                                        <option value="">None
                                                                                        </option>
                                                                                        <option value="text_field">Text
                                                                                            Field
                                                                                        </option>
                                                                                        <option value="mcqs">MCQs
                                                                                        </option>
                                                                                        <option value="tags">Tags
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2 col-xs-4">
                                                                                <button class="btn btn-danger mt-8"><i
                                                                                        class="bi bi-x"></i></button>
                                                                            </div>
                                                                            <div class="col-md-12 answer p-0"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="option-wrapper row">
                                                    <div class="col-md-6 col-xs-12">
                                                        <label for="" class="form-label">Choice</label>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-solid"
                                                            placeholder="Choice Here" aria-describedby="helpId">
                                                    </div>
                                                    <div class="col-md-4 col-xs-8 answer-type-wrapper">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Answer Type</label>
                                                            <select name="" id=""
                                                                class="form-control form-control-solid answer-type">
                                                                <option value="">None</option>
                                                                <option value="text_field">Text Field</option>
                                                                <option value="mcqs">MCQs</option>
                                                                <option value="tags">Tags</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-xs-4">
                                                        <button class="btn btn-danger mt-8"><i
                                                                class="bi bi-x"></i></button>
                                                    </div>
                                                    <div class="col-md-12 answer p-0"></div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>








                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
@section('jsSection')
    @include('dashboard._js')
@endsection
