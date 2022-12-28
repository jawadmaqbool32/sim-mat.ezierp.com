@extends('layouts.basic')
@section('content')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column w-100">
                <span class="card-label fw-bold fs-3 mb-1">Accounts</span>
            </h3>
            <div class="row">
                <div class="col-md-12">
                    <x-breadcrums :links="[
                        'Home' => route('dashboard'),
                        'Accounts' => false,
                    ]" />
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                    rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <input type="text" data-table-filter="search"
                            class="form-control form-control-solid w-250px ps-15" placeholder="Search Permissions">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                    rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="5" y="5" width="5" height="5" rx="1"
                                    fill="currentColor"></rect>
                                <rect x="14" y="5" width="5" height="5" rx="1"
                                    fill="currentColor" opacity="0.3"></rect>
                                <rect x="5" y="14" width="5" height="5" rx="1"
                                    fill="currentColor" opacity="0.3"></rect>
                                <rect x="14" y="14" width="5" height="5" rx="1"
                                    fill="currentColor" opacity="0.3"></rect>
                            </g>
                        </svg>
                    </span>
                </button>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                    data-kt-menu="true" style="">
                    <div class="menu-item px-3">
                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                    </div>
                    <div class="separator mb-3 opacity-75"></div>
                    <div class="menu-item px-3 mb-3">
                        
                    </div>

                </div>
            </div>
        </div>
        <div class="card-body pt-3">
            <div class="table-responsive" id="tree_wrapper">

            </div>
        </div>
    </div>
    <x-delete url="{{ url('permissions/') }}/" />
    @include('permissions.create_modal')
    @include('permissions.edit_modal')
@endsection

@section('jsSection')
    @include('accounts._js');
@endsection
