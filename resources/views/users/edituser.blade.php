<x-navbar></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper padding-112">
    <div class="breadcrumb">
        <span><a href="{{ route('admin.users.index') }}">Nhân viên</a></span>
        <span class="px-1">/</span>
        <span><b>Chỉnh sửa nhân viên</b></span>
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluided">
            <div class="row mb-2">
            </div>
        </div><!-- /.container-fluided -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluided">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        @if ($errors->any())
                            <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
                        @endif
                        <div class="card-body p-3">
                            <form action="{{ route('admin.users.update', $userDetail->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label class="required-label" for="">Họ và tên </label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Nhập họ và tên" value="{{ old('name') ?? $userDetail->name }}">
                                    @error('name')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="required-label" for="">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Nhập email"
                                        value="{{ old('email') ?? $userDetail->email }}">
                                    @error('email')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Mật khẩu</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Nhập mật khẩu mới, để trống sẽ giữ mật khẩu hiện tại"
                                        id="password" value="">
                                    @error('password')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="confirm_password">Xác nhận mật khẩu</label>
                                    <input type="password" id="confirm_password" class="form-control"
                                        name="confirm_password" id="confirm_password" placeholder="Xác nhận mật khẩu">
                                    @error('confirm_password')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="required-label" for="">Vai trò</label>
                                    <select class="form-control" name="role" id="">
                                        {{-- <option value="{{ old('role')?? $userDetail->roleid }}">Chức vụ</option> --}}
                                        {{-- @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ old('role') ?? $userDetail->roleid == $role->id ? 'selected' : false }}>
                                                {{ $role->name }}</option>
                                        @endforeach --}}
                                    </select>
                                    {{-- @error('role')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror --}}
                                </div>
                                <div class="mb-3">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phonenumber"
                                        placeholder="Nhập số điện thoại" value="{{ old('phonenumber') }}">
                                    @error('phonenumber')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="image-courses">
                                        <div class="title-edit">Hình ảnh người dùng</div>
                                        {{-- <img src="{{ asset('dist/img') }}/{{ $products->products_image }}" alt="">
                                        <input type="file" value="" name="products_img"> --}}
                                        <div class="file-upload">
                                            <div class="image-upload-wrap">
                                                <input class="file-upload-input" name="images" type='file'
                                                    onchange="readURL(this);" accept="image/*" />
                                                <img src="/img/{{ $userDetail->profile_photo_path }}" alt=""
                                                    style="width: 100px;margin-left: 50px">
                                                @error('images')
                                                    <span style="color:red">{{ $message }}</span>
                                                @enderror
                                                <div class="drag-text">
                                                    <svg width="32" height="32" viewBox="0 0 32 32"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M26.334 2.66675C26.8863 2.66675 27.334 3.11446 27.334 3.66675V9.00008C27.334 9.55237 26.8863 10.0001 26.334 10.0001C25.7817 10.0001 25.334 9.55237 25.334 9.00008V3.66675C25.334 3.11446 25.7817 2.66675 26.334 2.66675Z"
                                                            fill="#1D1C20" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M22.667 6.3335C22.667 5.78121 23.1147 5.3335 23.667 5.3335H29.0003C29.5526 5.3335 30.0003 5.78121 30.0003 6.3335C30.0003 6.88578 29.5526 7.3335 29.0003 7.3335H23.667C23.1147 7.3335 22.667 6.88578 22.667 6.3335Z"
                                                            fill="#1D1C20" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M2.66699 9.00016C2.66699 6.97454 4.30804 5.3335 6.33366 5.3335H18.3337C18.8859 5.3335 19.3337 5.78121 19.3337 6.3335C19.3337 6.88578 18.8859 7.3335 18.3337 7.3335H6.33366C5.41261 7.3335 4.66699 8.07911 4.66699 9.00016V25.0002C4.66699 25.9212 5.41261 26.6668 6.33366 26.6668H23.667C24.588 26.6668 25.3337 25.9212 25.3337 25.0002V14.3335C25.3337 13.7812 25.7814 13.3335 26.3337 13.3335C26.8859 13.3335 27.3337 13.7812 27.3337 14.3335V25.0002C27.3337 27.0258 25.6926 28.6668 23.667 28.6668H6.33366C4.30804 28.6668 2.66699 27.0258 2.66699 25.0002V9.00016Z"
                                                            fill="#1D1C20" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M17.4948 14.3081C17.3628 14.0695 17.0166 14.082 16.9015 14.3269L15.3987 17.5205C15.2578 17.82 14.9778 18.0303 14.6509 18.0823C14.324 18.1343 13.9926 18.0212 13.7657 17.7801L12.3324 16.2575C12.1834 16.0992 11.9243 16.1236 11.8076 16.3083C11.8076 16.3083 11.8077 16.3082 11.8076 16.3083L9.80248 19.4893C9.66248 19.7113 9.82099 20.0001 10.0845 20.0001H20.0739C20.3276 20.0001 20.4887 19.7274 20.3666 19.505L17.4948 14.3081ZM15.0917 13.4756C15.902 11.7527 18.3236 11.6747 19.2449 13.34L22.1171 18.5377C22.9757 20.0939 21.8493 22.0001 20.0739 22.0001H10.0845C8.24679 22.0001 7.13076 19.9768 8.11056 18.4228C8.11052 18.4229 8.1106 18.4228 8.11056 18.4228L10.1159 15.2415C10.9299 13.9516 12.743 13.7757 13.7887 14.8866C13.7886 14.8866 13.7887 14.8866 13.7887 14.8866L14.2147 15.3393L15.0917 13.4756C15.0917 13.4755 15.0917 13.4757 15.0917 13.4756Z"
                                                            fill="#1D1C20" />
                                                    </svg>
                                                    <h3>Upload</h3>
                                                </div>
                                            </div>
                                            <input class="url-img" type="hidden" value="{{ asset('/img') }}/">
                                            <div class="file-upload-content">
                                                <img class="file-upload-image" {{-- src="{{ asset('dist/img') }}/{{ $products->products_image }}" --}}
                                                    alt="Ảnh khóa học" />
                                                <div class="image-title-wrap">
                                                    <button type="button" onclick="removeUpload()"
                                                        class="remove-image btn btn-danger">Xóa ảnh</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-fixed">
                                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-default">Hủy</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
<!-- /.container-fluided -->
</section>
<!-- /.content -->
</div>
</body>

</html>
