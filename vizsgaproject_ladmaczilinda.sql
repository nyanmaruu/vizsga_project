-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Sze 04. 19:48
-- Kiszolgáló verziója: 10.4.22-MariaDB
-- PHP verzió: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `vizsgaproject_ladmaczilinda`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`id`, `name`, `createdAt`, `updatedAt`) VALUES
(1, 'cleanser', '2023-01-22 15:51:47', '2023-01-22 15:51:47'),
(2, 'cream', '2023-01-22 15:57:35', '2023-01-22 16:33:22'),
(3, 'toner', '2023-01-22 15:57:54', '2023-01-22 16:33:40'),
(4, 'serum', '2023-01-22 15:58:35', '2023-01-22 16:33:46'),
(5, 'essence', '2023-01-22 16:00:36', '2023-01-22 16:33:51');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `createdAt`, `updatedAt`) VALUES
(57, 31, 43, '2023-09-04 10:39:55', '2023-09-04 10:39:55'),
(77, 31, 43, '2023-09-04 14:44:32', '2023-09-04 14:44:32'),
(78, 31, 43, '2023-09-04 14:45:17', '2023-09-04 14:45:17'),
(79, 31, 43, '2023-09-04 14:46:54', '2023-09-04 14:46:54');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_products`
--

CREATE TABLE `order_products` (
  `id` int(20) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total_price`, `createdAt`, `updatedAt`) VALUES
(66, 57, 2, 3, 19, 57, '2023-09-04 10:39:55', '2023-09-04 10:39:55'),
(90, 77, 3, 1, 19, 19, '2023-09-04 14:44:32', '2023-09-04 14:44:32'),
(91, 78, 2, 1, 19, 19, '2023-09-04 14:45:17', '2023-09-04 14:45:17'),
(92, 79, 3, 1, 19, 19, '2023-09-04 14:46:54', '2023-09-04 14:46:54');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `categories_id` bigint(20) NOT NULL,
  `brand` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `description` text COLLATE utf8_hungarian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `categories_id`, `brand`, `name`, `image`, `description`, `price`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'BANILA CO', 'Clean It Zero Foam Cleanser', 'pictures/banila_cleanser.webp', 'This cream-to-foam Clean It Zero Foam Cleanser hydrates as it deep cleans. The formula features a naturally-derived amino acid cleansing agent and Banila Co\'s patented Zero Balance Technology, a blend that includes acerola, rooibos leaf, bamboo and angelica extracts, to soothe and support the skin’s moisture balance. Gentle enough for sensitive skin, the skin won’t feel tight or dry after use.', 14, '2023-01-22 15:45:13', '2023-01-29 17:16:51'),
