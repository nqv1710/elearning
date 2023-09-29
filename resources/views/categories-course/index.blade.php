<x-navbar></x-navbar>
<div class="container-fluid">
    <x-navbar-categories-course></x-navbar-categories-course>
    <hr>
    <div class="row">
        <div class="col-7 m-auto">
            <div class="alert alert-primary" role="alert"
                style="background-color: rgb(0, 153, 255);font-size: 20px;text-align: center">
                {{-- {{ $message }} --}}
            </div>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên khóa học</th>
                        <th scope="col">Mã khóa học</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listCategories as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name_category_courses }}</td>
                            <td>{{ $item->slug }}</td>
                            <td style="display: flex;">
                                <a type="button" href="{{ route('admin.categories-course.show', $item->id) }}"
                                    class="btn btn-primary" style="margin-right: 5px">Edit</a>
                                <form action="{{ route('admin.categories-course.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa');"
                                        class="btn btn-danger btn-block">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<x-footer></x-footer>
