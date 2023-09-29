<x-navbar></x-navbar>
<div class="container-fluid">
    <x-navbar-lessons></x-navbar-lessons>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">{{ $message == null ? '' : 'Xóa thành công' }}</div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tiêu đề</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    @if (isset($listLessons))

                        @foreach ($listLessons as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    <a href="#">
                                        {{ $item->title }}
                                    </a>
                                </td>

                                <td style="display: flex">
                                    <a href="{{ route('admin.lessons.show', $item->id) }}" class="btn btn-primary"
                                        style="margin-right: 5px">Edit</a>
                                    <form action="{{ route('admin.lessons.destroy', $item->id) }}" method="POST">
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
