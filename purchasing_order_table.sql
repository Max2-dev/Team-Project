CREATE TABLE purchasing (
    id int(10) NOT NULL,
    supplier VARCHAR(256) NOT NULL,
    destination VARCHAR(256) NOT NULL,
    product_request VARCHAR(256) NOT NULL,
    quantity int(10) NOT NULL,
    status VARCHAR(256) NOT NULL
    );


CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL,
  `Category_id` int(11) NOT NULL,
    `units` int(100) NOT NULL,
    `stock_level` enum('Available','Unavailable') NOT NULL DEFAULT 'Unavailable'
    
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

