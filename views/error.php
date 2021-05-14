<!DOCTYPE html>
<html>
    <head>
        <title>Message d'erreurs</title>
    </head>
    <body>
        <h4 class="text-center">
            <?php
                if (isset($message)) echo $message;?>
            <br>
            <br>
            <br>
        </h4>
    </body>
</html>