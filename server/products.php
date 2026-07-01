<?php
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
    // Trả về dữ liệu cứng trực tiếp, không gọi qua localhost MySQL bị lỗi nữa
    $products = [
        [
            "id" => 1,
            "name" => "iPhone 17 ",
            "price" => "23.290.000đ",
            "image" => "https://24hstore.vn/images/products/2025/09/10/large/iphone-17-xanh-lam-01.png", // Bạn thay bằng link ảnh của bạn
            "description" => "Thiết kế siêu mỏng cánh thế hệ mới.",
            "specs" => ["screen" => "6.3 inch Super Retina XDR", "Chipset" => "Apple A19", "Camera"=> "48MP Dual Fusion", "Bộ nhớ" => "256GB"]
        ],
        [
            "id" => 2,
            "name" => "iPhone 17 Pro ",
            "price" => "32.899.000đ",
             "image" => "https://24hstore.vn/images/products/2025/09/10/large/iphone-17-pro-bac-01.png", // Bạn thay bằng link ảnh của bạn
            "description" => "Khung viền Titanium cấp độ 5.",
            "specs" => ["screen" => "6.3 inch Super Retina XDR", "Chipset" => "Apple A19 Pro", "Camera"=> "48MP Dual Fusion", "Bộ nhớ" => "256GB"]
        ],
        [
            "id" => 3,
            "name" => "iPhone 17 Pro Max",
            "price" => "35.590.000đ",
             "image" => "https://24hstore.vn/images/products/2025/09/10/large/iphone-17-pro-max-xanh-01.png", // Bạn thay bằng link ảnh của bạn
            "description" => "Đỉnh cao công nghệ thế hệ mới.",
            "specs" => ["screen" => "6.3 inch Super Retina XDR", "Chipset" => "Apple A19 Pro Extreme", "Camera"=> "48MP Pro Fusion", "Bộ nhớ" => "256GB"]
        ]
    ];

    echo json_encode($products);
}
?>