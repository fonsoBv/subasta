<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>alertify.js - example page</title>
    <link rel="stylesheet" href="./alertify.core.css" />
    <link rel="stylesheet" href="./alertify.default.css" id="toggleCSS" />
    <meta name="viewport" content="width=device-width">
</head>
<body>
    <h2>Logs</h2>
    <a href="#" id="notification">Standard Log</a><br>
    <a href="#" id="success">Success Log</a><br>
    <a href="#" id="error">Error Log</a><br>

    <script src="../js/jquery-1.11.0.min.js"></script>
    <script src="./alertify.min.js"></script>
    <script>
        function reset () {
            $("#toggleCSS").attr("href", "./alertify.default.css");
            alertify.set({
                labels : {
                    ok     : "OK",
                    cancel : "Cancel"
                },
                delay : 5000,
                buttonReverse : false,
                buttonFocus   : "ok"
            });
        }

        // ==============================
        // Standard Dialogs
        $("#notification").on( 'click', function () {
            reset();
            alertify.log("Standard log message");
            return false;
        });

        $("#success").on( 'click', function () {
            reset();
            alertify.success("Success log message");
            return false;
        });

        $("#error").on( 'click', function () {
            reset();
            alertify.error("Error log message");
            return false;
        });
    </script>

</body>
</html>