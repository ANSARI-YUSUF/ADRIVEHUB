<?php
// include "p_modals.php";
include "boot.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivehub</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background: skyblue url('p/dimg.jpg') no-repeat;
            background-size: cover;
            margin: 0;
        }
        #sidebar {
            position: absolute;
            width: 300px;
            height: 100%;
            background: #000;
            left: -300px;
            transition: .4s;
            z-index: 3;
        }
        #sidebar.active {
            left: 0;
        }
        #sidebar ul {
            padding: 0;
        }
        #sidebar ul li {
            list-style: none;
            color: #fff;
            font-size: 20px;
            padding: 20px 24px;
        }
        #sidebar .toggle-btn {
            position: absolute;
            top: 30px;
            left: 330px;
            z-index: 4;
        }
        .toggle-btn span {
            width: 45px;
            height: 4px;
            background: #fff;
            display: block;
            margin-top: 6px;
        }
        .menu {
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
            overflow: auto;
            padding: 10px 20px;
            position: relative;
            z-index: 2;
        }
        .menu ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
            line-height: 40px;
            float: right;
        }
        .menu ul li {
            float: left;
            margin-right: 20px;
        }
        .menu ul li a {
            background: #142b47;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            color: #f2f2f2;
            font-size: 16px;
            font-family: sans-serif;
        }
        .menu ul li a:hover {
            color: #fff;
            opacity: 0.8;
        }
        .search-form {
            margin-top: 10px;
            float: right;
            margin-right: 40px;
        }
        .search-form input[type="text"] {
            padding: 7px;
            border: none;
            font-size: 16px;
            font-family: sans-serif;
        }
        .search-form button {
            padding: 7px;
            border: none;
            background: #4CAF50;
            color: white;
            cursor: pointer;
            font-family: sans-serif;
        }
        .search-form button:hover {
            background: white;
            color: black;
            border: 2px solid #4CAF50;
        }
        ul.accss {
            list-style-type: none;
            padding: 0;
        }
        ul.accss li {
            display: block;
            margin: 10px 0;
        }
        ul.accss li a button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition-duration: 0.4s;
        }
        ul.accss li a button:hover {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
            display: none;
        }
        /* Additional CSS for login and signup buttons */
        .menu a button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition-duration: 0.4s;
        }
        .menu a button:hover {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
        }
    </style>
</head>
<body>
    <div id="sidebar">
        <div class="toggle-btn" onclick="toggleSidebar()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="accss">
            <li><a href="about.php"><button type="button">About</button></a></li>
            <li><a href="contact.php"><button type="button">Contact Us</button></a></li>
        </ul>
    </div>
    <nav class="menu">
        <a href="login.php" style="padding-left: 60%;"><button type="button">Log-in</button></a>
        <a href="sign_in.php"><button type="button">Sign Up</button></a>   
        <form class="search-form" action="search.php" method="post">
            <input type="text" name="user_input" placeholder="Search">
            <button type="submit" value="submit" name="submit">Search</button>
        </form>
    </nav>
    <div class="overlay" onclick="toggleSidebar()"></div>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
            var overlay = document.querySelector('.overlay');
            overlay.style.display = (sidebar.classList.contains('active')) ? 'block' : 'none';
        }
    </script>
</body>
</html>
