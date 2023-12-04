<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blank Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .nav {
    background-color: #45dfdf;
    height: 11vh;
}
.button1 {
    width: 127px;
    height: 34px;
    flex-shrink: 0;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    background-color: #00cbaf;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    margin-top: 15px;
    color: white;
    margin-left: 225px;
}
    .button1:hover{

background-color:white;
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
}
.button1:hover a{
  color: #0C00A3;
}
.button {
    width: 127px;
    height: 34px;
    flex-shrink: 0;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    background-color: #00cbaf;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    margin-top: 15px;
    color: white;
    margin-left: 44%;
}
    .button:hover{

background-color:white;
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
}
.button:hover a{
  color: #0C00A3;
}
a {
      color: white;
      text-decoration: none;
    }

    </style>
</head>
<body>
<div>
    <div class="nav">
    <button type="button" class="button1"><a href="cmform.php">Customer Master</a></button>
    <button type="button" class="button"><a href="logout.php">Logout</a></button></div>
</body>
</html>
