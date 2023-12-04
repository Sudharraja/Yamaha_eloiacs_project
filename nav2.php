<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blank Page</title>
    <style>
    

.cust_btn{
  width: 117px;
    height: 43px;
    border-radius: 5px;
    background: linear-gradient(180deg, #1B4F76 0%, #4ED3BF 100%, #4ED3BF 100%);
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    color: white;
    font-size: 13px;
    font-weight: 500;
}
.veh_btn{
  width: 117px;
    height: 43px;
    flex-shrink: 0;
    border-radius: 5px;
    background: #FFF;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    font-size: 13px;
    font-weight: 500;
}
.logout{
  width: 117px;
    height: 43px;
    flex-shrink: 0;
    border-radius: 5px;
    background: #FFF;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    font-size: 14px;
    font-weight: 500;
}
.price{
  width: 117px;
    height: 43px;
    flex-shrink: 0;
    border-radius: 5px;
    background: #FFF;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    font-size: 14px;
    font-weight: 500;
}
.button1 {
  margin-top:21px;
  margin-left: 118px;
  width: 171px;
height: 41px;
border-radius: 10px;

box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
/* position: absolute;
left: 42px;
top: 13px; */
}
    .button1:hover{

      background: linear-gradient(180deg, #1B4F76 0%, #4ED3BF 100%, #4ED3BF 100%);
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
}
.button1:hover a{
  color: #0C00A3;
}
/* .button {
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
} */
a {
      /* color: white; */
      text-decoration: none;
    }

    </style>
</head>
<body>
  <div class="nav">

  
  
<div class="row mt-3">
  <div class="col" style="margin-left:15rem;">
  <button type="button" class="cust_btn">CUSTOMER MASTER</button>
  </div>
  <div class="col" style="margin-left: 8rem;">
  <button type="button" class="veh_btn"><a style="color:black;" href="formsix.php">VEHICLE MASTER</a></button>
  </div>
  <div class="col" style="margin-left: 8rem;">
  <button type="button" class="price"><a style="color:black;" href="main.php">PRICE MASTER</a></button>
  </div>
  <div class="col" style="margin-left: 8rem;">
  <button type="button" class="logout"><a style="color:black;" href="login.php">LOGOUT</a></button>
  </div>
</div>
</div>
</body>
</html>
