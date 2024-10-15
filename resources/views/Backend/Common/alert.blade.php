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
                $('#errorSms').css('right', '-300px');
            }, 3000);
        });
    </script>
@endif
