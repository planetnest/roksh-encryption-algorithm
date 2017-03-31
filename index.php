<?php

    require_once "roksh.crypto.php";

    $story = <<<APPLE
Once upon a time, there was a beautiful girl named Cinderella. She lived with her wicked stepmother and two stepsisters. They treated Cinderella very badly. One day, they were invited for a grand ball in the king’s palace. But Cinderella’s stepmother would not let her go. Cinderella was made to sew new party gowns for her stepmother and stepsisters, and curl their hair. They then went to the ball, leaving Cinderella alone at home.
APPLE;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Roksh Encryption Algorithm - Devcrib</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://bootswatch.com/simplex/bootstrap.min.css">
</head>
<body>

    <div class="container">

        <h1 class="title">Roksh Encryption Algorithm - Devcrib</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Plain text</h3>
                    </div>
                    <div class="panel-body">
                        <?= $story ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Encrypted</h3>
                    </div>
                    <div class="panel-body" style="overflow-x:auto">
                        <? encrypt($story); echo $story ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Decrypted</h3>
                    </div>
                    <div class="panel-body">
                        <? decrypt($story); echo $story ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
