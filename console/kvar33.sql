-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.2.11-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица kvartari.kv_article
CREATE TABLE IF NOT EXISTS `kv_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_article: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `kv_article` DISABLE KEYS */;
INSERT INTO `kv_article` (`id`, `active`, `name`, `url`, `title`, `description`, `text`, `created`) VALUES
	(1, 1, 'Что такое квартари?', 'about', 'Что такое квартари?', NULL, '<p><strong>Квартари</strong> - это удивительный сервис, позволяющий забронировать квартиру на короткий срок: На один или несколько дней.</p>\r\n\r\n<p>В чем основная фишка Квартари, почему им удобно пользоваться?&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>На карте вы видите два типа квартир: Одна часть из них отмечены синеньким значком, вторая - желтым.</p>\r\n\r\n<p>Синий значок - обозначает квартиру, которую, вы можете арендовать как обычно, внеся залог на месте, непосредственно при заселении.</p>\r\n\r\n<p>Желтый значок - это квартира, арендовать и попасть в которую можно за 1 минуту. Вы сможете оплатить проживание и внести залог с пластиковой карты онлайн.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>В чем-то это похоже на бронирование номеров в отелях. Но у нашего сервиса есть несколько преимуществ:</strong></p>\r\n\r\n<p>- Значительно более низкая стоимость квартир, по сравнению с номерами в отеле.</p>\r\n\r\n<p>- Выше уровень сервиса. Все квартиры в идеальном состоянии и оборудованы бытовой техникой.</p>\r\n\r\n<p>- Идеальный вариант, если вы путешествуете с семьей и детьми и вам нужна кухня в квартире.</p>\r\n\r\n<p>- Единое стилевое решение. Все наши квартиры выполнены в едином стиле, поддерживаются в идеальном состоянии.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>В чем отличия Квартари от других сервисов бронирования квартир?</strong></p>\r\n\r\n<p>- Мы гарантируем актуальность информации на нашем сайте. Если на сайте указано, что квартира свободна, значит она свободна и вы можете в нее заселиться хоть сейчас!</p>\r\n\r\n<p>- Надежность: За последний год у нас остановилось более 2000 постояльцев, получивших только приятные впечатления от Квартари.</p>\r\n\r\n<p>- Мы сами обслуживаем наши квартиры: Прибираем, моем, чистим, ремонтируем. Мы знаем каждый гвоздик в наших квартирах и поддерживаем их в идеальном состоянии!</p>\r\n', '2018-06-24 14:58:53'),
	(3, 1, 'Вопросы и ответы', 'faq', 'Частые вопросы', NULL, '<p><strong>Как мне забронировать квартиру?</strong></p>\r\n\r\n<p>Выберите квартиру, которая вам понравилась. Введите дату начала аренды, дату окончания аренды, контактные данные (имя, телефон). Нажмите &quot;Забронировать&quot;. После этого, вам перезвонит наш оператор, подтвердить бронирование и можно считать, что дело в шляпе - квартира ждет вас!</p>\r\n\r\n<p><strong>Что требуется для того, чтобы арендовать у вас квартиру?</strong></p>\r\n\r\n<p>Вам потребуется Документ, удостоверяющий личность (Паспорт) + залог и оплата времени проживания.</p>\r\n\r\n<p><strong>Вы публикуете где-то сведения о том, что у вас останавливался?</strong></p>\r\n\r\n<p>Мы никогда не раскрываем сведения о наших постояльцах. Мы уважаем наших жильцов и соблюдаем полную конфиденциальность.</p>\r\n\r\n<p><strong>Можно ли арендовать квартиру на 1 час?</strong></p>\r\n\r\n<p>Нет. Аренда на 1 час невозможна. Минимальный срок - сутки.</p>\r\n\r\n<p><strong>Можно ли арендовать квартиру на неделю?</strong></p>\r\n\r\n<p>Можно.</p>\r\n\r\n<p><strong>А фотографии у вас настоящие?</strong></p>\r\n\r\n<p>Все фотографии полностью соответствуют действительности.</p>\r\n', '2018-06-24 15:00:23'),
	(4, 1, 'Сдавайте квартиры!', 'rent', 'Сдавайте квартиры!', NULL, '<p>Сдавать свою недвижимость с помощью проекта &quot;Квартари&quot; - одно удовольствие! Все делается в 3 простых шага:</p>\r\n\r\n<ol>\r\n	<li>Зарегистрируйтесь. Достаточно минимальных контактных данных: имя и&nbsp;телефон.</li>\r\n	<li>Добавьте квартиру. <a href="/realty/create">Удобная форма</a> поможет вам в этом!</li>\r\n	<li>Ожидайте уведомлений о бронировании и получайте прибыль!</li>\r\n</ol>\r\n\r\n<p>Конечно же, весь процесс чуть сложнее, чем здесь описано, но для этого у нас есть менеджеры, с которыми можно пообщаться как в электронном в виде, так и позвонить по телефону, указанному вверху и внизу сайта. Можно смело задавать любые вопросы, наши операторы всегда рады помочь вам.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Всю работу с системой &quot;Квартари&quot; мы постарались сделать максимально дружелюбной и интуитивно понятной. Основной&nbsp;ваш&nbsp;инструмент, как владельца квартиры - это <a href="/realty/clientrealty">список ваших квартир</a>. Там вы можете посмотреть график занятости вашей недвижимости и контактные данные арендаторов.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Мы постоянно дорабатываем систему для вашего удобства и будем рады всевозможным пожеланиям и предложениям. Их, кстати, удобно отправлять через форму внизу.</p>\r\n\r\n<p>Желаем успехов!</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2018-06-29 10:14:48'),
	(6, 1, 'Выгодные предложения', 'moneygreat', 'Выгодные предложения при работе с Квартари!', NULL, '<p>Это ведь так замечательно, когда можно совмещать приятное с полезным!</p>\r\n\r\n<p>Квартари - это удивительный проект, в котором вы видите реальные варианты квартир в нужном вам городе.</p>\r\n\r\n<p>Нет ничего проще найти отличную квартиру в шаговой доступности от метро.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Задержались допоздна у друзей? Откройте Квартари и посмотрите - возможно в этом районе есть свободная квартира?</p>\r\n\r\n<p>Приехали гости и хотят остаться на ночь? Забудьте про раскладушку - просто арендуйте для них отличную квартиру в соседнем доме.</p>\r\n\r\n<p>Пригласили на свадьбу, но предлагают спать в бане? Не беда. Просто зайдите на Квартари, а дальше вы уже знаете.</p>\r\n\r\n<p>Для любого случая у нас найдется подходящее предложение.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Пожалуй, вы не сможете найти лучшего предложения! Цены - блеск!</p>\r\n\r\n<p>В среднем, <strong>наши цены на 30% ниже</strong>, чем суточное размещение в гостиничных номерах региона.</p>\r\n\r\n<p>Мы строго подходим к вопросу содержания и выбора недвижимости. Попасть в Квартари может не любая квартира, а только та, что соответствует ряду критерием.</p>\r\n\r\n<p>Каждая квартира обслуживается нашими собственными сотрудниками - горничными и администраторами. Мы прикладываем максимум усилий, чтобы вы проводили время в наших квартирах легко, непринужденно и не в чем не нуждались.</p>\r\n\r\n<p>Мы намеренно отсекаем часть неподходящих помещений-квартир и других вариантов, оставляя лишь лучшие, чтобы наши клиенты получали позитивные эмоции от провождения времени с Квартари!</p>\r\n', '2018-06-29 10:25:26'),
	(8, 1, 'Безопасность', 'safety', 'Мы работаем, чтобы вы были спокойны!', NULL, '<p>Квартари очень ответственно подходят к вопросу выбора контрагентов!</p>\r\n\r\n<p>Каждая наша квартира обслуживается нашими сотрудниками самостоятельно. Наши администраторы следят за состоянием квартир там, как будто они сами в них живут.</p>\r\n\r\n<p>Мы стремимся обеспечить безопасность и конфиденциальность для всех наших арендаторов.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Квартари никогда не публикует сведения об именах и любых других данных наших клиентов.</p>\r\n\r\n<p>Обратите внимание, для аренды любой нашей квартиры, вам потребуется предъявить паспорт или иной документ, удостоверяющий личность.</p>\r\n\r\n<p>Это сделано для того, чтобы иметь возможность предложить вам низкий залог и максимально комфортное пребывание у нас в гостях!</p>\r\n\r\n<p>Управлять своим бронированием, вы всегда можете из личного кабинета пользователя.</p>\r\n', '2018-06-29 10:29:44'),
	(9, 1, 'Новости сервиса', 'news', 'Новости сервиса', NULL, 'Новости сервиса', '2018-06-29 10:39:03'),
	(11, 1, 'Связаться с нами', 'contact', 'Связаться с нами', NULL, 'Связаться с нами', '2018-06-29 10:39:42'),
	(12, 1, 'Как мы работаем', 'rules', 'Как мы работаем', NULL, 'Как мы работаем', '2018-06-29 10:40:03'),
	(13, 1, 'Наши менеджеры', 'who-we-are', 'Наши менеджеры', NULL, 'Наши менеджеры', '2018-06-29 10:40:19'),
	(14, 1, 'Кодовые замки', 'fast-access', 'Кодовые замки', NULL, 'Кодовые замки', '2018-06-29 10:40:44');
/*!40000 ALTER TABLE `kv_article` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_cache
CREATE TABLE IF NOT EXISTS `kv_cache` (
  `id` char(128) COLLATE utf8_unicode_ci NOT NULL,
  `expire` int(11) unsigned NOT NULL,
  `data` longblob DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expire` (`expire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_cache: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `kv_cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `kv_cache` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_city
CREATE TABLE IF NOT EXISTS `kv_city` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `country_id` (`country_id`),
  KEY `position` (`position`),
  CONSTRAINT `country` FOREIGN KEY (`country_id`) REFERENCES `kv_country` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_city: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `kv_city` DISABLE KEYS */;
INSERT INTO `kv_city` (`id`, `country_id`, `name`, `position`, `created`) VALUES
	(1, 1, 'Санкт-Петербург', 0, '2018-06-24 17:28:27'),
	(2, 1, 'Москва', 1, '2018-06-24 17:28:54'),
	(3, 1, 'Тула', 3, '2018-07-01 14:25:39');
/*!40000 ALTER TABLE `kv_city` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_country
CREATE TABLE IF NOT EXISTS `kv_country` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `code` (`code`),
  KEY `position` (`position`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_country: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `kv_country` DISABLE KEYS */;
INSERT INTO `kv_country` (`id`, `name`, `code`, `position`, `created`) VALUES
	(1, 'Россия', NULL, 0, '2018-06-24 17:27:46'),
	(2, 'Казахстан', '', 1, '2018-07-01 14:15:25');
/*!40000 ALTER TABLE `kv_country` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_currency
CREATE TABLE IF NOT EXISTS `kv_currency` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `position` (`position`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_currency: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `kv_currency` DISABLE KEYS */;
INSERT INTO `kv_currency` (`id`, `name`, `position`) VALUES
	(1, 'руб.', 0),
	(2, 'дол.', 1),
	(3, 'Эвро', 3);
/*!40000 ALTER TABLE `kv_currency` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_device_service
CREATE TABLE IF NOT EXISTS `kv_device_service` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `position` (`position`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_device_service: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `kv_device_service` DISABLE KEYS */;
INSERT INTO `kv_device_service` (`id`, `name`, `position`) VALUES
	(1, 'Интернет', 0),
	(2, 'Телевизор', 0),
	(3, 'Холодильник', 0),
	(4, 'Кондиционер', 0),
	(5, 'Стиральная машина', 0),
	(6, 'Фен', 0),
	(7, 'Утюг', 0),
	(8, 'СВЧ', 0),
	(9, 'Парковочное место', 0);
/*!40000 ALTER TABLE `kv_device_service` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_image
CREATE TABLE IF NOT EXISTS `kv_image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `realty_id` int(11) unsigned NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `realty_id` (`realty_id`),
  KEY `position` (`position`),
  CONSTRAINT `realty_id` FOREIGN KEY (`realty_id`) REFERENCES `kv_realty` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_image: ~46 rows (приблизительно)
/*!40000 ALTER TABLE `kv_image` DISABLE KEYS */;
INSERT INTO `kv_image` (`id`, `name`, `realty_id`, `position`, `title`, `created`) VALUES
	(1, '/upload/2018/06/28/7/f-1-1-28_1', 7, 1, 'f-1-1-28 1', '2018-06-28 16:25:30'),
	(2, '/upload/2018/06/28/7/f-1-1-28_2', 7, 2, 'f-1-1-28 2', '2018-06-28 16:25:30'),
	(3, '/upload/2018/06/28/7/f-1-1-28_3', 7, 3, 'f-1-1-28 3', '2018-06-28 16:25:30'),
	(4, '/upload/2018/06/28/8/s_1_1_28_1', 8, 1, 's 1 1 28 1', '2018-06-28 16:31:47'),
	(5, '/upload/2018/06/28/8/s_1_1_28_2', 8, 2, 's 1 1 28 2', '2018-06-28 16:31:47'),
	(6, '/upload/2018/06/28/8/s_1_1_28_3', 8, 3, 's 1 1 28 3', '2018-06-28 16:31:48'),
	(7, '/upload/2018/06/28/8/s_1_1_28_4', 8, 4, 's 1 1 28 4', '2018-06-28 16:31:48'),
	(8, '/upload/2018/06/28/8/s_1_1_28_5', 8, 5, 's 1 1 28 5', '2018-06-28 16:31:48'),
	(9, '/upload/2018/06/28/8/s_1_1_28_6', 8, 6, 's 1 1 28 6', '2018-06-28 16:31:48'),
	(10, '/upload/2018/06/28/8/s_1_1_28_7', 8, 7, 's 1 1 28 7', '2018-06-28 16:31:48'),
	(11, '/upload/2018/06/28/8/s_1_1_28_8', 8, 8, 's 1 1 28 8', '2018-06-28 16:31:48'),
	(12, '/upload/2018/06/28/9/odnushka_nedaleko_ot_metro_1_1_28_1', 9, 1, 'odnushka nedaleko ot metro 1 1 28 1', '2018-06-28 21:09:43'),
	(13, '/upload/2018/06/28/9/odnushka_nedaleko_ot_metro_1_1_28_2', 9, 2, 'odnushka nedaleko ot metro 1 1 28 2', '2018-06-28 21:09:43'),
	(14, '/upload/2018/06/28/9/odnushka_nedaleko_ot_metro_1_1_28_3', 9, 3, 'odnushka nedaleko ot metro 1 1 28 3', '2018-06-28 21:09:43'),
	(15, '/upload/2018/06/28/9/odnushka_nedaleko_ot_metro_1_1_28_4', 9, 4, 'odnushka nedaleko ot metro 1 1 28 4', '2018-06-28 21:09:43'),
	(16, '/upload/2018/06/28/10/m_pionerskaja_kolomjazhskij_prospekt_1600_28_1', 10, 1, 'm pionerskaja kolomjazhskij prospekt 1600 28 1', '2018-06-28 21:14:49'),
	(17, '/upload/2018/06/28/10/m_pionerskaja_kolomjazhskij_prospekt_1600_28_2', 10, 2, 'm pionerskaja kolomjazhskij prospekt 1600 28 2', '2018-06-28 21:14:50'),
	(18, '/upload/2018/06/28/10/m_pionerskaja_kolomjazhskij_prospekt_1600_28_3', 10, 3, 'm pionerskaja kolomjazhskij prospekt 1600 28 3', '2018-06-28 21:14:50'),
	(19, '/upload/2018/06/28/11/udobnyj_dom_kolomjazh_1385_28_50_1', 11, 1, 'udobnyj dom kolomjazh 1385 28 50 1', '2018-06-28 21:16:50'),
	(20, '/upload/2018/06/28/11/udobnyj_dom_kolomjazh_1385_28_50_2', 11, 2, 'udobnyj dom kolomjazh 1385 28 50 2', '2018-06-28 21:16:50'),
	(21, '/upload/2018/06/28/11/udobnyj_dom_kolomjazh_1385_28_50_3', 11, 3, 'udobnyj dom kolomjazh 1385 28 50 3', '2018-06-28 21:16:51'),
	(22, '/upload/2018/06/28/12/1k_kv_komendantskij_prospekt_171_komendantskij_prospekt_1600_28_02_1', 12, 1, '1k kv komendantskij prospekt 171 komendantskij prospekt 1600 28 02 1', '2018-06-28 21:19:02'),
	(23, '/upload/2018/06/28/12/1k_kv_komendantskij_prospekt_171_komendantskij_prospekt_1600_28_02_2', 12, 2, '1k kv komendantskij prospekt 171 komendantskij prospekt 1600 28 02 2', '2018-06-28 21:19:02'),
	(24, '/upload/2018/06/28/12/1k_kv_komendantskij_prospekt_171_komendantskij_prospekt_1600_28_02_3', 12, 3, '1k kv komendantskij prospekt 171 komendantskij prospekt 1600 28 02 3', '2018-06-28 21:19:02'),
	(25, '/upload/2018/06/28/12/1k_kv_komendantskij_prospekt_171_komendantskij_prospekt_1600_28_02_4', 12, 4, '1k kv komendantskij prospekt 171 komendantskij prospekt 1600 28 02 4', '2018-06-28 21:19:03'),
	(26, '/upload/2018/06/28/12/1k_kv_komendantskij_prospekt_171_komendantskij_prospekt_1600_28_02_5', 12, 5, '1k kv komendantskij prospekt 171 komendantskij prospekt 1600 28 02 5', '2018-06-28 21:19:03'),
	(27, '/upload/2018/06/28/13/odnushka_nedaleko_ot_metro_komendantskij_prospekt_1600_28_49_1', 13, 1, 'odnushka nedaleko ot metro komendantskij prospekt 1600 28 49 1', '2018-06-28 21:20:49'),
	(28, '/upload/2018/06/28/13/odnushka_nedaleko_ot_metro_komendantskij_prospekt_1600_28_49_2', 13, 2, 'odnushka nedaleko ot metro komendantskij prospekt 1600 28 49 2', '2018-06-28 21:20:50'),
	(29, '/upload/2018/06/28/13/odnushka_nedaleko_ot_metro_komendantskij_prospekt_1600_28_49_3', 13, 3, 'odnushka nedaleko ot metro komendantskij prospekt 1600 28 49 3', '2018-06-28 21:20:50'),
	(30, '/upload/2018/06/28/13/odnushka_nedaleko_ot_metro_komendantskij_prospekt_1600_28_49_4', 13, 4, 'odnushka nedaleko ot metro komendantskij prospekt 1600 28 49 4', '2018-06-28 21:20:50'),
	(31, '/upload/2018/06/28/14/odnushka_nedaleko_ot_metro_komendantskij_prosp_18_1600_28_19_1', 14, 1, 'odnushka nedaleko ot metro komendantskij prosp 18 1600 28 19 1', '2018-06-28 21:23:19'),
	(32, '/upload/2018/06/28/14/odnushka_nedaleko_ot_metro_komendantskij_prosp_18_1600_28_19_2', 14, 2, 'odnushka nedaleko ot metro komendantskij prosp 18 1600 28 19 2', '2018-06-28 21:23:19'),
	(33, '/upload/2018/06/28/14/odnushka_nedaleko_ot_metro_komendantskij_prosp_18_1600_28_19_3', 14, 3, 'odnushka nedaleko ot metro komendantskij prosp 18 1600 28 19 3', '2018-06-28 21:23:19'),
	(34, '/upload/2018/06/28/15/sdf_komendantskij_prosp_12_5_28_38_1', 15, 1, 'sdf komendantskij prosp 12 5 28 38 1', '2018-06-28 22:24:38'),
	(35, '/upload/2018/06/28/15/sdf_komendantskij_prosp_12_5_28_38_2', 15, 2, 'sdf komendantskij prosp 12 5 28 38 2', '2018-06-28 22:24:39'),
	(36, '/upload/2018/06/28/15/sdf_komendantskij_prosp_12_5_28_38_3', 15, 3, 'sdf komendantskij prosp 12 5 28 38 3', '2018-06-28 22:24:39'),
	(37, '/upload/2018/06/28/16/yvryapr_akademika_haritona_2_1600_28_14_1', 16, 1, 'yvryapr akademika haritona 2 1600 28 14 1', '2018-06-28 22:26:14'),
	(38, '/upload/2018/06/28/16/yvryapr_akademika_haritona_2_1600_28_14_2', 16, 2, 'yvryapr akademika haritona 2 1600 28 14 2', '2018-06-28 22:26:14'),
	(39, '/upload/2018/06/28/16/yvryapr_akademika_haritona_2_1600_28_14_3', 16, 3, 'yvryapr akademika haritona 2 1600 28 14 3', '2018-06-28 22:26:15'),
	(40, '/upload/2018/06/28/16/yvryapr_akademika_haritona_2_1600_28_14_4', 16, 4, 'yvryapr akademika haritona 2 1600 28 14 4', '2018-06-28 22:26:15'),
	(41, '/upload/2018/06/29/17/prostaja_3_h_spalka_stroitelej_5_1600_29_33_1', 17, 1, 'prostaja 3 h spalka stroitelej 5 1600 29 33 1', '2018-06-29 12:06:33'),
	(42, '/upload/2018/06/29/17/prostaja_3_h_spalka_stroitelej_5_1600_29_33_2', 17, 2, 'prostaja 3 h spalka stroitelej 5 1600 29 33 2', '2018-06-29 12:06:33'),
	(43, '/upload/2018/06/29/19/tekst_opisanija_stroitelej_1_2000_29_55_1', 19, 1, 'tekst opisanija stroitelej 1 2000 29 55 1', '2018-06-29 12:10:00'),
	(44, '/upload/2018/06/29/19/tekst_opisanija_stroitelej_1_2000_29_55_2', 19, 2, 'tekst opisanija stroitelej 1 2000 29 55 2', '2018-06-29 12:10:01'),
	(45, '/upload/2018/06/29/19/tekst_opisanija_stroitelej_1_2000_29_55_3', 19, 3, 'tekst opisanija stroitelej 1 2000 29 55 3', '2018-06-29 12:10:01'),
	(46, '/upload/2018/06/29/20/kvartira_na_kosmonavtov_kosmonavtov_9_40000_29_54_1', 20, 1, 'kvartira na kosmonavtov kosmonavtov 9 40000 29 54 1', '2018-06-29 13:31:54'),
	(47, '/upload/2018/06/29/20/kvartira_na_kosmonavtov_kosmonavtov_9_40000_29_54_2', 20, 2, 'kvartira na kosmonavtov kosmonavtov 9 40000 29 54 2', '2018-06-29 13:31:54'),
	(48, '/upload/2018/06/29/20/kvartira_na_kosmonavtov_kosmonavtov_9_40000_29_54_3', 20, 3, 'kvartira na kosmonavtov kosmonavtov 9 40000 29 54 3', '2018-06-29 13:31:54'),
	(49, '/upload/2018/06/30/21/kosmonavtov_na_9_mest_kosmonavtov_4_9900_30_35_1', 21, 1, 'kosmonavtov na 9 mest kosmonavtov 4 9900 30 35 1', '2018-06-30 18:06:36'),
	(50, '/upload/2018/06/30/21/kosmonavtov_na_9_mest_kosmonavtov_4_9900_30_35_2', 21, 2, 'kosmonavtov na 9 mest kosmonavtov 4 9900 30 35 2', '2018-06-30 18:06:36'),
	(51, '/upload/2018/06/30/21/kosmonavtov_na_9_mest_kosmonavtov_4_9900_30_35_3', 21, 3, 'kosmonavtov na 9 mest kosmonavtov 4 9900 30 35 3', '2018-06-30 18:06:36'),
	(52, '/upload/2018/06/30/22/vap_oligino_8_1_30_35_1', 22, 1, 'vap oligino 8 1 30 35 1', '2018-06-30 18:08:36'),
	(53, '/upload/2018/06/30/22/vap_oligino_8_1_30_35_2', 22, 2, 'vap oligino 8 1 30 35 2', '2018-06-30 18:08:36'),
	(54, '/upload/2018/06/30/23/oligino_oligino_2_1_30_56_1', 23, 1, 'oligino oligino 2 1 30 56 1', '2018-06-30 18:09:56');
/*!40000 ALTER TABLE `kv_image` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_migration
CREATE TABLE IF NOT EXISTS `kv_migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_migration: ~22 rows (приблизительно)
/*!40000 ALTER TABLE `kv_migration` DISABLE KEYS */;
INSERT INTO `kv_migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1529354389),
	('m130524_201442_init', 1529354392),
	('m180618_203545_create_cache_table', 1529354418),
	('m180624_115217_create_article_table', 1529841406),
	('m180624_135425_create_country_table', 1529850358),
	('m180624_135652_create_city_table', 1529850358),
	('m180624_140344_create_type_housing_table', 1529850358),
	('m180624_140947_create_device_service_table', 1529850358),
	('m180624_141350_create_currency_table', 1529850397),
	('m180624_141354_create_service_table', 1529850397),
	('m180624_141356_create_status_table', 1529851533),
	('m180624_141358_create_term_table', 1530258565),
	('m180624_143217_create_realty_table', 1529851786),
	('m180624_150314_create_image_table', 1529852999),
	('m180624_151624_create_realty_view_table', 1529853837),
	('m180624_152526_create_realty_service_table', 1529854488),
	('m180624_152547_create_realty_device_service_table', 1529854489),
	('m180629_074527_create_site_settings_table', 1530258565),
	('m180629_075405_create_realty_term_table', 1530259577),
	('m180708_161630_create_reservation_table', 1531068732),
	('m180711_160303_create_user_address_table', 1531325787),
	('m180711_161126_update_reservation_table', 1531325787),
	('m180711_185207_create_reservation_addresses_table', 1531335232);
/*!40000 ALTER TABLE `kv_migration` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_realty
CREATE TABLE IF NOT EXISTS `kv_realty` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `country_id` int(11) unsigned NOT NULL,
  `city_id` int(11) unsigned NOT NULL,
  `type_housing_id` int(11) unsigned NOT NULL,
  `places` int(11) NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `house` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `housing` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apartment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footage` int(11) NOT NULL,
  `number_rooms` int(11) NOT NULL,
  `pledge` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `laws` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `latitude` decimal(11,8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `status_id` (`status_id`),
  KEY `user_id` (`user_id`),
  KEY `country_id` (`country_id`),
  KEY `city_id` (`city_id`),
  KEY `type_housing_id` (`type_housing_id`),
  KEY `created` (`created`),
  KEY `updated` (`updated`),
  CONSTRAINT `city_id` FOREIGN KEY (`city_id`) REFERENCES `kv_city` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `country_id` FOREIGN KEY (`country_id`) REFERENCES `kv_country` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `status_id` FOREIGN KEY (`status_id`) REFERENCES `kv_status` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `type_housing_id` FOREIGN KEY (`type_housing_id`) REFERENCES `kv_type_housing` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `kv_user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_realty: ~16 rows (приблизительно)
/*!40000 ALTER TABLE `kv_realty` DISABLE KEYS */;
INSERT INTO `kv_realty` (`id`, `url`, `status_id`, `user_id`, `country_id`, `city_id`, `type_housing_id`, `places`, `street`, `house`, `housing`, `apartment`, `footage`, `number_rooms`, `pledge`, `price`, `created`, `updated`, `title`, `description`, `laws`, `longitude`, `latitude`) VALUES
	(7, 'f-1-1-28', 1, 1, 1, 1, 1, 1, 'f', '1', '', '', 1, 1, 1, 1, '2018-06-28 16:25:29', '2018-06-28 16:25:29', 'f', 'f', '', NULL, NULL),
	(8, 's-1-1-28', 1, 1, 1, 1, 1, 2, 's', '2', '2', '2', 2, 2, 0, 1000, '2018-06-28 16:31:47', '2018-06-28 16:31:47', 's', 's', 's', NULL, NULL),
	(9, 'odnushka-nedaleko-ot-metro-1-1-28', 2, 1, 1, 1, 1, 3, 'Комендантский просп.', '17', '1', '', 40, 1, 0, 2500, '2018-06-28 21:09:42', '2018-06-28 22:28:00', 'Однушка недалеко от метро', 'Отличная просторная квартира в 1 минуте ходьбы от метро. Рядом торговые центры, аптеки, все, что только может понадобиться и даже нотариус!\r\n2 комфортных спальных места, но может разместиться до 4 человек.', '1. Заселение не раньше 12 часов\r\n2. Запрещено курить в квартире\r\n3. Шуметь можно, но в рамках законодательства\r\n4. При любых поломках и неисправностях сразу же связаться с компанией Квартари', 30.25740800, 60.00807400),
	(10, 'm-pionerskaja-kolomjazhskij-prospekt-1600-28', 2, 1, 1, 2, 1, 4, 'Коломяжский проспект', '15', '1', '43', 45, 2, 5000, 1600, '2018-06-28 21:14:49', '2018-06-28 22:28:01', 'м. Пионерская', 'Квартира', 'Стандарт', 30.25740800, 60.00807400),
	(11, 'udobnyj-dom-kolomjazh-1385-28-50', 2, 1, 1, 1, 2, 1, 'Коломяж', '3', '1', '', 60, 3, 0, 1385, '2018-06-28 21:16:50', '2018-06-28 22:28:01', 'Удобный дом', '1к.кв. Коломяжский проспект 15/2', 'Стандартные', 30.25740800, 60.00807400),
	(12, '1k-kv-komendantskij-prospekt-171-komendantskij-prospekt-1600-28-02', 2, 1, 1, 1, 1, 2, 'Комендантский проспект', '', '', '', 25, 1, 7000, 1600, '2018-06-28 21:19:02', '2018-06-28 22:28:02', '1к.кв. Комендантский проспект 17/1', 'Квартира', 'Стандарт', 30.25740800, 60.00807400),
	(13, 'odnushka-nedaleko-ot-metro-komendantskij-prospekt-1600-28-49', 2, 1, 1, 1, 1, 2, 'Комендантский проспект', '', '', '', 40, 1, 10000, 1600, '2018-06-28 21:20:49', '2018-06-28 22:28:02', 'Однушка недалеко от метро', 'Отличная просторная квартира в 1 минуте ходьбы от метро. Рядом торговые центры, аптеки, все, что только может понадобиться и даже нотариус!\r\n2 комфортных спальных места, но может разместиться до 4 человек.', '1. Заселение не раньше 12 часов\r\n2. Запрещено курить в квартире\r\n3. Шуметь можно, но в рамках законодательства\r\n4. При любых поломках и неисправностях сразу же связаться с компанией Квартари', 30.25740800, 60.00807400),
	(14, 'odnushka-nedaleko-ot-metro-komendantskij-prosp-18-1600-28-19', 2, 1, 1, 1, 1, 3, 'Комендантский просп.', '18', '', '', 50, 2, 14000, 1600, '2018-06-28 21:23:19', '2018-06-28 22:28:03', 'Однушка недалеко от метро', 'Отличная просторная квартира в 1 минуте ходьбы от метро. Рядом торговые центры, аптеки, все, что только может понадобиться и даже нотариус!\r\n2 комфортных спальных места, но может разместиться до 4 человек.', '', 30.25740800, 60.00807400),
	(15, 'sdf-komendantskij-prosp-12-5-28-38', 2, 1, 1, 1, 1, 5, 'Комендантский просп', '12', '1', '1', 10, 1, 0, 5, '2018-06-28 22:24:38', '2018-06-28 22:28:11', 'sdf', 'sdf', 'sgdf', 30.25740800, 60.00807400),
	(16, 'yvryapr-akademika-haritona-2-1600-28-14', 2, 1, 1, 1, 1, 2, 'Академика Харитона', '2', '1', '', 40, 2, 0, 1600, '2018-06-28 22:26:14', '2018-06-28 22:28:13', 'ыврыапр', 'ырывпапырпар', 'ырпыа\r\nывапыв\r\nпыва', 30.24280060, 60.04812870),
	(17, 'prostaja-3-h-spalka-stroitelej-5-1600-29-33', 2, 1, 1, 1, 1, 3, 'Строителей', '5', '', '', 60, 2, 10000, 1600, '2018-06-29 12:06:33', '2018-06-29 13:32:23', 'Простая 3-х спалка', 'Простая 3-х спалка удобная чистая', '', 29.97890810, 60.04347490),
	(19, 'tekst-opisanija-stroitelej-1-2000-29-55', 2, 1, 1, 1, 1, 2, 'Строителей', '1', '', '', 20, 1, 5000, 2000, '2018-06-29 12:09:55', '2018-06-29 13:32:25', 'текст описания', 'некой что то там)', '', 30.51800580, 59.91888770),
	(20, 'kvartira-na-kosmonavtov-kosmonavtov-9-40000-29-54', 2, 1, 1, 2, 1, 5, 'Космонавтов', '9', '', '', 250, 4, 100000, 40000, '2018-06-29 13:31:54', '2018-06-29 13:32:27', 'Квартира на космонавтов', 'Некое описание квартиры', '', 37.65727940, 55.82191430),
	(21, 'kosmonavtov-na-9-mest-kosmonavtov-4-9900-30-35', 2, 1, 1, 1, 1, 9, 'Космонавтов', '4', '', '', 9, 1, 100000, 9900, '2018-06-30 18:06:35', '2018-06-30 18:10:07', 'космонавтов на 9 мест', 'Описание на 9 мест', 'Правила на 9 мест', 30.34734240, 59.86365290),
	(22, 'vap-oligino-8-1-30-35', 1, 1, 1, 1, 1, 6, 'Ольгино', '8', '', '', 10, 1, 1, 1, '2018-06-30 18:08:35', '2018-06-30 18:08:35', 'вап', 'впывапыап', '', 30.27854110, 59.97423000),
	(23, 'oligino-oligino-2-1-30-56', 1, 1, 1, 1, 2, 1, 'Ольгино', '2', '1', '', 1, 1, 1, 1, '2018-06-30 18:09:56', '2018-06-30 18:09:56', 'Ольгино', 'Ольгино', 'Ольгино', 30.21318290, 60.00249670);
/*!40000 ALTER TABLE `kv_realty` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_realty_device_service
CREATE TABLE IF NOT EXISTS `kv_realty_device_service` (
  `realty_id` int(11) unsigned NOT NULL,
  `device_service_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`realty_id`,`device_service_id`),
  KEY `realty_id` (`realty_id`),
  KEY `device_service_id` (`device_service_id`),
  CONSTRAINT `fk_rds_device_service_id` FOREIGN KEY (`device_service_id`) REFERENCES `kv_device_service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_rds_realty_id` FOREIGN KEY (`realty_id`) REFERENCES `kv_realty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_realty_device_service: ~40 rows (приблизительно)
/*!40000 ALTER TABLE `kv_realty_device_service` DISABLE KEYS */;
INSERT INTO `kv_realty_device_service` (`realty_id`, `device_service_id`) VALUES
	(7, 1),
	(7, 2),
	(7, 3),
	(7, 4),
	(8, 1),
	(9, 1),
	(9, 2),
	(9, 3),
	(9, 4),
	(9, 5),
	(9, 6),
	(9, 7),
	(9, 8),
	(10, 1),
	(10, 2),
	(10, 3),
	(11, 1),
	(12, 5),
	(12, 6),
	(13, 6),
	(13, 7),
	(13, 8),
	(14, 1),
	(14, 2),
	(15, 1),
	(16, 2),
	(16, 3),
	(17, 2),
	(17, 3),
	(19, 1),
	(19, 2),
	(19, 3),
	(20, 1),
	(20, 2),
	(20, 3),
	(21, 1),
	(21, 2),
	(22, 2),
	(23, 1),
	(23, 2);
/*!40000 ALTER TABLE `kv_realty_device_service` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_realty_service
CREATE TABLE IF NOT EXISTS `kv_realty_service` (
  `realty_id` int(11) unsigned NOT NULL,
  `service_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`realty_id`,`service_id`),
  KEY `realty_id` (`realty_id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `fk_realty_id` FOREIGN KEY (`realty_id`) REFERENCES `kv_realty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_service_id` FOREIGN KEY (`service_id`) REFERENCES `kv_service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_realty_service: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `kv_realty_service` DISABLE KEYS */;
INSERT INTO `kv_realty_service` (`realty_id`, `service_id`) VALUES
	(7, 4),
	(8, 1),
	(9, 1),
	(9, 2),
	(9, 3),
	(9, 4),
	(11, 1),
	(12, 2),
	(14, 2),
	(17, 1),
	(19, 1),
	(22, 4),
	(23, 4);
/*!40000 ALTER TABLE `kv_realty_service` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_realty_term
CREATE TABLE IF NOT EXISTS `kv_realty_term` (
  `realty_id` int(11) unsigned NOT NULL,
  `term_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`realty_id`,`term_id`),
  KEY `realty_id` (`realty_id`),
  KEY `term_id` (`term_id`),
  CONSTRAINT `fk_rt_realty_id` FOREIGN KEY (`realty_id`) REFERENCES `kv_realty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_rt_term_id` FOREIGN KEY (`term_id`) REFERENCES `kv_term` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_realty_term: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `kv_realty_term` DISABLE KEYS */;
INSERT INTO `kv_realty_term` (`realty_id`, `term_id`) VALUES
	(19, 1),
	(19, 3),
	(20, 3),
	(21, 1),
	(22, 1),
	(22, 3),
	(23, 1);
/*!40000 ALTER TABLE `kv_realty_term` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_realty_view
CREATE TABLE IF NOT EXISTS `kv_realty_view` (
  `id` int(11) unsigned NOT NULL,
  `views` int(11) unsigned NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` int(11) unsigned NOT NULL DEFAULT 0,
  UNIQUE KEY `id` (`id`),
  KEY `updated` (`updated`),
  CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `kv_realty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_realty_view: ~16 rows (приблизительно)
/*!40000 ALTER TABLE `kv_realty_view` DISABLE KEYS */;
INSERT INTO `kv_realty_view` (`id`, `views`, `created`, `updated`) VALUES
	(7, 1, '2018-06-28 16:25:30', 1530192330),
	(8, 1, '2018-06-28 16:31:48', 1530192708),
	(9, 1, '2018-06-28 21:09:43', 1530209383),
	(10, 1, '2018-06-28 21:14:50', 1530209690),
	(11, 1, '2018-06-28 21:16:51', 1530209811),
	(12, 1, '2018-06-28 21:19:03', 1530209943),
	(13, 1, '2018-06-28 21:20:50', 1530210050),
	(14, 1, '2018-06-28 21:23:19', 1530210199),
	(15, 1, '2018-06-28 22:24:39', 1530213879),
	(16, 1, '2018-06-28 22:26:15', 1530213975),
	(17, 1, '2018-06-29 12:06:33', 1530263193),
	(19, 1, '2018-06-29 12:10:01', 1530263401),
	(20, 1, '2018-06-29 13:31:54', 1530268314),
	(21, 1, '2018-06-30 18:06:36', 1530371196),
	(22, 1, '2018-06-30 18:08:36', 1530371316),
	(23, 1, '2018-06-30 18:09:56', 1530371396);
/*!40000 ALTER TABLE `kv_realty_view` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_reservation
CREATE TABLE IF NOT EXISTS `kv_reservation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `realty_id` int(11) unsigned NOT NULL,
  `status` int(11) unsigned NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_from` date NOT NULL DEFAULT current_timestamp(),
  `date_to` date NOT NULL DEFAULT '0000-00-00',
  `arrival_date` date DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_admin` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `realty_id` (`realty_id`),
  KEY `status` (`status`),
  KEY `start` (`date_from`),
  KEY `stop` (`date_to`),
  KEY `address_id` (`address_id`),
  CONSTRAINT `fk_rs_realty_id` FOREIGN KEY (`realty_id`) REFERENCES `kv_realty` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_reservation: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `kv_reservation` DISABLE KEYS */;
INSERT INTO `kv_reservation` (`id`, `user_id`, `realty_id`, `status`, `phone`, `name`, `email`, `date_from`, `date_to`, `arrival_date`, `comment`, `comment_admin`, `address_id`) VALUES
	(1, 1, 20, 1, '+7(111)111-11-11', 'coma', 'comaw@i.ua', '2018-07-11', '2018-07-19', NULL, 'fhf', '', 1);
/*!40000 ALTER TABLE `kv_reservation` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_reservation_addresses
CREATE TABLE IF NOT EXISTS `kv_reservation_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) unsigned NOT NULL,
  `fio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `place_birth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passport_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `information` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservation_id` (`reservation_id`),
  CONSTRAINT `fk_ra_reservation_id` FOREIGN KEY (`reservation_id`) REFERENCES `kv_reservation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_reservation_addresses: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `kv_reservation_addresses` DISABLE KEYS */;
INSERT INTO `kv_reservation_addresses` (`id`, `reservation_id`, `fio`, `date_birth`, `place_birth`, `passport_number`, `information`) VALUES
	(1, 1, 'test2', '2018-07-12', 'sdfsdfsdf', 'ewtsdgs', 'test1'),
	(2, 1, 'test2', '2018-07-12', 'sdfsdfsdf', 'ewtsdgs', 'test1');
/*!40000 ALTER TABLE `kv_reservation_addresses` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_service
CREATE TABLE IF NOT EXISTS `kv_service` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `currency_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `position` (`position`),
  KEY `currency_id` (`currency_id`),
  CONSTRAINT `currency` FOREIGN KEY (`currency_id`) REFERENCES `kv_currency` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_service: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `kv_service` DISABLE KEYS */;
INSERT INTO `kv_service` (`id`, `name`, `position`, `price`, `currency_id`) VALUES
	(1, 'Уборка ', 0, 400, 1),
	(2, 'Встреча гостей', 0, 150, 1),
	(3, 'Выезд гостей', 0, 150, 1),
	(4, 'Гостиничный набор', 0, 150, 1);
/*!40000 ALTER TABLE `kv_service` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_site_settings
CREATE TABLE IF NOT EXISTS `kv_site_settings` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_site_settings: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `kv_site_settings` DISABLE KEYS */;
INSERT INTO `kv_site_settings` (`name`, `value`, `title`) VALUES
	('site_address', 'Санкт-Петербург\r\nРоссия', 'Адрес'),
	('site_email', 'info@kvartari.ru', 'E-mail'),
	('site_phone', '+7 (800) 555-23-27', 'Телефон');
/*!40000 ALTER TABLE `kv_site_settings` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_status
CREATE TABLE IF NOT EXISTS `kv_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_status: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `kv_status` DISABLE KEYS */;
INSERT INTO `kv_status` (`id`, `name`) VALUES
	(2, 'Активно'),
	(4, 'Бан'),
	(1, 'Новае обьявление'),
	(3, 'Отказано');
/*!40000 ALTER TABLE `kv_status` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_term
CREATE TABLE IF NOT EXISTS `kv_term` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_term: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `kv_term` DISABLE KEYS */;
INSERT INTO `kv_term` (`id`, `name`) VALUES
	(3, 'Без детей'),
	(1, 'Без домашних животных'),
	(4, 'Без посредников');
/*!40000 ALTER TABLE `kv_term` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_type_housing
CREATE TABLE IF NOT EXISTS `kv_type_housing` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `position` (`position`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_type_housing: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `kv_type_housing` DISABLE KEYS */;
INSERT INTO `kv_type_housing` (`id`, `name`, `position`) VALUES
	(1, 'Квартира', 0),
	(2, 'Дом', 1),
	(3, 'Склад', 3);
/*!40000 ALTER TABLE `kv_type_housing` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_user
CREATE TABLE IF NOT EXISTS `kv_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` set('tenant','owner','admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'tenant',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_user: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `kv_user` DISABLE KEYS */;
INSERT INTO `kv_user` (`id`, `username`, `phone`, `role`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'coma', '+7(111)111-11-11', 'admin', 'Vlc23qFyum8hVs-Wg4P6sVcsvS5cHmv7', '$2y$13$dLTUAWbNGtgpz/B2GfJvf.h9mpEbFQdYC5WpCS21MPfHGTBXcjhju', NULL, 'comaw@i.ua', 10, 1529834989, 1529840319);
/*!40000 ALTER TABLE `kv_user` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.kv_user_address
CREATE TABLE IF NOT EXISTS `kv_user_address` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `type` int(1) unsigned NOT NULL DEFAULT 1,
  `fio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `place_birth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passport_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `information` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type` (`type`),
  CONSTRAINT `fk_ua_user_id` FOREIGN KEY (`user_id`) REFERENCES `kv_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.kv_user_address: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `kv_user_address` DISABLE KEYS */;
INSERT INTO `kv_user_address` (`id`, `user_id`, `type`, `fio`, `date_birth`, `place_birth`, `passport_number`, `information`) VALUES
	(1, 1, 1, 'Сергей', '2018-07-12', 'ываы ываыа', 'пвапываыва', 'ывппа');
/*!40000 ALTER TABLE `kv_user_address` ENABLE KEYS */;

-- Дамп структуры для таблица kvartari.test
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` set('tenant','owner','admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'tenant',
  `data` longblob DEFAULT NULL,
  `t` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы kvartari.test: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
/*!40000 ALTER TABLE `test` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
