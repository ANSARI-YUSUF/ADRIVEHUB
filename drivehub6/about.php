<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Drivehub</title>
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: skyblue;
            margin: 0;
            padding: 0;
            color: white;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        h1, h2, h3 {
            text-align: center;
            color: orange;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
        }

        ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        a {
            color: orange;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>About Drivehub</h1>

        <h2>Purpose and Features</h2>
        <p>
            Drivehub provides users with a 300MB storage space, where each file should not exceed 200KB. Supported file types include PDF and JPG/PNG formats. Users can create accounts, upload, manage, and share files securely. Drivehub facilitates easy access to other user files, profile browsing, group creation, and file sharing functionalities.
        </p>

        <h2>User Management</h2>
        <p>
            Drivehub implements user authentication mechanisms for secure account access. Features include user registration, login, profile management, and password recovery.
        </p>

        <h2>File Management</h2>
        <p>
            Users can create, insert, update, and delete files and folders within their accounts. Drivehub allows viewing and accessing shared files based on access permissions set by file owners.
        </p>

        <h2>Session Management</h2>
        <p>
            Session management ensures secure user interaction with the application. Sessions are associated with unique identifiers (SessionID), user IDs, tokens for identification, and expiration dates to control session duration and mitigate security risks.
        </p>

        <h2>Database Schema</h2>
        <p>
            Drivehub's database schema consists of tables representing users, roles, permissions, sessions, groups, files, shared files, and notifications. Key relationships exist between these entities to manage user interactions and file sharing effectively.
        </p>
        
        <p>
            For more information, please visit our <a href="index.php">website</a>.
        </p>
    </div>
</body>
</html>
