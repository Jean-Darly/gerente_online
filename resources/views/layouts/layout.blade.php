<!-- resources/views/layouts/layout.blade.php -->
<!DOCTYPE html>
<html>
@include('layouts.head')

<body>
    <div class="container mt-4">
        <div id="alert-message" class="alert alert-dismissible fade show d-none" role="alert">
            <strong id="alert-content"></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

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
    @include('layouts.main')
    @include('layouts.footer')
</body>

</html>