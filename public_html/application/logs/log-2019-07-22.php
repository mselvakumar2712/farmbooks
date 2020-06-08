<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-22 00:43:21 --> 404 Page Not Found: /index
ERROR - 2019-07-22 00:43:24 --> 404 Page Not Found: /index
ERROR - 2019-07-22 00:43:26 --> 404 Page Not Found: /index
ERROR - 2019-07-22 00:43:28 --> 404 Page Not Found: /index
ERROR - 2019-07-22 02:54:25 --> 404 Page Not Found: /index
ERROR - 2019-07-22 05:03:12 --> Query error: Unknown column 'ref.farmer_id1' in 'on clause' - Invalid query: SELECT `ref`.`id`, `tcnm`.`name` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `tvm`.`name` As `village_name`, `tpm`.`name` As `panchayat_name`, `tf`.`door_no`, `tf`.`street`, `ref`.`quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_name_master` as `tcnm` ON `tcnm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer` as `tf` ON `tf`.`id` = `ref`.`farmer_id1`
INNER JOIN `trv_village_master` `tvm` ON `tvm`.`id` = `tf`.`village`
INNER JOIN `trv_panchayat_master` `tpm` ON `tpm`.`panchayat_code` = `tf`.`panchayat`
WHERE `ref`.`id` = '3'
AND `ref`.`status` = '1'
ERROR - 2019-07-22 05:08:52 --> 404 Page Not Found: ../modules/api/controllers/Notification/saleList
ERROR - 2019-07-22 05:09:04 --> 404 Page Not Found: ../modules/api/controllers/Fdiary/saleList
ERROR - 2019-07-22 05:09:22 --> Query error: Unknown column 'ref.farmer_id1' in 'where clause' - Invalid query: SELECT `ref`.`id`, `ref`.`crop_variety_id`, `tcvm`.`variety` `crop_variety_name`, `ref`.`output_id`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`sale_status`, `ref`.`remarks`, `ref`.`flag`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
WHERE `ref`.`farmer_id1` = '82'
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 05:18:01 --> Query error: Unknown column 'tf.door_no + tf.street' in 'field list' - Invalid query: SELECT `ref`.`id`, `tf`.`profile_name` `farmer_name`, `tf`.`door_no + tf`.`street` `address`, `tf`.`mobile` `mobile_no`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom` `quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`id` = '3'
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 05:22:40 --> 404 Page Not Found: /index
ERROR - 2019-07-22 05:34:29 --> Severity: Notice --> Undefined index: farmer_name /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 62
ERROR - 2019-07-22 05:35:37 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Notification.php:62) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 05:35:37 --> Severity: Error --> Cannot use object of type stdClass as array /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 62
ERROR - 2019-07-22 05:40:14 --> 404 Page Not Found: /index
ERROR - 2019-07-22 05:54:21 --> 404 Page Not Found: /index
ERROR - 2019-07-22 05:54:22 --> 404 Page Not Found: /index
ERROR - 2019-07-22 05:56:48 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '2062'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-22 05:58:05 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '2062'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-22 06:01:44 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '2062'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-22 06:21:41 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:24:15 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:30 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:33 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:33 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:34 --> 404 Page Not Found: ../modules/home/controllers/Home/wp-login.php
ERROR - 2019-07-22 06:51:37 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:37 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:38 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:40 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:42 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:43 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:45 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:46 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:47 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:47 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:48 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:49 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:49 --> 404 Page Not Found: /index
ERROR - 2019-07-22 06:51:50 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:39:55 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:39:56 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:39:59 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:39:59 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:40:31 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:40:32 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:40:34 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:40:35 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:40:36 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:40:37 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:53:03 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:53:03 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:53:05 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:53:05 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:53:10 --> 404 Page Not Found: /index
ERROR - 2019-07-22 07:53:10 --> 404 Page Not Found: /index
ERROR - 2019-07-22 08:12:27 --> 404 Page Not Found: /index
ERROR - 2019-07-22 08:12:27 --> 404 Page Not Found: /index
ERROR - 2019-07-22 10:04:45 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-22 10:04:45 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-22 10:05:08 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-22 10:05:08 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-22 10:08:43 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-22 10:08:43 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-22 10:08:45 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-22 10:08:45 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-22 10:08:52 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-22 10:08:52 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-22 10:08:57 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-22 10:08:57 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-22 10:29:51 --> 404 Page Not Found: /index
ERROR - 2019-07-22 10:29:52 --> 404 Page Not Found: /index
ERROR - 2019-07-22 10:30:48 --> 404 Page Not Found: ../modules/api/controllers/Notification/send_single_device
ERROR - 2019-07-22 10:30:56 --> 404 Page Not Found: ../modules/api/controllers/Notification/send_single_device
ERROR - 2019-07-22 10:33:52 --> 404 Page Not Found: /index
ERROR - 2019-07-22 10:33:54 --> 404 Page Not Found: /index
ERROR - 2019-07-22 10:35:03 --> 404 Page Not Found: /index
ERROR - 2019-07-22 10:35:04 --> 404 Page Not Found: /index
ERROR - 2019-07-22 10:36:42 --> 404 Page Not Found: /index
ERROR - 2019-07-22 10:36:43 --> 404 Page Not Found: /index
ERROR - 2019-07-22 10:39:58 --> 404 Page Not Found: /index
ERROR - 2019-07-22 10:39:58 --> 404 Page Not Found: /index
ERROR - 2019-07-22 10:49:04 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-22 10:49:04 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-22 10:54:17 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '2062'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-22 10:54:22 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '2062'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-22 10:54:28 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '2062'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-22 11:08:49 --> 404 Page Not Found: /index
ERROR - 2019-07-22 11:08:50 --> 404 Page Not Found: /index
ERROR - 2019-07-22 11:12:42 --> 404 Page Not Found: /index
ERROR - 2019-07-22 11:12:42 --> 404 Page Not Found: /index
ERROR - 2019-07-22 11:15:02 --> 404 Page Not Found: ../modules/api/controllers/Notification/send_single_device
ERROR - 2019-07-22 11:15:15 --> Severity: Warning --> Invalid argument supplied for foreach() /home/farmbooks/public_html/system/database/DB_query_builder.php 294
ERROR - 2019-07-22 11:15:15 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2019-07-22 11:15:15 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:15:35 --> 404 Page Not Found: /index
ERROR - 2019-07-22 11:15:35 --> 404 Page Not Found: /index
ERROR - 2019-07-22 11:16:04 --> Severity: Warning --> Invalid argument supplied for foreach() /home/farmbooks/public_html/system/database/DB_query_builder.php 294
ERROR - 2019-07-22 11:16:04 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2019-07-22 11:16:04 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:16:43 --> 404 Page Not Found: ../modules/api/controllers/Notification/send_single_device
ERROR - 2019-07-22 11:18:32 --> Severity: Notice --> Array to string conversion /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-22 11:18:32 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom` `quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`id` = Array
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 11:18:32 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:19:03 --> Query error: Table 'farmbook_prod.fpo_fd_sale1' doesn't exist - Invalid query: SELECT `id`
FROM `fpo_fd_sale1`
WHERE `farmer_id` = '82'
ORDER BY `id`
ERROR - 2019-07-22 11:19:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '0, 1' at line 4 - Invalid query: SELECT `id`
FROM `fpo_fd_sale1`
WHERE `farmer_id` = '82'
ORDER BY `id DESC LIMIT` 0, 1
ERROR - 2019-07-22 11:20:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`LIMIT`' at line 4 - Invalid query: SELECT `id`
FROM `fpo_fd_sale1`
WHERE `farmer_id` = '82'
ORDER BY `id DESC` `LIMIT`
ERROR - 2019-07-22 11:20:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '0, 1' at line 4 - Invalid query: SELECT `id`
FROM `fpo_fd_sale1`
WHERE `farmer_id` = '82'
ORDER BY `id DESC LIMIT` 0, 1
ERROR - 2019-07-22 11:20:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '0, 1' at line 4 - Invalid query: SELECT `id`
FROM `fpo_fd_sale`
WHERE `farmer_id` = '82'
ORDER BY `id DESC LIMIT` 0, 1
ERROR - 2019-07-22 11:21:30 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/models/Fdiary_Model.php:716) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:21:30 --> Severity: Error --> Call to undefined method CI_DB_mysqli_driver::desc() /home/farmbooks/public_html/application/modules/api/models/Fdiary_Model.php 716
ERROR - 2019-07-22 11:23:36 --> Severity: Notice --> Array to string conversion /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-22 11:23:36 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom` `quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`id` = Array
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 11:23:36 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:24:12 --> Severity: Notice --> Array to string conversion /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 59
ERROR - 2019-07-22 11:24:12 --> Severity: Notice --> Array to string conversion /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-22 11:24:12 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom` `quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`id` = Array
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 11:24:12 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:24:26 --> Severity: 4096 --> Object of class stdClass could not be converted to string /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 59
ERROR - 2019-07-22 11:24:26 --> Severity: Notice --> Array to string conversion /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-22 11:24:26 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom` `quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`id` = Array
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 11:24:26 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:25:05 --> Severity: Notice --> Array to string conversion /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-22 11:25:05 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom` `quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`id` = Array
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 11:25:05 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Notification.php:59) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:25:42 --> Query error: Unknown column 'id1' in 'order clause' - Invalid query: SELECT `id`
FROM `fpo_fd_sale`
WHERE `farmer_id` = '82'
ORDER BY `id1`
ERROR - 2019-07-22 11:26:08 --> Severity: Notice --> Array to string conversion /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-22 11:26:08 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom` `quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`id` = Array
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 11:26:08 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Notification.php:59) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:26:20 --> Query error: Unknown column 'id1' in 'order clause' - Invalid query: SELECT `id`
FROM `fpo_fd_sale`
WHERE `farmer_id` = '82'
ORDER BY `id1` DESC
ERROR - 2019-07-22 11:28:20 --> Query error: Unknown column 'id1' in 'order clause' - Invalid query: SELECT `id`
FROM `fpo_fd_sale`
WHERE `farmer_id` = '82'
ORDER BY `id1` DESC
 LIMIT 1, 0
