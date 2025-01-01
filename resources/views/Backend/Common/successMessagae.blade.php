@if (session('success'))
    <div id="successSms"
        style="position: fixed; top: 100px; right: -300px; padding: 10px; background-color: #4caf50; color: white; border-radius: 5px; z-index: 1000; transition: right 0.5s ease;">
        <span id="successMessage">{{ session('success') }}</span>
    </div>

    <script>
        $(document).ready(function() {
            $('#successSms').css('right', '20px');
            setTimeout(function() {
                $('#successSms').css('right', '-500px');
            }, 3000);
        });
    </script>
@endif

@if (session('error'))
    <div id="errorSms"
        style="position: fixed; top: 100px; right: -300px; padding: 10px; background-color: #d61b1b; color: white; border-radius: 5px; z-index: 1000; transition: right 0.5s ease;">
        <span id="errorMessage">{{ session('error') }}</span>
    </div>

    <script>
        $(document).ready(function() {
            $('#errorSms').css('right', '20px');
            setTimeout(function() {
                $('#errorSms').css('right', '-500px');
            }, 3000);
        });
    </script>
@endif

@if ($errors->any())
    <div id="errorSms"
        style="position: fixed; top: 160px; right: -300px; padding: 10px; background-color: #f44336; color: white; border-radius: 5px; z-index: 1000; transition: right 0.5s ease;">
        <strong>Errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <script>
        $(document).ready(function() {
            // Slide in the error message
            $('#errorSms').css('right', '20px');

            // Set a timeout to slide the message out after 3 seconds
            setTimeout(function() {
                $('#errorSms').css('right', '-500px');
            }, 3000);
        });
    </script>
@endif


{{-- @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif --}}
