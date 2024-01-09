<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
        Nhập...
        <input type="text" name="name" id="name">
    </form>
    <div class="result"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#name").keyup(function() {
            let name = $(this).val();
            $(".result").text("bạn đã nhập: " + name);
        });
    });
    </script>
</body>

</html>