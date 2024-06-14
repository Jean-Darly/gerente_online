<!-- resources/views/layouts/layout.blade.php -->
<!DOCTYPE html>
<html>

@include('layouts.head')


<body class="d-flex flex-column">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var alertMessage = "{{ session('success') }}";
            var alertDiv = document.getElementById('alert-message');
            var alertContent = document.getElementById('alert-content');

            if (alertMessage) {
                alertDiv.classList.remove('d-none');
                alertDiv.classList.add('alert-success');
                alertContent.innerText = alertMessage;
            }

            var errorMessage = "{{ session('error') }}";
            if (errorMessage) {
                alertDiv.classList.remove('d-none');
                alertDiv.classList.add('alert-danger');
                alertContent.innerText = errorMessage;
            }
        });
        document.querySelectorAll('.close').forEach(function (element) {
            element.addEventListener('click', function () {
                var alert = this.closest('.alert');
                if (alert) {
                    alert.classList.add('d-none');
                }
            });
        });


    </script>
    <main class="main bg-light p-0 flex-grow-1">
        @include('layouts.main')
    </main>
    <footer class="bg-dark text-white p-3 text-center">
        <div class="container">
            <span class="text-muted">
                @include('layouts.footer')
            </span>
        </div>
    </footer>
</body>

</html>