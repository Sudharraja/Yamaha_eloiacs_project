<?php
// Get the current page URL
$current_page = basename($_SERVER['PHP_SELF']);

// Define a CSS class for the "DAY BOOK" button
$daybook_button_class = '';

// Define an array of page names where you want to highlight the button
$highlight_pages = ['daybook_form.php', 'daybook_save.php', 'daybook_edit.php'];

// Check if the current page is in the array of highlight pages
if (in_array($current_page, $highlight_pages)) {
    // If it's one of the highlight pages, add a class to change the button color to red
    $daybook_button_class = 'active-button';
}
?>




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
            margin-top:-10px;
           
        }
         a{
            color:white;
        }

        .button1 {
          
            margin-top: 21px;
            margin-left: 11rem;
            width: 108px;
            height: 41px;
            border-radius: 8px;
            border: none;
            color:white;
        }
        .petty {
          
          margin-top: 21px;
          margin-left: 11rem;
          width: 108px; 
          height: 41px;
          border-radius: 8px;
          border: none;
          color: white; /* Add this line to set text color to white */  
      }
      .petty:hover {
          border-radius: 5px;
background: linear-gradient(180deg, #1B4F76 0%, #4ED3BF 100%, #4ED3BF 100%);
box-shadow: 0px 4px 4;
color:white;
}



.button1:hover,
.petty:hover {
    border-radius: 5px;
    background: linear-gradient(180deg, #1B4F76 0%, #4ED3BF 100%, #4ED3BF 100%);
    box-shadow: 0px 4px 4;
    color: white; /* Set text color to white when hovering */
}

/* Remove the color property from the "a" elements when hovering over buttons */
.button1:hover a,
.petty:hover a {
    color: inherit; /* Inherit text color from the parent button when hovering */
}

        a {
            color: black;
            text-decoration: none;
        }

        .toggle-button {
            display: none; /* Hide the toggle button by default */
            border:none;
            width:50px;
            height:40px;
            margin-top:35px;
            margin-left:10px;
        }



        /* Add this style to your CSS */
.active-button {
    background: linear-gradient(180deg, #1B4F76 0%, #4ED3BF 100%, #4ED3BF 100%);
    color: white;
    /* Add any other styles you want for the active button */
}




        

        @media (min-width: 768px) and (max-width: 1177px) {
            .nav {
                /* width: 69.3pc; */
                background: none;
            }

            .toggle-button {
                display: block; /* Display the toggle button within this media query */
            }

            /* Hide the buttons */
            .button1,
            .petty {
                display: none;
            }

             /* Display the buttons when the toggle button is clicked */
             .show-buttons .button1,
            .show-buttons .petty {
                display: inline-block;
                margin-left: 57px;
    margin-top: 34px;
            }

            /* Show the background color when buttons are displayed */
            .nav.show-buttons {
                background: #49D0C3;
            }


        }


        
        @media (min-width: 380px) and  (max-width: 767px) { /* Updated the media query for screens below 480px */
            .nav {
                /* width: 58pc; */
                background: none;
            }

            /* Hide the buttons */
            .button1,
            .petty {
                display: none;
            }

            .toggle-button {
                display: block; /* Display the toggle button within this media query */
            }

             /* Display the buttons when the toggle button is clicked */
             .show-buttons .button1,
            .show-buttons .petty {
                display: inline-block; /* Display buttons in a straight line */
                margin-left: 58px;
    margin-top: 34px;
            }

            /* Show the background color when buttons are displayed */
            .nav.show-buttons {
                background: #49D0C3;
            }
/* .button2{
    width: 120px;
    margin-left: 19rem;
}  */
        }
    </style>
</head>
<body>
<div>
    <div class="nav">
    <button class="toggle-button" onclick="toggleNavButtons()">&#9776;</button>

    <button type="button" class="button1 <?php echo $daybook_button_class; ?>" onclick="activateButton(this)"><a href="daybook_form.php" style="color:white; font-weight:bold;">DAY BOOK</a></button>

        <button type="button" class="petty" onclick="activateButton(this)"><a href="">PETTY CASH</a></button>
        <button type="button" class="button1" onclick="activateButton(this)"><a href="login.php">SALES ENTRY</a></button>
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

    function toggleNavButtons() {
        const nav = document.querySelector('.nav');
        nav.classList.toggle('show-buttons');
    }
</script>

</body>
</html>
