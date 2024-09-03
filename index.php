<?php
// index.php
session_start();

if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 0;
}
$_SESSION['visits']++;

$pageTitle = "My Advanced Azure PHP App";
$message = "Hello from Azure!";

function get_server_info() {
    $server_info = [
        'Server Software' => $_SERVER['SERVER_SOFTWARE'],
        'Server Name' => $_SERVER['SERVER_NAME'],
        'Server Protocol' => $_SERVER['SERVER_PROTOCOL'],
        'PHP Version' => phpversion(),
    ];
    return $server_info;
}

$server_info = get_server_info();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($pageTitle); ?></h1>
        <p><?php echo htmlspecialchars($message); ?></p>
        <p>Current time: <?php echo date('Y-m-d H:i:s'); ?></p>
        <p>You've visited this page <?php echo $_SESSION['visits']; ?> time(s) this session.</p>

        <h2>Server Information</h2>
        <table>
            <tr>
                <th>Property</th>
                <th>Value</th>
            </tr>
            <?php foreach ($server_info as $key => $value): ?>
            <tr>
                <td><?php echo htmlspecialchars($key); ?></td>
                <td><?php echo htmlspecialchars($value); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
