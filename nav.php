<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/cac3eb7948.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600;700&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Krub:wght@500;700&display=swap">
  <title>Showroom List</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      list-style: none;
      text-decoration: none;
    }
    /* body{
      background-color:#FBF8E7;
    } */

    .wrapper {
      display: flex;
      flex-wrap: wrap;
    }

    .wrapper .sidebar {
      position: fixed;
      top: 0;
      background: white;
      height: 100vh;
      flex-shrink: 0;
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    .wrapper .sidebar img {
      width: 160px;
      margin: 15px 40px;
      text-align: center;
      background:white;
      height: 94px;
    }
    .wrapper .sidebar ul li {
      padding: 20px 20px;
      margin-left: -1px;
      text-align: center;
      font-weight: bold;
      /* Remove border styles */
      border: none;
      color: #FFF;
      font-size: 16px;
      font-family: 'Quicksand', sans-serif;
      margin-bottom: 10px; /* Add margin to create spacing between values */
      white-space: nowrap; /* Prevent text from wrapping */
      overflow: hidden; /* Hide overflowing text */
      text-overflow: ellipsis; /* Add ellipsis for overflowing text */
    }

    .wrapper .sidebar ul li.added {
      color: black;
      /* Add background color */
      background-color: #dfdcdbad;
      /* Remove border-radius */
      border-radius: 0;
    }

    ul {
      padding: 0;
    }

    .wrapper .sidebar ul li a {
      color: white;
      text-decoration: none;
    }

    .wrapper .sidebar ul li a i {
      margin-right: 10px;
      color: white;
    }

    .wrapper .sidebar ul li:hover {
      background: #dfdcdbad;
    }

    .wrapper .sidebar p {
      padding: 20px 30px;
      text-align: center;
      font-weight: bold;
      border: 0px solid white;
      color: black; /* Change the text color to black */
      font-size: 16px;
      font-family: 'Quicksand', sans-serif;
      border-top-left-radius: 40px;
      border-bottom-left-radius: 40px;
      position: relative; /* Add this line */
    }

    /* Update the styles for the "+" icon */
    .wrapper .sidebar p span {
      display: block;
      width: 35px;
      height: 37px;
      text-align: center;
      line-height: 40px;
      background-color: blue;
      color: white;
      border-radius: 5px;
      cursor: pointer;
      margin-left: 79px;
      margin-top: 15px;
    }

    /* Add hover effect to the "+" icon */
    .wrapper .sidebar p span:hover {
      background-color: darkblue;
    }

    /* Additional styles for the new input box */
    .wrapper .sidebar .input-box {
      padding: 10px -1px;
      border: 1px solid #ccc;
      margin: 10px 20px;
      display: none; /* Initially hidden */
    }
    .wrapper .sidebar ul {
  max-height: 300px; /* Set a fixed max-height for the list */
  overflow-y: auto; /* Add vertical scrollbar when the content overflows */
}

  </style>
</head>
<body>
  <div class="wrapper">
    <div class="sidebar">
      <div class="image">
        <img src="img2.png" alt="">
      </div>

      <p>Showroom List <span id="showInput">+</span></p>

      <!-- New input box -->
      <div class="input-box">
        <input type="text" placeholder="Showroom name" id="showroomInput">
        <button id="addShowroom">Add</button>
      </div>

      <!-- Display showroom names -->
      <ul id="showroomList" class="scrollable-list">

      </ul>
    </div>
  </div>
  <script>
    // Function to load saved showroom names from localStorage
    function loadSavedShowroomNames() {
      var savedShowroomNames = JSON.parse(localStorage.getItem('showroomNames')) || [];
      var showroomList = document.getElementById('showroomList');

      savedShowroomNames.forEach(function (showroomName) {
        var listItem = document.createElement('li');
        listItem.textContent = showroomName;
        listItem.classList.add('added'); // Apply the 'added' class
        showroomList.appendChild(listItem);
      });
    }

    // JavaScript to toggle the input box visibility
    document.getElementById('showInput').addEventListener('click', function() {
      var inputBox = document.querySelector('.input-box');
      inputBox.style.display = inputBox.style.display === 'none' ? 'block' : 'none';
    });
// JavaScript to handle adding showroom names
document.getElementById('addShowroom').addEventListener('click', function() {
  var showroomInput = document.getElementById('showroomInput');
  var showroomName = showroomInput.value.trim();

  if (showroomName !== '') {
    var showroomList = document.getElementById('showroomList');
    var listItem = document.createElement('li');
    listItem.textContent = showroomName;
    listItem.classList.add('added'); // Apply the 'added' class
    showroomList.appendChild(listItem);
    showroomInput.value = ''; // Clear the input field

    // Save the showroom name to localStorage
    var savedShowroomNames = JSON.parse(localStorage.getItem('showroomNames')) || [];
    savedShowroomNames.push(showroomName);
    localStorage.setItem('showroomNames', JSON.stringify(savedShowroomNames));

    // Scroll the list to the bottom to show the new item
    showroomList.scrollTop = showroomList.scrollHeight;
  }
});


    // Load saved showroom names when the page loads
    window.addEventListener('load', loadSavedShowroomNames);
  </script>
</body>
</html>
