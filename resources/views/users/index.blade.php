<x-navbar></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluided">
            <a href="{{ route('admin.users.create') }}">
                <button type="button" class="custom-btn btn btn-primary d-flex align-items-center">
                    <svg class="mr-1" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 6C12.3879 6 12.7024 6.31446 12.7024 6.70237L12.7024 17.2976C12.7024 17.6855 12.3879 18 12 18C11.6121 18 11.2976 17.6855 11.2976 17.2976V6.70237C11.2976 6.31446 11.6121 6 12 6Z"
                            fill="#ffff" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18 12C18 12.3879 17.6855 12.7024 17.2976 12.7024H6.70237C6.31446 12.7024 6 12.3879 6 12C6 11.6121 6.31446 11.2976 6.70237 11.2976H17.2976C17.6855 11.2976 18 11.6121 18 12Z"
                            fill="#ffff" />
                    </svg>
                    <span>Thêm người dùng</span>
                </button>
            </a>
        </div>
    </section>
    <section class="content">
        <div class="container-fluided">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">
                                <input type="checkbox" name="" id="">
                                User
                            </th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usersList as $item)
                            <tr>
                                <th scope="row">
                                    <input type="checkbox" name="" id="">
                                    {{ $item->name }}
                                </th>
                                <td>
                                    {{ $item->email }}
                                </td>
                                <td></td>
                                <td>

                                    <div class="dropdown">
                                        <button class="edit-btn " type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <span class="fs-3"> ...
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu" style="max-width: 10px;">
                                            <li><a class="btn btn-primary"
                                                    href="{{ route('admin.users.edit', $item->id) }}">Edit</a>
                                            </li>
                                            <li>

                                                <form action="{{ route('admin.users.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa');"
                                                        class="btn btn-danger btn-block">Delete</button>
                                                </form>
                                            </li>
                                            </li>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.container-fluided -->
    </section>
    <!-- /.content -->
