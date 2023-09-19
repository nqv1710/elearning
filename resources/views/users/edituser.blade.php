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
                            <form action="{{ route('admin.users.update', ['user' => $userDetail->id]) }}" method="post">
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
                                    @error('role')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phonenumber"
                                        placeholder="Nhập số điện thoại" value="{{ old('phonenumber') }}">
                                    @error('phonenumber')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="btn-fixed">
                                    <button type="submit"
                                        formaction="{{ route('admin.users.update', ['user' => $userDetail->id]) }}"
                                        class="btn btn-primary">Cập Nhật</button>
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
