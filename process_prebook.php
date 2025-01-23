<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csv_file = 'prebook.csv';

    // Extract data from POST request
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $villa = $_POST['villa'] ?? '';
    $comboCount = (int)($_POST['comboCount'] ?? 0);
    $alooCount = (int)($_POST['alooCount'] ?? 0);
    $paneerCount = (int)($_POST['paneerCount'] ?? 0);
    $halwaCount = (int)($_POST['halwaCount'] ?? 0);
    $chaasCount = (int)($_POST['chaasCount'] ?? 0);
    $paymentRef = $_POST['paymentRef'] ?? '';

    // Calculate total
    $total = ($comboCount * 280) + ($alooCount * 100) + ($paneerCount * 125) + ($halwaCount * 50) + ($chaasCount * 25);

    // Save to CSV
    if (!file_exists($csv_file)) {
        $file = fopen($csv_file, 'w');
        fputcsv($file, ["Name", "Phone", "Villa", "Combo Count", "Aloo Count", "Paneer Count", "Halwa Count", "Chaas Count", "Payment Reference", "Total"]);
        fclose($file);
    }
    $file = fopen($csv_file, 'a');
    fputcsv($file, [$name, $phone, $villa, $comboCount, $alooCount, $paneerCount, $halwaCount, $chaasCount, $paymentRef, $total]);
    fclose($file);

    // Redirect to end_page.php with query parameters
    header("Location: end_page.php?name=$name&phone=$phone&villa=$villa&combo=$comboCount&aloo=$alooCount&paneer=$paneerCount&halwa=$halwaCount&chaas=$chaasCount&total=$total");
    exit;
} else {
    http_response_code(405);
    echo "Method not allowed.";
    exit;
}