(2, 1, 'BANILA CO', 'Clean It Zero Cleansing Balm Original', './pictures/banila_cleanser2.webp', 'This Banila Co cult favorite still melts off stubborn makeup seamlessly without stripping your skin of its natural oils, it naturally exfoliates and brightens with vitamin C-rich acerola extract. But now, mineral oil has been replaced with natural ester oil, butylated hydroxytoluene is gone and skin-friendly vitamin E acetate is in its place (allowing this cleanser to be used on all skin types, even kids!), and butyl parahydroxybenzoate has been replaced with phenoxyethanol, an ingredient naturally derived from green tea to provide a fresh, rose scent.', 19, '2023-01-22 15:54:29', '2023-01-29 17:15:45'),
(3, 2, 'CHASIN’ RABBITS', 'Chasin’ Rabbits Drunken Hand Pomade', './pictures/chasinrabbits_cream.webp', ' Revitalize dry skin with this rich, deeply hydrating, and moisturizing hand cream. With a velvety texture and non-greasy feel, this Chasin’ Rabbits Hand Pomade absorbs quickly to achieve softer, smoother, healthier skin with every application. Protect your hands from aging and hyperpigmentation, and environmental stressors.', 19, '2023-01-22 15:56:22', '2023-01-29 17:15:56'),
(4, 2, 'COCOKIND', 'Texture Smoothing Cream', './pictures/cocokind_cream.webp', 'This nourishing, fast-absorbing moisturizer uses Cocokind’s signature celery superseed complex to refine the appearance of texture and skin irregularities such as enlarged pores, fine lines, wrinkles and rough patches, providing skin with a natural blurring effect. ', 22, '2023-01-22 15:58:18', '2023-01-29 17:16:08'),
(5, 1, 'COSRX', 'Advanced Snail Mucin Power Gel Cleanser', './pictures/cosrx_cleanser.webp', 'COSRX Advanced Snail Mucin Power Gel Cleanser is sulfate-free and lightly foams to rinse away dirt, oil, and makeup without disrupting your skin\'s essential moisture barrier.', 18, '2023-01-22 16:03:04', '2023-01-29 17:16:21'),
(6, 2, 'COSRX', 'Advanced Snail 92 All In One Cream', './pictures/cosrx_cream.webp', 'The COSRX Advanced Snail 92 All in One Cream is a lightweight moisturizer that nourishes, replenishes, and plumps the skin with moisture. This lightweight cream is enriched with 92% snail secretion filtrate that drenches the skin with needed moisture, helping to repair skin damage and promote healing, but without feeling sticky. ', 26, '2023-01-22 16:06:35', '2023-01-29 17:16:38'),
(7, 4, 'COSRX', 'The Niacinamide 15 Serum', './pictures/cosrx_sereum.webp', 'Meet a total skin care serum for breakouts and blemishes. The Niacinamide 15 Serum from COSRX is a highly concentrated serum that combines the maximum concentration of niacinamide with optimal ratios of synergistic ingredients for total acne control. Lightweight and non-sticky, this serum will leave your skin radiant, smooth and soothed. ', 25, '2023-01-22 16:07:41', '2023-01-29 17:16:45'),
(8, 1, 'DEWYTREE', 'Hi Amino All Cleansing Oil', 'pictures/dewytree_cleanser.webp', 'Say goodbye to post-cleansing dehydrated and tight skin with Dewytree Hi Amino All Cleansing Oil. This one-step cleanser for cleaner and smoother skin is formulated using plant-derived ingredients and amino acids that help refine skin texture and keeps the skin dewy post-cleanse. An all-in-one, this oil cleanser removes makeup, sunscreen, and other accumulated impurities from the pores to make your skin clean, fresh, and radiant.', 20, '2023-01-22 16:09:19', '2023-01-29 17:17:12'),
(9, 2, 'DEWYTREE', 'Ultra Vitalizing Snail Cream', 'pictures/dewytree_cream.webp', 'Ultra Vitalizing Snail Cream from Dewytree deeply moisturizes and rejuvenates skin for a healthier complexion - perfect for the cold winter months. Snail secretion filtrate, along with ingredients like the humectant betaine, and anti-aging adenosine, hydrate, smooth and soothe dry and irritated skin, minimize the appearance of fine lines, and protect against environmental damage.', 43, '2023-01-22 16:20:28', '2023-01-29 17:17:17'),
(10, 1, 'ETUDE HOUSE', 'SoonJung pH 6.5 Whip Cleanser', 'pictures/etude_cleanser.webp', 'The SoonJung pH 6.5 Whip Cleanser from Etude House is back with new, revamped packaging! Meet the soft, moisturizing cleansing foam of your dreams! This cleanser has a low pH of 6.5 and uses 98.9% naturally derived ingredients to cleanse skin in the gentlest way possible. Panthenol, a skin-benefitting compound closely related to Vitamin B5, delivers deep hydration while madecassoside, derived from Centella asiatica, repairs skin damage. Free of potential irritants like fragrance, artificial color, and parabens, this cleanser uses minimal ingredients and a rich foam to effectively cleanse and soothe irritated skin.', 18, '2023-01-22 16:21:35', '2023-01-29 17:17:22'),
(11, 3, 'ETUDE HOUSE', 'SoonJung pH 5.5 Relief Toner', 'pictures/etude_toner.webp', 'With new, revamped formula, packaging and bigger volume of the product by popular demand! \r\n\r\nSometimes keeping it simple is the solution. The SoonJung pH 5.5 Relief Toner uses 97% naturally derived ingredients and has a low pH of 5.5 to keep skin balanced and hydrated throughout the day.\r\n\r\nWith free of potential irritants like fragrance, artificial color, and parabens, SoonJung pH 5.5 Relief Toner from Etude House will be your best friend, especially if you have sensitive skin. Panthenol, a skin-benefiting compound closely related to Vitamin B5, delivers deep hydration, while madecassoside, derived from Centella Asiatica, repairs skin damage. With a water-like consistency, this refreshing toner intensely hydrates and cools down your skin.', 20, '2023-01-22 16:22:55', '2023-01-29 17:17:26'),
(12, 4, 'GOODAL', 'Apricot Collagen Youth Firming Ampoule', 'pictures/goodal_serum.webp', 'The Goodal Apricot Collagen Youth Firming Ampoule is perfect for those who are looking to bring back youthful, plump, firm skin. An ampoule with no added fragrance that’s gentle yet hydrating enough for all skin types. It’s lightweight and absorbent silky texture helps your skin become soft, rejuvenated, and smooth. ', 33, '2023-01-22 16:24:01', '2023-01-29 17:28:32'),
(13, 5, 'GOOD DAYS FOR ALL', 'Prime Time Refining Toning Essence', 'pictures/gooddays_essence.webp', 'Today is your day! Get your skin ready for Prime Time by incorporating this multi-tasking hydrating cleansing toner into your daily regimen. Prime Time Refining Toning Essence helps prep skin to receive moisture more effectively. Enriched with Sugar Maple Extract — known to contain high levels of malic acid for exfoliation, and loved for its skin softening properties and antioxidants to help combat free radical damage — as well as Damascus rose water, an anti-inflammatory that nourishes and provides a subtle floral fragrance. Natural exfoliators like pumpkin and papaya enzymes help gently remove dead skin and impurities. This light, refreshing toner is particularly great for combination and normal skin types. ', 26, '2023-01-22 16:25:45', '2023-01-29 17:17:33'),
(14, 4, 'GOOD DAYS FOR ALL', 'C’s The Day Serum', 'pictures/gooddays_serum.webp', 'Brighter skin days are within reach with Good Days for All  C’s The Day Serum. Not only is it now formulated with 12% pure vitamin C (ascorbic acid), but it also contains skin brightening licorice root extract and niacinamide (vitamin B3) to diminish dullness, improve tone, and minimize the appearance of pores and fine lines. C’s The Day Vitamin C Serum also contains a blend of ginseng and white truffle, to help calm and nourish the skin. Antioxidant-rich camu camu rounds out the formulation - a potent cherry-like fruit that contains 40x more vitamin C than oranges.', 26, '2023-01-22 16:27:55', '2023-01-29 17:29:07'),
(15, 2, 'HANSKIN', 'Collagen Peptide Eye Cream', 'pictures/hanskin_cream.webp', 'Hanskin Collagen Peptide Eye Cream is made with 80% collagen extract and 20% peptide to effectively moisturize the skin. It contains an advanced anti-aging formula with 20 different types of peptides to repair the skin from wrinkles and fine lines around the eyes.', 26, '2023-01-22 16:33:19', '2023-01-29 17:17:51'),
(16, 5, 'HANSKIN', 'Soonhan Houttuynia First Essence', 'pictures/hanskin_essence.webp', 'This skin texture relaxing toner contains 97.5% Heartleaf Houttuynia extract. Hanskin’s Soonhan Houttuynia First Essence helps to soothe the skin, support barrier function, and visibly erase redness. This essence toner helps prepare the skin for the next skincare step and leaves your skin feeling supple. ', 28, '2023-01-22 16:34:48', '2023-01-29 17:17:57'),
(17, 4, 'I\'M FROM', 'Rice Serum', 'pictures/imfrom_serum.webp', 'I\'m From Rice Serum is formulated with 73% fermented rice embryo extract, which contains concentrated nutrition in a smaller size than the traditional rice grain. This ingredient has soothing and brightening effects and also contains linolenic acid, which nourishes and strenghtens skin barrier. ', 27, '2023-01-22 16:37:49', '2023-01-29 17:18:02'),
(18, 4, 'ISNTREE', 'Green Tea Fresh Serum', 'pictures/isntree_serum.webp', 'A lightweight yet potent serum infused with 77% Jeju-sourced green tea extract. Isntree’s Green Tea Fresh Serum will help to balance moisture levels, brighten skin tone and reduce the appearance of fine lines, all in one. ', 31, '2023-01-22 16:41:22', '2023-01-29 17:18:08'),
(19, 3, 'ISNTREE', 'Green Tea Fresh Toner', 'pictures/isntree_toner.webp', 'Perfect for oily and combination skin types, Isntree Green Tea Fresh Toner uses natural, EWG green grade ingredients to balance and nourish the complexion.\r\n\r\nThe formula features a blend of plant extracts - Anti Sebum P(HD) - to control excess oil and 80% green tea extract sourced from Jeju Island to protect, brighten, and further balance skin.', 14, '2023-01-22 16:42:39', '2023-01-29 17:18:12'),
(20, 4, 'IT\'S SKIN', 'It\'s Skin Power 10 Formula - Ve (Glow)', 'pictures/itsskin_serum.webp', 'Ve Serum from It’s Skin’s Power 10 Formula line is enriched with vitamin E to bring radiance to your skin by supporting a strong, healthy skin barrier.\r\n\r\n\r\nIn skin care, vitamin E helps to combat free radical damage and helps the skin repair itself from environmental stressors that can weaken skin, such as pollution and sun damage. Ve Serum is a great pair to a routine that incorporates vitamin C, as the two ingredients work together to increase each other\'s benefits. Rich in antioxidants, vitamin E also helps to manage sebum production - in particular, so it doesn’t oxidize as quickly (a.k.a. helps with blackheads)!', 11, '2023-01-22 16:46:01', '2023-01-29 17:18:17'),
(21, 4, 'BEAUTY OF JOSEON', 'Revive Serum: Ginseng + Snail Mucin', 'pictures/joseon_serum.webp', 'The Repair Serum from Beauty of Joseon is now the Revive Serum: Ginseng + Snail Mucin with new packaging, but it still has the same great ingredients to bring nourishment to lackluster skin.\r\nRestore your complexion with this luxurious, silky serum enriched with traditional Korean herbal ingredients (‘hanbang’). Antioxidant-rich ginseng root water supports circulation to help plump up areas with fine lines and wrinkles. In fact, ginseng is widely regarded as a superfood and known for its healing properties. Snail mucin filtrate evens skin tone, reduces hyperpigmentation & scarring, and also improves cell turnover to give your skin a healthy, even glow. ', 17, '2023-01-22 16:46:57', '2023-01-29 17:18:23'),
(22, 2, 'KLAIRS', 'Rich Moist Soothing Cream', 'pictures/klairs_cream.webp', 'This rich cream promotes immediate and long-term moisture through a nourishing formula for sensitive skin.\r\n\r\nEnriched with yeast-derived beta glucan, jojoba oil, and ceramides, it works to strengthen your skin’s protective barrier, rescuing dry and irritated skin, while improving its natural cell repairing capabilities.', 26, '2023-01-22 16:49:10', '2023-01-29 17:18:46'),
(23, 3, 'KLAIRS', 'Supple Preparation Facial Toner', 'pictures/klairs_toner.webp', 'Prep your skin with this refreshing vegan toner that removes excess dirt and sebum while restoring skin\'s pH balance. Klairs Supple Preparation Facial Toner contains amino acids to reduce irritation and provide deep hydration for instantly calmer, bouncier skin. Toner is the essential first step in any moisturizing regimen, prepping your skin to absorb the next step in your skincare regimen: essence.', 22, '2023-01-22 16:50:09', '2023-01-29 17:18:41'),
(24, 1, 'MANYO FACTORY', 'Pure Cleansing Oil', 'pictures/manyo_cleanser.webp', 'This cleansing oil is gentle yet powerful and actively fights blackheads and whiteheads without clogging pores. It is suitable for dry and all skin types. It transforms into a luscious milk that dissolves makeup and impurities while restoring skin\'s natural moisture and pH balance. ', 29, '2023-01-22 16:54:11', '2023-01-29 17:18:37'),
(25, 5, 'MISSHA', 'Time Revolution The First Essence 5x', 'pictures/missha_essence.webp', 'Missha Time Revolution The First Essence 5X is the fifth-generation of this cult-favorite essence. This essence is fragrance-free and lightweight, yet potent; the skin-nourishing formula provides eight key skin care benefits: clarity, moisture, skin tone, texture, soothing, smoothing, hyperpigmentation, and protection. \r\n\r\nFormulated with 97% Desert Cica Yeast Ferment, this firming and brightening essence helps maintain the skin’s pH balance and delivers dense moisture, while helping to strengthen the skin barrier. ', 54, '2023-01-22 17:14:28', '2023-01-29 17:18:33'),
(26, 2, 'NACIFIC', 'Fresh Herb Origin Eye Cream ', 'pictures/nacific_cream.webp', 'Hydrate, brighten, and minimize fine lines with this lightweight, airy Nacific Fresh Herb Origin Eye Cream. Key ingredients include niacinamide, hyaluronic acid and adenosine. The formula feels refreshing and cooling on contact and keeps the sensitive eye area nourished.', 30, '2023-01-22 17:15:18', '2023-01-29 17:18:59'),
(27, 1, 'NEOGEN', 'Real Fresh Green Tea Cleansing Stick', 'pictures/neogen_cleanser.webp', 'Winner of the 2017 Teen Vogue Acne Awards and deemed \"one of the coolest creations to come out of Korea,\" the Neogen Real Fresh Green Tea Cleansing Stick is a travel-friendly, all-in-one cleanser, created by Soko Glam co-founder Charlotte Cho. Formulated with 13 natural oils to breakdown makeup, natural green tea leaves to exfoliate and a low pH to gently cleanse your skin, this cleanser will lead the way to brighter, clearer skin.', 22, '2023-01-22 17:17:35', '2023-01-29 17:19:04'),
(29, 5, 'NEOGEN', 'Dermalogy Cica Repair Snail Essence', 'pictures/neogen_essence.webp', 'Neogen’s Dermalogy Cica Repair Snail Essence contains a whopping 96% snail mucin to help revitalize dull, or irritated skin. \r\n\r\nFormulated to aid in skin regeneration and promote elasticity, the Cica complex included in the formula contains centella asiatica extract, asiaticoside, madecassic acid, asiatic acid, and madecassoside - all of which work together to help soothe sensitive or troubled skin. ', 27, '2023-01-22 17:19:06', '2023-01-29 17:19:10'),
(30, 4, 'NEOGEN', 'Real Ferment Micro Serum', 'pictures/neogen_serum.webp', 'A follow-up to the intensely hydrating Neogen Dermalogy Micro Essence, the micro serum delivers a concentrated boost of nutrients and antioxidants to skin.\r\n\r\nWith a formula that includes 61% fermented ingredients, Neogen Real Ferment Micro Serum is a gel-like serum that instantly absorbs into skin and infuses it with elasticity-improving bifida ferment lysate and saccharomyces ferment filtrate.', 38, '2023-01-22 17:20:08', '2023-01-29 17:19:14'),
(31, 4, 'NEOGEN', 'Probiotics Double Action Serum', 'pictures/neogen_serum2.webp', 'A prebiotic & probiotic-packed dual serum to deliver firmer, stronger, more radiant skin. Known for their innovative formulations, Neogen has created this two-pump, anti-aging serum duo to improve the natural skin barrier function and restore the skin’s pH levels for a hydrated, healthy appearance.', 42, '2023-01-22 17:22:33', '2023-01-29 17:19:18'),
(32, 3, 'ROUND LAB', 'Mugwort Calming Toner', 'pictures/roundlab_toner.webp', 'Help calm irritated skin with this refreshing, skin-strengthening Round Lab Mugwort Calming Toner. Mugwort extract, which has anti-inflammatory properties, helps heal skin sensitivities and acne, while madecassoside provides additional soothing benefits.', 27, '2023-01-22 17:23:34', '2023-01-29 17:19:22'),
(33, 3, 'ROVECTIN', 'Lotus Water Calming Toner', 'pictures/rovectin_toner.webp', 'An extra calming toner soothes skin with Lotus flower extract and self-purifying features. It helps retain ideal moisture for balanced skin through 7 layers of hyaluronic acid and xylitol.\r\n\r\n\r\nWith 40% content of lotus flower extract, Rovectin Clean Lotus Water Calming Toner purifies skin from fine dust and harmful pollutants with its self-purifying features. Its lightweight texture absorbs quickly into skin without stickiness. ', 22, '2023-01-22 17:24:37', '2023-01-29 17:19:26'),
(34, 2, 'SKINRX LAB', 'MadeCera Cream', 'pictures/skinrx_cream.webp', 'Strengthen the skin barrier, brighten, and fight premature aging with this multi-tasking cream! SKINRx Lab\'s MadeCera Cream contains madecassoside, an inflammation-fighting compound naturally occurring in centella asiatica extract.', 36, '2023-01-22 17:26:00', '2023-02-01 21:02:15'),
(35, 3, 'SOME BY MI', 'AHA-BHA-PHA 30Days Miracle Toner', 'pictures/somebymi_toner.webp', 'A cult favorite, one bottle of this multi-tasking toner is sold every three seconds! As its name suggests, the formula boasts three types of chemical exfoliants (AHAs, BHAs, and PHAs) plus papaya and witch hazel extracts to effectively boost cell turnover and keep skin smooth and healthy. A high concentration of tea tree water extract also promotes clear skin, as well as soothes inflammation, while adenosine and niacinamide target wrinkles and a dull skin tone. ', 22, '2023-01-22 17:26:53', '2023-01-29 17:19:42'),
(36, 2, 'THANK YOU FARMER', 'True Water Deep Moisture Cream EX', 'pictures/thankyou_cream.webp', 'Hyaluronic acid infuses skin with moisture, while olive oil and squalane form a thin, breathable layer that helps skin to retain moisture and stay hydrated all day long. Lightweight jojoba oil further softens and protects skin, while ultra-soothing cica extract helps to calm inflammation - aiding with repair for an overall smoother, more even complexion.', 40, '2023-01-22 17:27:41', '2023-02-01 21:02:07'),
(37, 1, 'THEN I MET YOU', 'Soothing Tea Cleansing Gel', 'pictures/thenimetyou_cleanser.webp', 'This brightening cleansing gel is packed with fermented rice water as the number one ingredient, and was designed to be a sensorial experience with its natural herbal scent. In addition to tackling impurities like dirt and sweat, the formula brightens with licorice root extract, calms and prevents signs of aging with green tea and lightly exfoliates with gluconolactone (PHA). The formula is sulfate-free and has a gentle pH of 6.', 36, '2023-01-22 17:29:25', '2023-01-29 17:19:50'),
(38, 5, 'THEN I MET YOU', 'The Giving Essence', 'pictures/thenimetyou_essence.webp', 'The carefully crafted Then I Met You essence is formulated with 5% niacinamide - the optimal concentration for effective, brightening results. It\'s also composed of over 80% naturally fermented ingredients such as galactomyces ferment filtrate and saccharomyces ferment filtrate that have proven skin care benefits, including reducing the appearance of pores, blackheads and sebum. Deeply hydrate skin with polyglutamic acid, an ingredient that holds 4x more moisture than hyaluronic acid. The Giving Essence also contains ellagic acid, a naturally-found compound that excels at brightening and protects against UV rays. ', 50, '2023-01-22 17:30:44', '2023-01-29 17:19:54'),
(39, 1, 'TONY MOLY', 'Moisture Boost Gel To Water Morning Cleanser', 'pictures/tonymoly_cleanser.webp', 'Made with gentle, naturally-derived surfactants for use on even the most sensitive skin, this clinically tested, low pH cleanser transforms from a light gel texture to water as you massage it in. After using, skin will feel hydrated, soothed and properly cleansed. Contains 5 types of centella asiatica extracts, a panthenol and ceramide complex, as well as AHA, BHA and PHAs. TONYMOLY Moisture Boost Gel To Water Morning Cleanser hydrates skin while gently removing dirt and dead skin cells for a soothing cleanse - a perfect way to begin the morning!', 13, '2023-01-22 17:31:32', '2023-01-29 17:20:02'),
(40, 2, 'TONY MOLY', 'Plump-Kin Retinol Eye Cream', 'pictures/tonymoly_cream.webp', 'Pumpkin extract is high in vitamins and antioxidants, helping to reduce inflammation and target fine lines simultaneously. Ginger extract and retinol help speed up cell turnover to brighten and plump up the undereyes, and also creates a barrier to calm and protect from further damage.', 25, '2023-01-22 17:33:17', '2023-02-01 21:01:23'),
(41, 4, 'TONY MOLY', 'Watermelon Dew All Over Serum', 'pictures/tonymoly_serum.jpg', 'TONYMOLY Watermelon Dew All Over Serum has a lightweight cooling matte finish and instantly absorbs into the skin without leaving a sticky or tacky residue, making it the perfect moisturizer for both the body and face.\r\n\r\n\r\nWatermelon extract provides deep hydration and increases blood circulation, helping to strengthen the skin’s barrier. Aloe leaf extract is a natural anti-inflammatory that calms irritation and promotes skin regeneration. Centella asiatica brings soothing relief and helps to protect the skin, making TONYMOLY Watermelon Dew All Over Serum a perfect choice for dry or irritated skin.\r\n\r\n', 15, '2023-01-22 17:34:43', '2023-01-29 17:33:38'),
(42, 3, 'TONY MOLY', 'Wonder Rice Smoothing Toner', 'pictures/tonymoly_toner.webp', 'Introducing a toner that\'s perfect for everyday use for all skin types! The all-in-one Wonder Rice Smoothing Toner from Tony Moly is packed with rice filtrate that works to instantly seep into skin and deeply hydrate it. The hypo-allergenic and alcohol-free formula also contains sugarcane, grape, and apple extracts to naturally exfoliate skin and help reduce pigmentation. The value size makes it perfect for the layering method to alleviate dry and dehydrated skin and uneven skin tone. The light consistency makes it easy for combination and oily skin types to use everyday.', 23, '2023-01-22 17:36:56', '2023-01-29 17:20:17');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `type_id` int(11) NOT NULL,
  `users_name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `users_pwd` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `users_email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `createdAT` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `type_id`, `users_name`, `users_pwd`, `users_email`, `createdAT`, `updatedAt`) VALUES
