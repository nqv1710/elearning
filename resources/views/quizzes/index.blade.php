<x-navbar></x-navbar>
<div class="container-fluid">
    <x-navbar-quizz></x-navbar-quizz>
    <hr>
    <div class="row">
        <div class="col-12">
            {{-- <div class="alert alert-danger">{{ $message == null ? '' : 'Xóa thành công' }}</div> --}}

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tiêu đề</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listQuiz as $item)
                        <tr>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<x-footer></x-footer>
