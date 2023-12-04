
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
  <title>nav</title>
 
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      list-style: none;
      text-decoration: none;
    }

    .wrapper {
      display: flex;
      flex-wrap: wrap;
    }

    .wrapper .sidebar {
      position: fixed;
      top: 0;
      background: linear-gradient(180deg, #1c0d8f, #ef1f33);
      width: 242px;
      height: 100vh;
      flex-shrink: 0;
    }

    .wrapper .sidebar img {
      width: 160px;
      margin: 30px 41px;
      text-align: center;
    }

    .wrapper .sidebar ul li {
      padding: 25px;
      margin-left: -1px;
      text-align: center;
      font-weight: bold;
      border: 1px solid white;
      color: #FFF;
      font-size: 18px;
      font-family: 'Quicksand', sans-serif;
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

    .wrapper .sidebar ul li:hover a {
      color: #240ec9;
    }

    .wrapper .sidebar ul li:hover a i {
      color: #240ec9;
    }

    .wrapper .sidebar ul li.active {
      background-color: white;
    }

    .wrapper .sidebar ul li.active a,
    .wrapper .sidebar ul li.active a i {
      font-size: 19px;
      color: #240ec9; 
    }

    ul {
      padding: 0;
    }

    /* Media queries for responsiveness */
    @media (max-width: 767px) {
      .wrapper .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .wrapper .sidebar img {
        margin: 20px auto;
      }

      .wrapper .sidebar ul li {
        border: none;
        margin-bottom: 5px;
      }

      .wrapper .sidebar ul li.active a,
      .wrapper .sidebar ul li.active a i {
        font-size: 16px;
      }
    }

    .slide-container {
      position: absolute;
      top: 50%;
      right: 15px;
      transform: translate(0, -50%);
    }

    .slide {
      position: relative;
      display: none;
      width: 40px;
      height: 20px;
      border-radius: 10px;
      background-color: #ccc;
      cursor: pointer;
    }

    .slide:before {
      content: '';
      position: absolute;
      top: 2px;
      left: 2px;
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background-color: #fff;
      transition: 0.4s;
    }

    .slide.on {
      background-color: #5fd65f;
    }

    .slide.on:before {
      transform: translateX(20px);
    }

    .slide.off:before {
      transform: translateX(0);
    }

    .wrapper .sidebar ul {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .wrapper .sidebar ul li {
      width: 100%;
      text-align: center;
    }

    .wrapper .sidebar ul li a {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }
    .hidden{
      display:none;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="sidebar">
      <div class="image">
        <img src="./Attributes/yamaha.jpg" alt="">
      </div>
      <div class="slide-container">                                                           
        <div class="slide" onclick="toggleSidebar()"></div>
      </div>
      <ul id="sidebarMenu">
  <li onclick="changeColor(event, this)">
    <a href="yamaha_payslip.php">
      <i class="fa fa-users"></i>
      <span class="nav_contents">ADD EMPLOYEE</span>         
    </a>
  </li>

  <li onclick="changeColor(event, this)">
    <a href="yamaha_salary_days_count.php">
      <i class="fa fa-credit-card"></i>
      <span class="nav_contents">ADD EMPLOYEE SALARY</span>
    </a>
  </li>
   <li onclick="changeColor(event, this)">
    <a href="yamaha_emp_payslip.php">
      <i class="fa fa-file-text"></i>
      <span class="nav_contents">PAYSLIP</span>
    </a>
  </li>
    <li onclick="changeColor(event, this)">
    <a href="index.php">
      <i class="fa fa-sign-out"></i>
      <span class="nav_contents">LOGOUT</span>
    </a>
  </li>
 
 
</ul>
    </div>
  </div>

</body>
</html>