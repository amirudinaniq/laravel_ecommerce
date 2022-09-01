-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table laravel_shop.carts: ~4 rows (approximately)
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` (`id`, `product_id`, `quantity`, `price`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 670.00, 3, '2022-08-30 14:37:28', '2022-08-30 14:41:57', '2022-08-30 14:41:57'),
	(2, 1, 1, 670.00, 3, '2022-08-31 13:56:03', '2022-08-31 14:22:28', '2022-08-31 14:22:28'),
	(3, 3, 1, 228.00, 5, '2022-08-31 13:56:16', '2022-08-31 13:56:43', '2022-08-31 13:56:43'),
	(4, 2, 1, 815.00, 5, '2022-08-31 13:56:18', '2022-08-31 13:56:43', '2022-08-31 13:56:43'),
	(5, 2, 1, 815.00, 3, '2022-09-01 15:47:14', '2022-09-01 15:47:14', NULL);
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;

-- Dumping data for table laravel_shop.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping data for table laravel_shop.migrations: ~9 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_08_07_101704_create_products_table', 1),
	(6, '2022_08_07_101733_create_carts_table', 1),
	(7, '2022_08_26_172636_create_processings_table', 1),
	(9, '2022_08_26_174442_add_client_id_processings_table', 2),
	(10, '2022_08_26_175703_add_deleted_at_cart_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping data for table laravel_shop.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping data for table laravel_shop.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping data for table laravel_shop.processings: ~0 rows (approximately)
/*!40000 ALTER TABLE `processings` DISABLE KEYS */;
INSERT INTO `processings` (`id`, `client_name`, `client_id`, `client_address`, `order_details`, `amount`, `currency`, `created_at`, `updated_at`) VALUES
	(1, 'amirudin aniq', 3, '{"line1":"NO. 91 KG DESA MOKMIN","postal_code":"53100","city":"Kuala lumpur","state":"Selangor","country":"Malaysia"}', '{"1":{"order_id":1,"quantity":1}}', '670', 'myr', '2022-08-30 14:41:57', '2022-08-30 14:41:57'),
	(2, 'maria ozawa', 5, '{"line1":"NO. 91 KG DESA MOKMIN","postal_code":"53100","city":"Kuala lumpur","state":"Selangor","country":"Malaysia"}', '{"2":{"order_id":2,"quantity":1},"3":{"order_id":3,"quantity":1}}', '1043', 'myr', '2022-08-31 13:56:43', '2022-08-31 13:56:43'),
	(3, 'amirudin aniq', 3, '{"line1":"NO. 91 KG DESA MOKMIN","postal_code":"53100","city":"Kuala lumpur","state":"Selangor","country":"Malaysia"}', '{"1":{"order_id":1,"quantity":1}}', '670', 'myr', '2022-08-31 14:22:28', '2022-08-31 14:22:28');
/*!40000 ALTER TABLE `processings` ENABLE KEYS */;

-- Dumping data for table laravel_shop.products: ~25 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `slug`, `description`, `image_name`, `price`, `sale_price`, `created_at`, `updated_at`) VALUES
	(1, 'Dolor rerum vel enim.', 'dolor-rerum-vel-enim', 'Expedita deleniti nihil modi molestiae rem esse. Possimus deserunt dolor quia quidem possimus hic.', 'https://via.placeholder.com/140x300.png/00aa22?text=et', '770', '670', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(2, 'Itaque vitae ut et.', 'itaque-vitae-ut-et', 'Animi a iusto magni accusantium. Sed harum provident et consectetur adipisci omnis consectetur.', 'https://via.placeholder.com/140x300.png/008888?text=eos', '915', '815', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(3, 'Eos expedita modi fuga.', 'eos-expedita-modi-fuga', 'Aut et quasi doloremque omnis inventore impedit. Eius officiis aliquid necessitatibus sunt vitae.', 'https://via.placeholder.com/140x300.png/004466?text=ullam', '328', '228', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(4, 'Itaque quia quasi est.', 'itaque-quia-quasi-est', 'Et quia omnis mollitia facilis at aliquam aut. Ducimus ea reiciendis vero nemo culpa animi.', 'https://via.placeholder.com/140x300.png/00aaff?text=tempora', '578', '478', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(5, 'Ex a qui id ipsam vitae.', 'ex-a-qui-id-ipsam-vitae', 'Est temporibus aliquid est qui consequatur non aut similique. Magnam quo neque reprehenderit cum.', 'https://via.placeholder.com/140x300.png/0000ee?text=quo', '701', '601', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(6, 'Et qui non soluta sed.', 'et-qui-non-soluta-sed', 'Consequatur quia omnis et et sequi nam fugiat. Corrupti ea ex architecto expedita eum.', 'https://via.placeholder.com/140x300.png/008800?text=earum', '971', '871', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(7, 'Ut et laborum et.', 'ut-et-laborum-et', 'Odio eum unde quos similique. Optio et dolores eveniet aspernatur quod.', 'https://via.placeholder.com/140x300.png/00ddbb?text=doloribus', '393', '293', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(8, 'Enim at repellendus ut.', 'enim-at-repellendus-ut', 'Et velit molestiae iusto et corporis et. Omnis pariatur reiciendis nam.', 'https://via.placeholder.com/140x300.png/00cc88?text=omnis', '203', '103', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(9, 'Sint mollitia at labore.', 'sint-mollitia-at-labore', 'Et voluptas totam suscipit non repellendus neque culpa. Explicabo cumque nulla mollitia.', 'https://via.placeholder.com/140x300.png/0033dd?text=accusantium', '127', '27', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(10, 'Perferendis odio et et.', 'perferendis-odio-et-et', 'Et ea maiores atque voluptas velit ut aut. Natus in ullam illo rerum voluptate ipsa aut voluptatem.', 'https://via.placeholder.com/140x300.png/00ff88?text=deserunt', '760', '660', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(11, 'Et voluptas aut et.', 'et-voluptas-aut-et', 'Sed ut laudantium soluta adipisci. Eligendi ut quod amet beatae sint.', 'https://via.placeholder.com/140x300.png/00dd33?text=hic', '559', '459', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(12, 'Neque ut autem labore.', 'neque-ut-autem-labore', 'Est eveniet ut delectus in velit et. Quo ex architecto quia harum sunt modi aliquid.', 'https://via.placeholder.com/140x300.png/009911?text=molestiae', '583', '483', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(13, 'Ipsam quam in non.', 'ipsam-quam-in-non', 'Ipsam ut porro unde. Et voluptas qui reiciendis tenetur rem.', 'https://via.placeholder.com/140x300.png/00ee88?text=rerum', '514', '414', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(14, 'Beatae et in dolorum ut.', 'beatae-et-in-dolorum-ut', 'Quas minima magnam nostrum a officia maiores. Libero nam rerum enim deleniti in hic.', 'https://via.placeholder.com/140x300.png/00ccee?text=veritatis', '973', '873', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(15, 'Ullam corporis non sed.', 'ullam-corporis-non-sed', 'Accusamus et est iste fugit omnis fuga cupiditate. Cupiditate non blanditiis voluptatem voluptatum.', 'https://via.placeholder.com/140x300.png/003300?text=quo', '866', '766', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(16, 'Dolor earum est quod.', 'dolor-earum-est-quod', 'Repellat inventore non ut adipisci quisquam est. Necessitatibus maiores inventore a dolores qui.', 'https://via.placeholder.com/140x300.png/00ddaa?text=eius', '338', '238', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(17, 'Sint aut nihil iste.', 'sint-aut-nihil-iste', 'Rerum accusantium delectus alias qui ut. Quos commodi voluptas ad at.', 'https://via.placeholder.com/140x300.png/0011ee?text=qui', '136', '36', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(18, 'Non omnis at et veniam.', 'non-omnis-at-et-veniam', 'Rerum inventore quam aspernatur. Sunt nobis iure asperiores culpa nisi.', 'https://via.placeholder.com/140x300.png/000077?text=delectus', '228', '128', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(19, 'Eum dolore dolores odit.', 'eum-dolore-dolores-odit', 'Earum qui et quia porro. Ullam ea quia fugiat aut. Laboriosam totam hic eos in.', 'https://via.placeholder.com/140x300.png/00dd22?text=nobis', '759', '659', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(20, 'Quo sed sed eum.', 'quo-sed-sed-eum', 'Rem aperiam aut eaque mollitia modi laborum. Qui eius deserunt enim ipsa sapiente.', 'https://via.placeholder.com/140x300.png/0088ff?text=ipsum', '692', '592', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(21, 'Ut qui et eum quis.', 'ut-qui-et-eum-quis', 'Officiis dolor non laudantium veritatis qui. Maiores illo eligendi cupiditate ut doloribus aut hic.', 'https://via.placeholder.com/140x300.png/00bbaa?text=sed', '483', '383', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(22, 'Qui quas sint odio.', 'qui-quas-sint-odio', 'Est deleniti officia et cum. Est dolorem modi saepe voluptas.', 'https://via.placeholder.com/140x300.png/000066?text=fuga', '834', '734', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(23, 'Ut vero quis et ex.', 'ut-vero-quis-et-ex', 'Dolorem dolorem beatae animi veniam ut. Cupiditate iste ut suscipit vero culpa est enim.', 'https://via.placeholder.com/140x300.png/00bbbb?text=est', '651', '551', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(24, 'Et quod aut deserunt.', 'et-quod-aut-deserunt', 'Et vitae incidunt amet non id magni et. Rerum sint et dignissimos nam voluptates incidunt.', 'https://via.placeholder.com/140x300.png/003366?text=ut', '302', '202', '2022-08-26 17:33:48', '2022-08-26 17:33:48'),
	(25, 'Non sit ad deleniti.', 'non-sit-ad-deleniti', 'Quam ea asperiores rem praesentium. Voluptas quam tempore sunt quisquam deleniti quas quaerat quis.', 'https://via.placeholder.com/140x300.png/003322?text=neque', '931', '831', '2022-08-26 17:33:48', '2022-08-26 17:33:48');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping data for table laravel_shop.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(3, 'amirudin aniq', 'amirudinaniq@gmail.com', NULL, '$2y$10$OSal1WQLwgNa.VFRyC/XUOndfx0pLMd7LOuFjII2JvxOwi8630k2S', '2UyIZsq60drk20ZhKBDp6OMotZlgbFHzmP6Puxo86ix0UFdgi5jKmz7HV5hc', '2022-08-28 14:21:37', '2022-08-28 14:21:37'),
	(4, 'Amir Aniq', 'amiraniq@gmail.com', NULL, '$2y$10$OSal1WQLwgNa.VFRyC/XUOndfx0pLMd7LOuFjII2JvxOwi8630k2S', NULL, '2022-08-31 13:32:22', '2022-08-31 13:32:22'),
	(5, 'Maria', 'maria@gmail.com', NULL, '$2y$10$OSal1WQLwgNa.VFRyC/XUOndfx0pLMd7LOuFjII2JvxOwi8630k2S', NULL, '2022-08-31 13:38:17', '2022-08-31 13:38:17'),
	(6, 'Amar Ketam', 'amar@gmail.com', NULL, '$2y$10$DU0JG.yfYw8QEBOuWlpAf.iiwQEjaJjgHIMRmjA/aphmB8kjKODQu', NULL, '2022-08-31 13:52:16', '2022-08-31 13:52:16'),
	(7, 'mia', 'mia@gmail.com', NULL, '$2y$10$yqIA5ft5b/I1suwWot5niOAzhrwQKp5muxKkH5m/ZtbjIMQ2b.pbe', NULL, '2022-08-31 14:22:48', '2022-08-31 14:22:48');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