ERROR - 2019-07-22 11:28:37 --> Query error: Unknown column 'id1' in 'order clause' - Invalid query: SELECT `id`
FROM `fpo_fd_sale`
WHERE `farmer_id` = '82'
ORDER BY `id1` DESC
 LIMIT 1
ERROR - 2019-07-22 11:29:36 --> Severity: Notice --> Array to string conversion /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-22 11:29:36 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom` `quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`id` = Array
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 11:29:36 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Notification.php:59) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:29:59 --> Severity: Notice --> Undefined index: id /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 59
ERROR - 2019-07-22 11:29:59 --> Severity: Notice --> Array to string conversion /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-22 11:29:59 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom` `quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`id` = Array
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 11:29:59 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:30:19 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Notification.php:58) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:30:19 --> Severity: Compile Error --> Can't use function return value in write context /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 58
ERROR - 2019-07-22 11:30:41 --> Severity: Notice --> Array to string conversion /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-22 11:30:41 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom` `quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`id` = Array
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 11:30:41 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Notification.php:59) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:31:11 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Notification.php:59) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:31:11 --> Severity: Error --> Function name must be a string /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 59
ERROR - 2019-07-22 11:33:58 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Notification.php:59) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:33:58 --> Severity: Error --> Function name must be a string /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 59
ERROR - 2019-07-22 11:34:21 --> Severity: 4096 --> Object of class stdClass could not be converted to string /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-22 11:34:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC' at line 9 - Invalid query: SELECT `ref`.`id`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom` `quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`id` = 
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 11:34:21 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Notification.php:59) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:34:50 --> Severity: 4096 --> Object of class stdClass could not be converted to string /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-22 11:34:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC' at line 9 - Invalid query: SELECT `ref`.`id`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom` `quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`id` = 
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 11:34:50 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Notification.php:59) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-22 11:35:07 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom` `quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`id` = '3'
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 12:09:26 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom` `quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`id` = '3'
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-22 12:09:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '82' at line 1 - Invalid query: 82
ERROR - 2019-07-22 12:10:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '82' at line 1 - Invalid query: 82
ERROR - 2019-07-22 12:11:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '82' at line 1 - Invalid query: 82
ERROR - 2019-07-22 12:11:53 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT village FROM trv_farmer1 WHERE farmer_id = '82' and tf.status = 1
ERROR - 2019-07-22 12:12:05 --> Query error: Unknown column 'farmer_id' in 'where clause' - Invalid query: SELECT village FROM trv_farmer WHERE farmer_id = '82' and tf.status = 1
ERROR - 2019-07-22 12:12:22 --> Query error: Unknown column 'tf.status' in 'where clause' - Invalid query: SELECT village FROM trv_farmer WHERE id = '82' and tf.status = 1
ERROR - 2019-07-22 12:12:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '32344' at line 1 - Invalid query: 32344
ERROR - 2019-07-22 12:13:12 --> Query error: Unknown column 'tua.token_key1' in 'field list' - Invalid query: SELECT tua.token_key1 FROM trv_farmer tf INNER JOIN trv_user_auth tua on tua.username = tf.mobile WHERE is_trader = 1 and tf.status = 1 and tf.village = '32344'
ERROR - 2019-07-22 12:19:00 --> Query error: Unknown column 'tua.token_key1' in 'field list' - Invalid query: SELECT tua.token_key1 FROM trv_farmer tf INNER JOIN trv_user_auth tua on tua.username = tf.mobile WHERE is_trader = 1 and tf.status = 1 and tf.panchayat = '2909006003'
ERROR - 2019-07-22 12:21:56 --> Severity: Warning --> Missing argument 1 for Api::getfarmerprofile() /home/farmbooks/public_html/application/modules/api/controllers/Api.php 299
ERROR - 2019-07-22 12:21:56 --> Severity: Notice --> Undefined variable: mobile_number /home/farmbooks/public_html/application/modules/api/controllers/Api.php 302
ERROR - 2019-07-22 12:23:37 --> Query error: Unknown column 'tua.token_key1' in 'field list' - Invalid query: SELECT tua.token_key1 FROM trv_farmer tf INNER JOIN trv_user_auth tua on tua.username = tf.mobile WHERE is_trader = 1 and tf.status = 1 and tf.panchayat = '2909001005'
ERROR - 2019-07-22 12:24:00 --> 404 Page Not Found: /index
ERROR - 2019-07-22 12:29:20 --> 404 Page Not Found: ../modules/api/controllers/Notification/send_single_device
ERROR - 2019-07-22 12:29:21 --> 404 Page Not Found: /index
ERROR - 2019-07-22 12:31:27 --> Severity: Notice --> Undefined index: sale_id /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 88
ERROR - 2019-07-22 12:31:27 --> Severity: Notice --> Undefined index: title /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 89
ERROR - 2019-07-22 12:31:27 --> Severity: Notice --> Undefined index: mobile /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 92
ERROR - 2019-07-22 12:31:27 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/api/models/Notification_Model.php 38
ERROR - 2019-07-22 12:32:47 --> Severity: Notice --> Undefined index: sale_id /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 88
ERROR - 2019-07-22 12:32:47 --> Severity: Notice --> Undefined index: title /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 89
ERROR - 2019-07-22 12:32:47 --> Severity: Notice --> Undefined index: mobile /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 92
ERROR - 2019-07-22 12:32:47 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/api/models/Notification_Model.php 38
ERROR - 2019-07-22 12:34:01 --> 404 Page Not Found: /index
ERROR - 2019-07-22 12:57:36 --> 404 Page Not Found: /index
ERROR - 2019-07-22 15:37:44 --> 404 Page Not Found: /index
ERROR - 2019-07-22 15:51:59 --> 404 Page Not Found: /index
ERROR - 2019-07-22 15:52:20 --> 404 Page Not Found: /index
ERROR - 2019-07-22 16:02:17 --> 404 Page Not Found: /index
ERROR - 2019-07-22 18:17:47 --> 404 Page Not Found: /index
ERROR - 2019-07-22 20:56:25 --> 404 Page Not Found: /index
ERROR - 2019-07-22 23:34:34 --> 404 Page Not Found: /index
