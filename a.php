<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>page</h1>
    <script>
        let xhr = new XMLHttpRequest();
        xhr.open('GET' , 'http://localhost/assetpro/asset/getAllAssets/shared');
        xhr.onload = function(){
            console.log(this.responseText);
        }
        xhr.send();
    </script>
</body>
</html>