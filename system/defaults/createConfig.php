<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rain Drop</title>
    <link rel="icon"
          type="image/png"
          href="/system/defaults/favicon.png">
    <style>
    body {
        margin: 0;
        background: deepskyblue;
        font-family: Helvetica;
        width: 100%;
        text-align: center;
    }
    .card {
        display: inline-block;
        position: relative;
        background: white;
        margin: 0 auto;
        padding: 20px 30px;
        border-radius: 10px;
        margin-top: 50px;
    }
    .submitButton {
        display: block;
        position: relative;
        background: deepskyblue;
        color: white;
        border: none;
        font-size: 24px;
        border-radius: 5px;
        padding: 5px 10px;
        margin: 0 auto;
    }
    .submitButton:hover {
        cursor:pointer;
        background: #55f;
    }
    .inputField {
        display: block;
        position: relative;
        font-size: 32px;
        width: 90%;
        padding: 10px 5%;
        text-align: center;
    }
    </style>
</head>
<body>
    <div class="card">
        <h1>Almost done!</h1>
        <form method='POST'>
            <input class='inputField' type='text' name='rootFolder' placeholder='root folder' />
            <input class='submitButton' type='submit' name='saveConfig' value='install' />
        </form>
    </div>
</body>
</html>