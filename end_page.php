<?php
// Retrieve data from query parameters
$name = $_GET['name'] ?? 'N/A';
$phone = $_GET['phone'] ?? 'N/A';
$villa = $_GET['villa'] ?? 'N/A';
$combo = (int)($_GET['combo'] ?? 0);
$aloo = (int)($_GET['aloo'] ?? 0);
$paneer = (int)($_GET['paneer'] ?? 0);
$halwa = (int)($_GET['halwa'] ?? 0);
$chaas = (int)($_GET['chaas'] ?? 0);
$total = (int)($_GET['total'] ?? 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You for Your Order</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      background-color: #f8f9fa;
      padding: 20px;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h1 {
      color: #007BFF;
    }
    table {
      width: 100%;
      margin: 20px 0;
      border-collapse: collapse;
    }
    table th, table td {
      padding: 10px;
      border: 1px solid #ddd;
    }
    table th {
      background-color: #f2f2f2;
      text-align: left;
    }
    .total {
      font-size: 1.2em;
      font-weight: bold;
      color: #28a745;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Thank You for Your Order!</h1>
    <p>We have received your order details. Here's a summary:</p>

    <table>
      <tr>
        <th>Name</th>
        <td><?php echo htmlspecialchars($name); ?></td>
      </tr>
      <tr>
        <th>Phone</th>
        <td><?php echo htmlspecialchars($phone); ?></td>
      </tr>
      <tr>
        <th>Villa Number</th>
        <td><?php echo htmlspecialchars($villa); ?></td>
      </tr>
      <tr>
        <th>Breakfast Combo</th>
        <td><?php echo $combo; ?></td>
      </tr>
      <tr>
        <th>Aloo Chatkara Paratha</th>
        <td><?php echo $aloo; ?></td>
      </tr>
      <tr>
        <th>Paneer-e-Bahar Paratha</th>
        <td><?php echo $paneer; ?></td>
      </tr>
      <tr>
        <th>Ghee-Licious Gajar Halwa</th>
        <td><?php echo $halwa; ?></td>
      </tr>
      <tr>
        <th>Chilled Chaas</th>
        <td><?php echo $chaas; ?></td>
      </tr>
      <tr>
        <th>Total Amount</th>
        <td class="total">₹<?php echo $total; ?></td>
      </tr>
    </table>

    <p>We will process your order shortly. Thank you for choosing Friends' Kitchen!</p>
  </div>
</body>
</html>

