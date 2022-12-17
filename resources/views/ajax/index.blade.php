<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 8 Ajax Request example</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('homepage/css/bootstrap.min.css') }}">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body>
        <div class="container-sm mt-5">
            <div class="my-5">
                <h1 class="text-muted">Request Ajax</h1>
            </div>
            <form action="{{ route('postData') }}" method="post">
                <input type="hidden" name="nickname" value="Hello World" id="input">
                @csrf
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <script src="{{ asset('homepage/js/jquery.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var txt = $('#input').val();
                
                $('.btn').click(function() {
                    $.ajax({
                        method: 'POST',
                        url: "/post",
                        data: {
                            id: 1
                        }
                    });
                    console.log('ok');
                });
            });
        </script>
    </body>
</html>
