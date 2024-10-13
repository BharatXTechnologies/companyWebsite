@if (session('success'))
    <div id="successSms"
        style="position: fixed; top: 100px; right: -300px; padding: 10px; background-color: #4caf50; color: white; border-radius: 5px; z-index: 1000; transition: right 0.5s ease;">
        <span id="successNessage">{{ session('success') }}</span>
    </div>

    <script>
        $(document).ready(function() {
            $('#successSms').css('right', '20px');
            setTimeout(function() {
                $('#successSms').css('right', '-300px');
            }, 3000);
        });
    </script>
@endif
