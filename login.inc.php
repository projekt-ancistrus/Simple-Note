<?php
$DisablePasswordSave = true;

?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> Login – Simple Note </title>
        
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
        
        <style type="text/css">
            .container {
                max-width: 600px;
            }
        </style>
    </head>
    
    <body>
        
        <div class="container">
            
            <div class="page-header">
                <h2> Simple Note Login </h2>
            </div>
            
<?php if (@!empty($error_message)) : ?>
            <div class="alert alert-danger" role="alert">
                <p><b>Error: Wrong password!</b></p>
            </div>
<?php endif; ?>
            <form role="form" action="./" method="POST">
                <div class="form-group">
<?php if ($DisablePasswordSave): ?>
                    <input class="form-control" type="password" placeholder="Passwort" name="password" required>
<?php else: ?>
                    <input class="form-control" type="password" placeholder="Passwort" name="password" required autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
<?php endif; ?>
                </div>
                <div class="btn-group pull-right">
                    <button class="btn btn-success" name="new" type="submit">
                        <!--<span class="glyphicon glyphicon-send"></span> -->Login
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>