<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blank Page</title>
    <style>
        .nav {
            font-size:13px;
            display: flex;
            flex-wrap: wrap;
            padding-left: 6px;
            margin-bottom: 17px;
            list-style: none;
            background: #49D0C3;
            width: 100%;
            height: 93px;
            flex-shrink: 0;
            position: fixed;
            margin-top:-8px;
           
        }

        .button1 {
          
            margin-top: 21px;
            margin-left: 11rem;
            width: 108px;
            height: 41px;
            border-radius: 8px;
            border: 1px solid rgba(0, 0, 0, 0.7); /* Adjust the color and opacity as needed */
        }

        .button1:hover {
          border-radius: 5px;
background: linear-gradient(180deg, #1B4F76 0%, #4ED3BF 100%, #4ED3BF 100%);
box-shadow: 0px 4px 4;
color:white;

        }

        

        .button1:hover a {
           color:white;
        }

        a {
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div>
    <div class="nav">
        <button type="button" class="button1" onclick="activateButton(this)"><a href="daybook_form.php">DAY BOOK</a></button>
        <button type="button" class="button1" onclick="activateButton(this)"><a href="daybook_form.php">PETTY CASH</a></button>
        <button type="button" class="button1" onclick="activateButton(this)"><a href="daybook_form.php">SALES ENTRY</a></button>
        <button type="button" class="button1" onclick="activateButton(this)"><a href="logout.php">LOGOUT</a></button>
    </div>
</div>
<script>
    let activeButton = null;

    function activateButton(button) {
        if (activeButton) {
            activeButton.style.background = ''; // Remove background color
        }

        button.style.background = 'linear-gradient(180deg, #1B4F76 0%, #4ED3BF 100%, #4ED3BF 100%)'; // Add background color to the clicked button
        activeButton = button;
    }
</script>

</body>
</html>
