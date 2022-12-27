<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
    <div class="card card-flush py-4">
        <div class="card-header">
            <div class="card-title">
                <h2>Avatar</h2>
            </div>
        </div>
        <div class="card-body text-center pt-0">
            <style>
                .image-input-placeholder {
                    background-image: url('{{ asset('assets/media/svg/files/blank-image.svg') }}');
                }

                [data-theme="dark"] .image-input-placeholder {
                    background-image: url('{{ asset('assets/media/svg/files/blank-image-dark.svg') }}');
                }
            </style>
            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                data-kt-image-input="true">
                <div class="image-input-wrapper w-150px h-150px"
                    style="background-image: url('{{ @$user ? asset('assets/media/users/profile/') . '/' . $user->image : '' }}')">
                </div>
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="avatar_remove" />
                </label>
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                    <i class="bi bi-x fs-2"></i>
                </span>
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                    <i class="bi bi-x fs-2"></i>
                </span>
            </div>
            <div class="text-muted fs-7">Set the user profile image. Only *.png, *.jpg and *.jpeg
                image files are accepted</div>
        </div>
    </div>
    <div class="card card-flush py-4">
        <div class="card-header">
            <div class="card-title">
                <h2>Status</h2>
            </div>
            <div class="card-toolbar">
                <div class="rounded-circle 
                @if (@$user->status == 'active') bg-success
                @elseif(@$user->status == 'inactive')
                bg-warning
                @else
                bg-success @endif          
                 w-15px h-15px"
                    id="status_sign">
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <select name="status" class="form-select mb-2" data-control="select2" data-hide-search="true"
                data-placeholder="Select an option" id="status" onchange="">
                <option></option>
                <option data-status-sign="bg-success" {{ @$user->status == 'active' ? 'selected' : '' }} value="active"
                    selected="selected">
                    Active</option>
                <option data-status-sign="bg-warning" {{ @$user->status == 'inactive' ? 'selected' : '' }}
                    value="inactive">Inactive</option>

            </select>
            <div class="text-muted fs-7">Set the role status.</div>

        </div>
    </div>
    <div class="card card-flush pt-4">
        <div class="card-header">
            <div class="card-title">
                <h2>Role</h2>
            </div>
        </div>
        <div class="card-body pt-0">
            <label class="form-label"></label>
            <select name="role" class="form-select mb-2" data-control="select2" data-placeholder="Select an option"
                data-allow-clear="true">
                <option></option>
                @foreach ($roles as $role)
                    <option
                        @isset($user)
                            @if (@$user->role->id == $role->id)
                                selected
                            @endif 
                            @endisset
                        value="{{ $role->uid }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
    <div class="card card-flush py-4">
        <div class="card-header">
            <div class="card-title">
                <h2>General</h2>
            </div>
        </div>
        <div class="card-body my-3">
            <div class="fv-row">
                <label class="required form-label">Name</label>
                <input type="text" name="name" value="{{ @$user->name }}" class="form-control mb-2"
                    placeholder="User name" required />
                <div class="text-muted fs-7">A user name is required.
                </div>
            </div>

        </div>
        <div class="card-body pt-0">
            <div class="fv-row">
                <label class="required form-label">Email</label>
                <input type="email" name="email" value="{{ @$user->email }}" class="form-control mb-2"
                    placeholder="User Email" required />
                <div class="text-muted fs-7">An email is required.
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="row">
                <div class="col-md-6 my-3"> <label class="required form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control mb-2"
                        placeholder="Password" @if(@$user == false) required @endif />
                    <div class="text-muted fs-7">A password is required.
                    </div>
                </div>
                <div class="col-md-6 my-3"> <label class="required form-label">Confirm Password</label>
                    <input type="password" id="co_password" name="co_password" class="form-control mb-2"
                        placeholder="Confirm Password" @if(@$user == false) required @endif />
                    <div class="text-muted fs-7">Confirm your password.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-end">
        <a href="{{ route('users.index') }}" id="kt_ecommerce_add_product_cancel"
            class="btn btn-light me-5">Cancel</a>
        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
            <span class="indicator-label">Save Changes</span>
            <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
</div>
