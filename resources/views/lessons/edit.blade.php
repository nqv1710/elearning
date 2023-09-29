<x-navbar></x-navbar>
<div class="col-6 m-auto">
    @if ($errors->any())
        <div class="alert alert-danger" style="font-size: 20px;color: red;text-align: center">Dữ liệu nhập vào
            không hợp lệ</div>
    @endif
    <div class="alert alert-danger">{{ $message == null ? '' : 'Cập nhật thành công' }}</div>

    <h1 style="text-align: center">CHỈNH SỬA BÀI GIẢNG</h1>
    <form method="post" action="{{ route('admin.lessons.update', $lesson->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Tiêu đề</label>
            <input type="text" class="form-control" placeholder="Tiêu đề" name="title"
                value="{{ old('title') ?? $lesson->title }}">
            @error('title')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <div class="col-12 col-sm-4 text-start text-sm-start">
                <label for="">Tên khóa học:</label>
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
            <label for="exampleInputEmail1">Nội dung</label>
            <textarea name="content" id="content" cols="86" rows="15">{{ $lesson->content }}</textarea>
            @error('content')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div style="margin-top: 10px">
            <button type="submit" class="btn btn-primary">Cập nhật bài giảng</button>
            <a href="{{ route('admin.lessons.index') }}" class="btn btn-primary">Hủy</a>
        </div>

    </form>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        var editor = '';
        editor = CKEDITOR.replace('content');
    });
</script>
<x-footer></x-footer>
