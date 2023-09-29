<x-navbar></x-navbar>
<div class="container">
    <div class="breadcrumb">
        <span><a href="{{ route('admin.categories-course.index') }}">Danh mục</a></span>
        <span class="px-1">/</span>
        <span><b>Chỉnh sửa thể loại</b></span>
    </div>



    <div class="col-9 m-auto mt-4">
        <h3 style="text-align: center">CHỈNH SỬA THỂ LOẠI KHÓA HỌC</h3>
        @if ($errors->any())
            <div class="alert alert-danger" style="font-size: 20px;color: red;text-align: center">Dữ liệu nhập vào không
                hợp
            lệ</div>
        @else
            <div class="alert alert-danger" style="font-size: 20px;color: blue">{{ $message == null ? '' : 'Cập nhật thành công' }}</div>
        @endif
        <form method="POST" action="{{ route('admin.categories-course.update',$categoriesCourse->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên thể loại</label>
                <input type="text" class="form-control" name="name_category_courses" value="{{ old('name_category_courses') ?? $categoriesCourse->name_category_courses }}">
                @error('name_category_courses')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mã thể loại</label>
                <input type="text" class="form-control" name="slug" value="{{ old('slug') ?? $categoriesCourse->slug}}">
                @error('slug')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a  href="{{route('admin.categories-course.index')}}" class="btn btn-primary" >Hủy</a>

        </form>
    </div>
</div>
