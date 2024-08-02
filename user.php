<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
	header("location:login.php");
	exit();
}
?>
<?php include_once "header.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Realtime Chat App</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <style>
    /* Custom styles */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    .wrapper {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .users {
        padding: 20px;
        border-bottom: 1px solid #ddd;
    }

    .users header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        border-bottom: 1px solid #ddd;
        background-color: #f8f9fa;
    }

    .users header .content {
        display: flex;
        align-items: center;
    }

    .users header img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 15px;
    }

    .users header .details {
        font-size: 16px;
        font-weight: 600;
    }

    .users header .details span {
        display: block;
        font-size: 18px;
        font-weight: 600;
        color: #333;
    }

    .users header .details p {
        color: #28a745;
        margin: 5px 0 0;
    }

    .logout {
        color: #dc3545;
        text-decoration: none;
        font-weight: 600;
        font-size: 16px;
    }

    .search {
        padding: 20px;
        border-bottom: 1px solid #ddd;
        display: flex;
        align-items: center;
    }

    .search .test {
        font-size: 16px;
        color: #777;
        margin-right: 10px;
    }

    .search input[type="text"] {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        flex: 1;
    }

    .search button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        margin-left: 10px;
    }

    .search button:hover {
        background-color: #0056b3;
    }

    .users-list {
        padding: 20px;
    }

    .users-list .user {
        display: flex;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .users-list .user img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .users-list .user .user-details {
        flex: 1;
    }

    .users-list .user .user-details .username {
        font-size: 16px;
        font-weight: 600;
        color: #333;
    }

    .users-list .user .user-details .status {
        font-size: 14px;
        color: #28a745;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <?php
					$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
					if (mysqli_num_rows($sql) > 0) {
						$row = mysqli_fetch_assoc($sql);
					}
					?>
                    <img src="php/images/<?php echo $row['img']; ?>" alt="User Image">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="test">Select a user to start</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                <!-- Example user list item -->
                <div class="user">
                    <img src="php/images/<?php echo $row['img']; ?>" alt="User Image">
                    <div class="user-details">
                        <div class="username"><?php echo $row['fname'] . " " . $row['lname']; ?></div>
                        <div class="status">Online</div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="js/users.js"></script>
</body>

</html>