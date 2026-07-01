# Sử dụng môi trường PHP chính thức có tích hợp sẵn máy chủ Apache
FROM php:8.2-apache

# Bật tính năng rewrite của Apache (nếu cần cho API)
RUN a2enmod rewrite

# Sao chép toàn bộ code PHP trong thư mục backend vào thư mục chạy của máy chủ
COPY . /var/www/html/

# Cấu hình cổng chạy theo yêu cầu của Render
EXPOSE 80

# Khởi động máy chủ Apache
CMD ["apache2-foreground"]