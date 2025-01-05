<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .admin-dashboard {
            background-color: #ffffff;
            width: 400px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
        }

        .admin-dashboard:hover {
            transform: translateY(-5px);
        }

        h1 {
            font-size: 24px;
            color: #333333;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #777777;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            background-color: #4caf50;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #388e3c;
        }

        .btn:active {
            background-color: #2e7d32;
            transform: translateY(2px);
        }

        .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="admin-dashboard fade-in">
        <h1>Welcome, Admin!</h1>
        <p>View and manage all your tasks and reports below.</p>
        <a href="admin_display.php" class="btn">Show All Products in November</a>

<a href="add_items.php" class="btn">Upload New Items</a>

<a href="main_page/index.php" class="btn">MainPage</a>
    </div>

</body>
</html>