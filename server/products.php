<?php
include_once 'config.php';
// 1. Cấu hình cho phép tất cả các nguồn (bao gồm cả Vercel) truy cập dữ liệu
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

// 2. Xử lý phản hồi nhanh cho các yêu cầu kiểm tra (Preflight Request) từ trình duyệt
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $query = "SELECT * FROM products ORDER BY id DESC";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        
        $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $row['specs'] = json_decode($row['specs']);
            $products[] = $row;
        }
        echo json_encode($products);
    } catch (PDOException $e) {
        echo json_encode(["error" => "Lỗi: " . $e->getMessage()]);
    }
}
?>