</div>
{{-- <script>
    $('#search-icon').on('click', function(e) {
        e.preventDefault();
        $('#search-filter').submit();
    });
    $('#perPage').on('change', function(e) {
        e.preventDefault();
        var perPageValue = $(this).val();
        $('#perPageinput').val(perPageValue);
        $('#search-filter').submit();
    });
    $(document).ready(function() {
        $('.status-select').change(function() {
            var newStatus = $(this).val();
            var idStatus = $(this).attr('id');
            $.ajax({
                url: '{{ route('admin.update') }}',
                type: 'GET',
                data: {
                    newStatus: newStatus,
                    idStatus: idStatus
                },
                success: function(data) {
                    alert('Cập nhật tình trạng thành công!');
                    
                }

            });
            location.reload();
        });
    });

    $('.ks-cboxtags-status li').on('click', function(event) {
        if (event.target.tagName !== 'INPUT') {
            var checkbox = $(this).find('input[type="checkbox"]');
            checkbox.prop('checked', !checkbox.prop('checked')); // Đảo ngược trạng thái checked
        }
    });
    $('.ks-cboxtags-roles li').on('click', function(event) {
        if (event.target.tagName !== 'INPUT') {
            var checkbox = $(this).find('input[type="checkbox"]');
            checkbox.prop('checked', !checkbox.prop('checked')); // Đảo ngược trạng thái checked
        }
    });
    $('#btn-status').click(function(event) {
        event.preventDefault();
        $('.btn-filter').prop('disabled', true);
        $('#status-options input').addClass('status-checkbox');
        $('#status-options').toggle();
        $('#role-options').hide();

    });

    $('#btn-name').click(function(event) {
        event.preventDefault();
        $('.btn-filter').prop('disabled', true);
        $('#name-options').toggle();
    });
    $('#cancel-name').click(function(event) {
        event.preventDefault();
        $('.btn-filter').prop('disabled', false);
        $('.name-input').val('');
        $('#name-options').hide();
    });
    $('#btn-phonenumber').click(function(event) {
        event.preventDefault();
        $('.btn-filter').prop('disabled', true);
        $('.phonenumber-input').val('');
        $('#phonenumber-options').toggle();
    });
    $('#cancel-phonenumber').click(function(event) {
        event.preventDefault();
        $('.btn-filter').prop('disabled', false);
        $('#phonenumber-options').hide();
    });
    $('#btn-email').click(function(event) {
        event.preventDefault();
        $('.btn-filter').prop('disabled', true);
        $('#email-options').toggle();
    });
    $('#cancel-email').click(function(event) {
        event.preventDefault();
        $('.btn-filter').prop('disabled', false);
        $('.email-input').val('');
        $('#email-options').hide();
    });

    $(document).ready(function() {
        $('.filter-results').on('click', '.delete-btn-name', function() {
            $('.name-input').val('');
            document.getElementById('search-filter').submit();
        });
    });
    $(document).ready(function() {
        $('.filter-results').on('click', '.delete-btn-phonenumber', function() {
            $('.phonenumber-input').val('');
            document.getElementById('search-filter').submit();
        });
    });
    $(document).ready(function() {
        $('.filter-results').on('click', '.delete-btn-email', function() {
            $('.email-input').val('');
            document.getElementById('search-filter').submit();
        });
    });


    $('#btn-roles').click(function(event) {
        event.preventDefault();
        $('.btn-filter').prop('disabled', true);
        $('#status-options input').addClass('status-checkbox');
        $('#role-options').toggle();
        $('#status-options').hide();
    });
    $('#cancel-status').click(function(event) {
        event.preventDefault();
        $('.btn-filter').prop('disabled', false);
        $('#status-options input[type="checkbox"]').prop('checked', false);
        $('#status-options').hide();
    });
    $('#cancel-roles').click(function(event) {
        event.preventDefault();
        $('.btn-filter').prop('disabled', false);
        $('#role-options input[type="checkbox"]').prop('checked', false);
        $('#role-options').hide();
    });
    $(document).ready(function() {
        // Chọn tất cả các checkbox
        $('.select-all-roles').click(function() {
            $('#role-options input[type="checkbox"]:visible').prop('checked', true);
        });

        // Hủy tất cả các checkbox
        $('.deselect-all-roles').click(function() {
            $('#role-options input[type="checkbox"]').prop('checked', false);
        });
    });
    $(document).ready(function() {
        // Chọn tất cả các checkbox
        $('.select-all').click(function() {
            $('#status-options input[type="checkbox"]:visible').prop('checked', true);
        });

        // Hủy tất cả các checkbox
        $('.deselect-all').click(function() {
            $('#status-options input[type="checkbox"]').prop('checked', false);
        });
    });

    $(document).ready(function() {
        $('.filter-results').on('click', '.delete-btn-status', function() {
            $('.deselect-all').click();
            document.getElementById('search-filter').submit();
        });
    });
    $(document).ready(function() {
        $('.filter-results').on('click', '.delete-btn-roles', function() {
            $('.deselect-all-roles').click();
            document.getElementById('search-filter').submit();
        });
    });

    $(document).ready(function() {
        // Khôi phục trạng thái icon khi tải lại trang
        restoreIconState();
        localStorage.clear();
        $('.sort-link').on('click', function() {
            var sortBy = $(this).data('sort-by');
            var sortType = $(this).data('sort-type');
            var iconId = 'icon-' + sortBy;
            var iconElement = $('#' + iconId);

            var svgHTML =
                "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>";
            if (sortType === 'desc') {
                svgHTML +=
                    "<path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 5C11.6332 5 11.7604 5.05268 11.8542 5.14645C11.948 5.24021 12.0006 5.36739 12.0006 5.5V17.293L15.1466 14.146C15.2405 14.0521 15.3679 13.9994 15.5006 13.9994C15.6334 13.9994 15.7607 14.0521 15.8546 14.146C15.9485 14.2399 16.0013 14.3672 16.0013 14.5C16.0013 14.6328 15.9485 14.7601 15.8546 14.854L11.8546 18.854C11.8082 18.9006 11.753 18.9375 11.6923 18.9627C11.6315 18.9879 11.5664 19.0009 11.5006 19.0009C11.4349 19.0009 11.3697 18.9879 11.309 18.9627C11.2483 18.9375 11.1931 18.9006 11.1466 18.854L7.14663 14.854C7.05274 14.7601 7 14.6328 7 14.5C7 14.3672 7.05274 14.2399 7.14663 14.146C7.24052 14.0521 7.36786 13.9994 7.50063 13.9994C7.63341 13.9994 7.76075 14.0521 7.85463 14.146L11.0006 17.293V5.5C11.0006 5.36739 11.0533 5.24021 11.1471 5.14645C11.2408 5.05268 11.368 5 11.5006 5Z' fill='#555555'/>";
            } else {
                svgHTML +=
                    "<path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 19.0009C11.6332 19.0009 11.7604 18.9482 11.8542 18.8544C11.948 18.7607 12.0006 18.6335 12.0006 18.5009V6.70789L15.1466 9.85489C15.2405 9.94878 15.3679 10.0015 15.5006 10.0015C15.6334 10.0015 15.7607 9.94878 15.8546 9.85489C15.9485 9.76101 16.0013 9.63367 16.0013 9.50089C16.0013 9.36812 15.9485 9.24078 15.8546 9.14689L11.8546 5.14689C11.8082 5.10033 11.753 5.06339 11.6923 5.03818C11.6315 5.01297 11.5664 5 11.5006 5C11.4349 5 11.3697 5.01297 11.309 5.03818C11.2483 5.06339 11.1931 5.10033 11.1466 5.14689L7.14663 9.14689C7.10014 9.19338 7.06327 9.24857 7.03811 9.30931C7.01295 9.37005 7 9.43515 7 9.50089C7 9.63367 7.05274 9.76101 7.14663 9.85489C7.24052 9.94878 7.36786 10.0015 7.50063 10.0015C7.63341 10.0015 7.76075 9.94878 7.85463 9.85489L11.0006 6.70789V18.5009C11.0006 18.6335 11.0533 18.7607 11.1471 18.8544C11.2408 18.9482 11.368 19.0009 11.5006 19.0009Z' fill='#555555'/>"
            }
            svgHTML += "</svg>";
            // Hiển thị icon tương ứng
            iconElement.html(svgHTML);
            // Hiển thị icon tương ứng
            iconElement.html(svgHTML);

            // Lưu trạng thái của mũi tên vào localStorage
            localStorage.setItem(iconId, svgHTML);

            // Cập nhật giá trị sort-by và sort-type
            $('#sortByInput').val(sortBy);
            $('#sortTypeInput').val(sortType);
        });

        function restoreIconState() {
            // Khôi phục trạng thái của mũi tên từ localStorage
            $('.icon').each(function() {
                var iconId = $(this).attr('id');
                var iconHTML = localStorage.getItem(iconId);
                if (iconHTML) {
                    $(this).html(iconHTML);
                }
            });
        }
    });

    // Xóa tất cả các dữ liệu trong Local Storage
    $('.delete-filter').on('click', function() {
        localStorage.clear();
    });

    function updateDeleteItemValue(label) {
        document.getElementById('delete-item-input').value = label;
    }

    //Xử lí tìm kiếm bộ lọc tổng
    function filterFunction() {
        var input = $("#myInput");
        var filter = input.val().toUpperCase();
        var buttons = $("#dropdown-menu button");

        buttons.each(function() {
            var text = $(this).text();
            if (text.toUpperCase().indexOf(filter) > -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    function filterRoles() {
        var input = $("#myInput-roles");
        var filter = input.val().toUpperCase();
        var buttons = $(".ks-cboxtags-roles li");

        buttons.each(function() {
            var text = $(this).text();
            if (text.toUpperCase().indexOf(filter) > -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    // AJAX disable user
    $(document).on('click', '#disableStatusUser', function(e) {
        e.preventDefault();
        if (myFunctionCancel()) {
            const list_id = [];
            $('input[name="ids[]"]').each(function() {
                if ($(this).is(':checked')) {
                    var value = $(this).val();
                    list_id.push(value);
                }
            });
            $.ajax({
                url: "{{ route('admin.disableStatusUser') }}",
                type: "get",
                data: {
                    list_id: list_id,
                },
                success: function(data) {
                    location.reload();
                }
            })
        }
    })
    // AJAX disable user
    $(document).on('click', '#activeStatusUser', function(e) {
            e.preventDefault();
            if (myFunctionCancel()) {
                const list_id = [];
                $('input[name="ids[]"]').each(function() {
                    if ($(this).is(':checked')) {
                        var value = $(this).val();
                        list_id.push(value);
                    }
                });
                $.ajax({
                    url: '{{ route('admin.activeStatusUser') }}',
                    type: "GET",
                    data: {
                        list_id: list_id,
                    },
                    success: function(data) {
                        location.reload();
                    },
                })
            }
        }

    )

    function myFunction() {
        let text = "Bạn có muốn xóa nhân viên đã chọn không?";
        if (confirm(text) == true) {
            return true
        } else {
            return false
        }

    }

    function myFunctionCancel() {
        let text = "Bạn có chắc chắn thay đổi trạng thái đã chọn không?";
        if (confirm(text) == true) {
            return true
        } else {
            return false
        }

    }

    // AJAX Xóa Exports
    $(document).on('click', '#deleteListUser', function(e) {
        e.preventDefault();
        if (myFunction()) {
            const list_id = [];
            $('input[name="ids[]"]').each(function() {
                if ($(this).is(':checked')) {
                    var value = $(this).val();
                    list_id.push(value);
                }
            });
            $.ajax({
                url: "{{ route('admin.deleteListUser') }}",
                type: "get",
                data: {
                    list_id: list_id,
                },
                success: function(data) {
                    if (data.success == true) {
                        var id = data.ids;
                        for (let i = 0; i < id.length; i++) {
                            $('.' + id[i]).remove();
                        }
                        updateMultipleActionVisibility();
                        location.reload();
                    } else {
                        location.reload();
                    }
                }

            })
        }
    })

    // Checkbox
    $('#checkall').change(function() {
        $('.cb-element').prop('checked', this.checked);
        updateMultipleActionVisibility();
    });

    $('.cb-element').change(function() {
        updateMultipleActionVisibility();
        if ($('.cb-element:checked').length == $('.cb-element').length) {
            $('#checkall').prop('checked', true);
        } else {
            $('#checkall').prop('checked', false);
        }
    });


    $(document).on('click', '.cancal_action', function(e) {
        e.preventDefault();
        $('.cb-element:checked').prop('checked', false);
        $('#checkall').prop('checked', false);
        updateMultipleActionVisibility()
    })

    function updateMultipleActionVisibility() {
        if ($('.cb-element:checked').length > 0) {
            $('.multiple_action').show();
            $('.count_checkbox').text('Đã chọn ' + $('.cb-element:checked').length);
        } else {
            $('.multiple_action').hide();
        }
    }

    function toggleCheckbox(checkboxId) {
        var checkbox = document.getElementById(checkboxId);
        if (checkbox) {
            checkbox.checked = !checkbox.checked; // Đảo ngược trạng thái của checkbox
        }
    }

    function triggerChange(checkboxId) {
        var checkbox = document.getElementById(checkboxId);
        if (checkbox) {
            var event = new Event('change', {
                bubbles: true,
                cancelable: true,
            });
            checkbox.dispatchEvent(event);
        }
    }

    function handleRowClick(checkboxId, event) {
        // Lấy target của sự kiện click
        var target = event.target;

        // Kiểm tra nếu target không có class "dropdown"
        if (!target.closest('.dropdown') && !target.closest('.editEx')) {
            var checkbox = document.getElementById(checkboxId);
            if (checkbox) {
                toggleCheckbox(checkboxId); // Thay đổi trạng thái checkbox
                triggerChange(checkboxId); // Kích hoạt sự kiện change của checkbox
            }
        }
    }
</script> --}}
</body>

</html>

<x-footer></x-footer>
