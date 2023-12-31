<x-navbar></x-navbar>
<div class="container-fluid">
    <x-navbar-course></x-navbar-course>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">{{ $message == null ? '' : 'Xóa thành công' }}</div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên khóa học</th>
                        <th scope="col">Mô tả</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    @if (isset($courses))

                        @foreach ($courses as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    <img src="/img/{{ $item->image }}"alt="" style="width: 130px;height:30px;">
                                </td>
                                <td>
                                    <a href="#">
                                        {{ $item->name_course }}
                                    </a>
                                </td>
                                <td>
                                    {{ $item->description }}
                                </td>
                                <td style="display: flex">
                                    <a href="{{route('admin.courses.show',$item->id)}}" class="btn btn-primary"
                                        style="margin-right: 5px">Edit</a>
                                    <form action="{{ route('admin.courses.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa');"
                                            class="btn btn-danger btn-block">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<x-footer></x-footer>