(31, 0, 'test', 'test', 'test@gmail.com', '2023-08-23 13:18:39', '2023-08-23 13:18:39'),
(32, 1, 'admin', 'admin', 'admin@admin.com', '2023-08-23 13:22:12', '2023-09-04 17:47:12');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user_adress`
--

CREATE TABLE `user_adress` (
  `address_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `ccName` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `ccNumber` int(255) NOT NULL,
  `ccExpiration` int(4) NOT NULL,
  `ccCvv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user_adress`
--

INSERT INTO `user_adress` (`address_id`, `userid`, `firstName`, `lastName`, `zip`, `city`, `adress`, `phone`, `ccName`, `ccNumber`, `ccExpiration`, `ccCvv`) VALUES
(43, 31, 'Test', 'Test', 4027, 'Debrecen', 'Test utca 23', '64645654', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user_categories`
--

CREATE TABLE `user_categories` (
  `id` int(20) NOT NULL,
  `type` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user_categories`
--

INSERT INTO `user_categories` (`id`, `type`, `createdAt`, `updatedAt`) VALUES
(0, 'user', '2023-01-22 16:04:51', '2023-08-23 11:01:41'),
(1, 'admin', '2023-01-22 16:04:30', '2023-01-22 16:04:30');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`);

--
-- A tábla indexei `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id_2` (`type_id`);

--
-- A tábla indexei `user_adress`
--
ALTER TABLE `user_adress`
  ADD PRIMARY KEY (`address_id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- A tábla indexei `user_categories`
--
ALTER TABLE `user_categories`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT a táblához `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT a táblához `user_adress`
--
ALTER TABLE `user_adress`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT a táblához `user_categories`
--
ALTER TABLE `user_categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `user_adress` (`address_id`);

--
-- Megkötések a táblához `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Megkötések a táblához `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `user_categories` (`id`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `user_adress`
--
ALTER TABLE `user_adress`
  ADD CONSTRAINT `user_adress_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
