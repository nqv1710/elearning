<x-navbar></x-navbar>
<div class="container-fluid">
    {{-- <x-navbar-course></x-navbar-course> --}}
    <div class="col-12 py-3">
        <a class="btn btn-primary" href="{{ route('admin.courses.index') }}">Khóa học</a>
        <a class="btn btn-outline-info" href="{{ route('admin.categories-course.index') }}">Danh mục</a>
    </div>
    <h5>Chỉnh sửa khóa học</h5>
    <hr>
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger" style="font-size: 20px;color: red;text-align: center">Dữ liệu nhập vào
                    không hợp lệ</div>
            @endif
            <div class="alert alert-danger">{{ $message == null ? '' : 'Cập nhật thành công' }}</div>

            <form action="{{ route('admin.courses.update', $courses->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="image-courses">
                            <div class="title-edit">Hình ảnh khóa học</div>
                            <div class="file-upload">
                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" name="image" type='file'
                                        value="img/{{ $courses->image }}" onchange="readURL(this);" accept="image/*" />
                                    <img src="/img/{{ $courses->image }}" value="{{old('image')}}" alt=""
                                        style="width: 200px;margin-left: 50px">
                            
                                    <div class="drag-text">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
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
                                    <img class="file-upload-image" {{-- src="{{ asset('dist/img') }}/{{ $products->products_image }}" --}} alt="Ảnh khóa học" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()"
                                            class="remove-image btn btn-danger">Xóa ảnh</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-8">
                        <div class="row">
                            <div class="col-12 col-sm-4 text-start text-sm-start">
                                <label for="">Tên khóa học:</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 text-start text-sm-start">
                                <input class="w-50 form-control" type="text" name="name_course"
                                    value="{{ old('name_course') ?? $courses->name_course }}">
                            </div>
                            @error('name_course')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4 text-start text-sm-start">
                                <label for="">Danh mục:</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 text-start text-sm-start">
                                <select class="custom-select w-50 form-control" id="" name="category_id">
                                    @foreach ($cate as $item)
                                        <option value="{{ $item->id }}">{{ $item->name_category_courses }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4 text-start text-sm-start">
                                <label for="">Mô tả khóa học:</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 text-start text-sm-start">
                                <textarea class="w-50 form-control" name="description" id="description" cols="30" rows="8">{{ $courses->description }}</textarea>
                                @error('description')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-sm-flex justify-content-sm-center d-grid mx-auto">
                        <div class="btn-fixed">
                            <button class="btn btn-primary me-1" type="submit">
                                <span>Cập nhật</span>
                            </button>
                            <a href="{{ route('admin.courses.index') }}" class="btn btn-warning"
                                onclick="return confirm('Bạn có muốn rời khỏi trang ?');">Quay lại</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.image-upload-wrap').hide();
                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
        $('.file-upload-image').removeAttr('src');
    }
    $('.image-upload-wrap').bind('dragover', function() {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function() {
        $('.image-upload-wrap').removeClass('image-dropping');
    });
</script>
<x-footer></x-footer>
