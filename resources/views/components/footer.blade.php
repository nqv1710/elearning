<footer class="py-4 bg-light mt-auto">

</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    window.addEventListener('DOMContentLoaded', event => {
        const sidebarToggle = document.body.querySelector('#sidebarToggle');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', event => {
                event.preventDefault();
                document.body.classList.toggle('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains(
                    'sb-sidenav-toggled'));
            });
        }

    });
    $(document).ready(function() {
        setTimeout(function() {
            $('#notification').fadeOut('slow', function() {
                $(this).remove();
            });
        }, 4000);
    });
    $(document).ready(function() {
        $('.profile-li, .logout-li').on('click', function(event) {
            var link = $(this).find('a');
            var form = $(this).find('form');
            if (link.length > 0 && link.attr('href') !== '#') {
                window.location.href = link.attr('href');
            } else if (form.length > 0) {
                event.preventDefault();
                form.submit();
            }
        });
    });
</script>
</body>

</html>
