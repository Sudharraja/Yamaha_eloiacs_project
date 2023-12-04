<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
<div class="col-md-2">
      <img class="img" src="img2.png" alt="" srcset="">
      
  
</div>
<div class="login-container">
    
<select id="dropdown">

<option value="login.php">account</option>
    
    <option value="login.php">Admin</option>
  
</select>



        <h1>Account Login</h1>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="👤 Enter the Username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="🔒 Enter the Password" maxlength="20" required>
        </div>
        <button id="loginBtn">LOGIN</button>
    </div>
	  
    <style>
                .img{
            width: 180px;
    margin-bottom: 450px;
    margin-right: 200px;
height: 100px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 6px -5px 4px 0px rgba(0, 0, 0, 0.25);
background-color: white;

}
           textarea {
            width: 50%;
            margin-left: 80px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: transparent;
        }
        h1{
margin-left:85px;
color: blue;

font-size: 30px;
font-style: sans-serif;;
font-weight: 700;
line-height: normal;
letter-spacing: 1.05px;
margin-top: 57px;

        }
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(228deg, #0C00A3 0%, #1F77E5 38.73%, #4DD1BF 100%);
    margin: 0;
}


.login-container {
    width: 398px;
height: 549px;
flex-shrink: 0;
border-radius: 10px;
background: #FFF;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}
.form-group {
    margin-bottom:43px;
}

label {
    display: block;
    margin-left: 30px;
    margin-top: 60px;
    font-weight: 600px;
}

input[type="text"],
input[type="password"] {
    width: 84%;
    margin-left:15px;
    padding: 16px;
    border:none;
    border-radius: 4px;
    background:transparent;
    border-bottom:1px solid #ccc;
    outline:none;
}

button {
    width: 268px;
font-size: 20px;
height: 40px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background: linear-gradient(98deg, #0C00A3 0%, #4DD0BF 100%);
color:white;
margin-left:63px;
border-radius:20px;
margin-top:5px;border:none ;
margin-top: 18px;
}

button:hover {
    background-color: #45a049;
}

    
    </style>
    <script>
document.getElementById("loginBtn").addEventListener("click", function() {
    var username = document.getElementById("username").value.trim();
    var password = document.getElementById("password").value.trim();

    if (username == "" && password == "") {
        alert("Please enter the username and Password");
        return false;
    }

    if(password.length < 6){
        alert("Please enter the Min length password");
    }
         if(username == "yamaha" && password == "123456"){
            alert("Logged in successfully");
        document.getElementById("password").value = "";
        document.getElementById("username").value = "";
        location.href = '../myProject2/accform.php';
        }
else{
alert("Please check the username and Password");
            return false;
}
    
});

    </script>
    <script>
document.getElementById("dropdown").addEventListener("change", function() {
    var selectedValue = this.value;;
    if (selectedValue) {
        window.location.href = selectedValue;
    }
});
</script>
</body>
</html>