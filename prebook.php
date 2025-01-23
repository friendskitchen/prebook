<?php
// This file handles the frontend. Form submissions are directed to process_prebook.php.
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Friends' Kitchen Order Pre-Booking</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 800px;
      margin: 20px auto;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 10px;
      background-color: #f9f9f9;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    .form-step {
      display: none;
    }

    .form-step.active {
      display: block;
    }

    .form-section label {
      display: flex;
      flex-direction: column;
      margin-bottom: 10px;
      font-size: 14px;
      font-weight: bold;
    }

    .form-section input[type="text"],
    .form-section input[type="number"] {
      padding: 8px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .price {
      color: #007BFF;
      font-weight: bold;
    }

    .qr-section {
      text-align: center;
      margin-top: 20px;
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
      background-color: #fff;
    }

    .qr-section img {
      width: 200px;
      height: auto;
      margin: 10px 0;
    }

    .menu-image {
      display: block;
      margin: 20px auto;
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }
  </style>
  <script>
    function showStep(step) {
      // Hide all steps
      document.querySelectorAll('.form-step').forEach((stepDiv) => {
        stepDiv.classList.remove('active');
      });
      // Show the requested step
      document.getElementById(step).classList.add('active');
    }

    function calculateTotal() {
      const comboPrice = 280;
      const alooPrice = 100;
      const paneerPrice = 125;
      const halwaPrice = 50;
      const chaasPrice = 25;

      const comboCount = parseInt(document.querySelector('[name="comboCount"]').value) || 0;
      const alooCount = parseInt(document.querySelector('[name="alooCount"]').value) || 0;
      const paneerCount = parseInt(document.querySelector('[name="paneerCount"]').value) || 0;
      const halwaCount = parseInt(document.querySelector('[name="halwaCount"]').value) || 0;
      const chaasCount = parseInt(document.querySelector('[name="chaasCount"]').value) || 0;

      const totalAmount =
        comboCount * comboPrice +
        alooCount * alooPrice +
        paneerCount * paneerPrice +
        halwaCount * halwaPrice +
        chaasCount * chaasPrice;

      document.getElementById('totalAmount').textContent = `₹${totalAmount}`;
    }

    // Ensure the first step is active on page load
    window.onload = function () {
      document.getElementById('step1').classList.add('active');
    };
  </script>
</head>
<body>
  <!-- Step 1: Welcome Page -->
  <div id="step1" class="form-step active">
    <h2>Welcome to Friends' Kitchen Order Pre-Booking</h2>
    <img src="menu.jpeg" alt="Menu" class="menu-image">
    <button type="button" onclick="showStep('step2')">Next</button>
  </div>

  <!-- Step 2: Menu Page -->
  <div id="step2" class="form-step">
    <h2>Menu Page</h2>
    <form method="POST" action="process_prebook.php" oninput="calculateTotal()">
      <div class="form-section">
        <label>Name *:
          <input type="text" name="name" required>
        </label>
        <label>Phone *:
          <input type="number" name="phone" required>
        </label>
        <label>Villa Number *:
          <input type="number" name="villa" required>
        </label>
      </div>
      <div class="form-section">
        <h3>1. Breakfast Combo <span class="price">₹280/-</span></h3>
        <p>
          * Aloo Chatkara Paratha(1pc) with green chutney, pickle & curd<br>
          * Paneer-e-Bahar Paratha(1pc) with green chutney, pickle & curd<br>
          * Ghee-Licious Gajar Halwa (1 Portion)<br>
          * Chilled Chaas(Buttermilk) (1 Portion)
        </p>
        <label>Quantity:
          <input type="number" name="comboCount" min="0" value="0">
        </label>
      </div>
      <div class="form-section">
        <h3>2. Aloo Chatkara Paratha <span class="price">₹100/-</span></h3>
        <p>Aloo Chatkara Paratha(1pc) with green chutney, pickle & curd</p>
        <label>Quantity:
          <input type="number" name="alooCount" min="0" value="0">
        </label>
      </div>
      <div class="form-section">
        <h3>3. Paneer-e-Bahar Paratha <span class="price">₹125/-</span></h3>
        <p>Paneer-e-Bahar Paratha(1pc) with green chutney, pickle & curd</p>
        <label>Quantity:
          <input type="number" name="paneerCount" min="0" value="0">
        </label>
      </div>
      <div class="form-section">
        <h3>4. Ghee-Licious Gajar Halwa <span class="price">₹50/-</span></h3>
        <p>Ghee-Licious Gajar Halwa (1 Portion)</p>
        <label>Quantity:
          <input type="number" name="halwaCount" min="0" value="0">
        </label>
      </div>
      <div class="form-section">
        <h3>5. Chilled Chaas <span class="price">₹25/-</span></h3>
        <p>Chilled Chaas(Buttermilk)(1 Portion)</p>
        <label>Quantity:
          <input type="number" name="chaasCount" min="0" value="0">
        </label>
      </div>
      <div class="form-section">
        <h3>Total Amount</h3>
        <p id="totalAmount">₹0</p>
      </div>

      <!-- QR Code Section -->
      <div class="qr-section">
        <h3>Pay Using QR Code</h3>
        <img src="QR-Code.jpeg" alt="QR Code">
        <p>Or pay to: 9900032195</p>
      </div>

      <!-- Payment Reference Section -->
      <div class="form-section">
        <label>Payment Reference *:
          <input type="text" name="paymentRef" required>
        </label>
      </div>

      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>

