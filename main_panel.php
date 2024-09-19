<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-menu li {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-menu li:hover {
            background-color: #333; /* Change to green */
            color: white;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo">
                <img src="#" alt="Books Management System Logo">
            </div>
            <h1 class="title">Books Management  System</h1>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <h2><br><span>Welcome!<br></span></h2>
                <p>Here's a quick summary of your Books Magement system activity.</p>
            </div>
            <div class="menu-buttons">
                <ul class="nav-list">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#">
                            <i class="fas fa-boxes"></i> Book Store
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="new_stock.php">Add Book</a></li>
                            <li><a class="dropdown-item" href="update_entry.php">Update Book</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#">
                            <i class="fas fa-user"></i> Find Autor
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </main>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
