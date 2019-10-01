<!DOCTYPE html>
<html>

<head>
    <title>
        Staff Only
    </title>
    <link rel="stylesheet" type="text/css" href="../css/button.css">
    <link rel="stylesheet" type="text/css" href="../css/background.css">
    <link rel="stylesheet" type="text/css" href="../css/stafflogin.css">
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="../js/staffLogin.js"></script>
</head>

<body>
    <img src="../images/login1.jpg" id="background" />
    <div id="hotel" onclick="location='../index.php'">Sunny Isle</div>
    <div id="divForTable">
        <table border="0" id="loginTable">
            <tr>
                <th id="login">
                    <strong>Staff Only</strong>
                    <br>
                    <span id="loginHint"></span>
                    <br>
                </th>
            </tr>
            <tr>
                <td>
                    Staff Username:<br><input type="text" id="username" class="inputBox" /> <br><span id="usernameHint" class="hint"></span> <br />
                </td>
            </tr>
            <tr>
                <td>
                    Staff Password:<br> <input type="password" id="password" class="inputBox" /> <br><span id="passwordHint" class="hint"></span> <br />
                </td>
            </tr>
        </table>
        <br>
        <div id="divForButton">
            <input type="button" value="Login" onclick="staffLogin()" class="button" />&nbsp
            <a href="../index.php"><button>Home</button></a>&nbsp
            <a href="../html/login.html"><button>Return</button></a>
        </div>

    </div>
</body>

</html>