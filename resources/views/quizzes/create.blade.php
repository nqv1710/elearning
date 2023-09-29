<x-navbar></x-navbar>
<div class="col-6 m-auto">
    {{-- @if ($errors->any())
        <div class="alert alert-danger" style="font-size: 20px;color: red;text-align: center">Dữ liệu nhập vào
            không hợp lệ</div>
    @endif --}}
    {{-- <div class="alert alert-danger">{{ $message == null ? '' : 'Thêm thành công' }}</div> --}}

    <h1 style="text-align: center">THÊM BÀI KIỂM TRA</h1>
    <form method="POST" action="{{ route('admin.quizzs.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Tiêu đề</label>
            <textarea name="content" id="editor" cols="86" rows="15">{{ old('content') }}</textarea>
            {{-- @error('content')
                <span style="color:red">{{ $message }}</span>
            @enderror --}}
        </div>

        <div class="form-group">
            <div class="col-12 col-sm-4 text-start text-sm-start">
                <label for="">Tên môn học:</label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-12 col-sm-12 text-start text-sm-start">
                <select class="custom-select form-control" id="" name="courses_id">
                    @foreach ($listCourses as $item)
                        <option value="{{ $item->id }}">{{ $item->name_course }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Đáp án A</label>
            <input type="text" class="form-control" placeholder="Đáp án A" name="title"
                value="{{ old('title') }}">
            {{-- @error('title')
                <span style="color:red">{{ $message }}</span>
            @enderror --}}
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Đáp án B</label>
            <input type="text" class="form-control" placeholder="Đáp án B" name="title"
                value="{{ old('title') }}">
            {{-- @error('title')
                <span style="color:red">{{ $message }}</span>
            @enderror --}}
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Đáp án C</label>
            <input type="text" class="form-control" placeholder="Đáp án C" name="title"
                value="{{ old('title') }}">
            {{-- @error('title')
                <span style="color:red">{{ $message }}</span>
            @enderror --}}
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Đáp án D</label>
            <input type="text" class="form-control" placeholder="Đáp án D" name="title"
                value="{{ old('title') }}">
            {{-- @error('title')
                <span style="color:red">{{ $message }}</span>
            @enderror --}}
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Đáp án đúng</label>
            <input type="text" class="form-control" placeholder="Đáp án đúng" name="title"
                value="{{ old('title') }}">
            {{-- @error('title')
                <span style="color:red">{{ $message }}</span>
            @enderror --}}
        </div>
        <div style="margin-top: 10px">
            <button type="submit" class="btn btn-primary">Thêm bài giảng</button>
            <a href="{{ route('admin.quizzs.index') }}" class="btn btn-primary">Hủy</a>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script>
    var editor = '';
    $(document).ready(function() {
        editor = CKEDITOR.replace('content');
    });
</script>
<x-footer></x-footer>
