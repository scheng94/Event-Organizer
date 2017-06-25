<?php

function generatePage($body, $title="") {
    $page = <<<EOPAGE
<!doctype html>
<html>
    <head> 
        <meta charset="utf-8" />
        <title>$title</title>	
    </head>
            
    <body>
        <h1>$title</h1>
            $body
    </body>
</html>
EOPAGE;

    return $page;
}
?>