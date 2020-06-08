<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-29 03:24:15 --> 404 Page Not Found: /index
ERROR - 2019-07-29 05:04:17 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 284
ERROR - 2019-07-29 05:38:19 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 284
ERROR - 2019-07-29 05:38:24 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 284
ERROR - 2019-07-29 05:55:02 --> 404 Page Not Found: /index
ERROR - 2019-07-29 05:55:02 --> 404 Page Not Found: /index
ERROR - 2019-07-29 05:55:29 --> 404 Page Not Found: /index
ERROR - 2019-07-29 05:55:30 --> 404 Page Not Found: /index
ERROR - 2019-07-29 05:57:38 --> 404 Page Not Found: /index
ERROR - 2019-07-29 05:57:38 --> 404 Page Not Found: /index
ERROR - 2019-07-29 05:57:38 --> 404 Page Not Found: /index
ERROR - 2019-07-29 05:57:39 --> 404 Page Not Found: /index
ERROR - 2019-07-29 06:00:22 --> 404 Page Not Found: /index
ERROR - 2019-07-29 06:00:22 --> 404 Page Not Found: /index
ERROR - 2019-07-29 06:00:26 --> 404 Page Not Found: /index
ERROR - 2019-07-29 06:00:26 --> 404 Page Not Found: /index
ERROR - 2019-07-29 06:03:18 --> 404 Page Not Found: /index
ERROR - 2019-07-29 06:03:18 --> 404 Page Not Found: /index
ERROR - 2019-07-29 06:03:18 --> 404 Page Not Found: /index
ERROR - 2019-07-29 06:03:18 --> 404 Page Not Found: /index
ERROR - 2019-07-29 06:03:45 --> 404 Page Not Found: /index
ERROR - 2019-07-29 06:03:45 --> 404 Page Not Found: /index
ERROR - 2019-07-29 06:03:46 --> 404 Page Not Found: /index
ERROR - 2019-07-29 06:03:46 --> 404 Page Not Found: /index
ERROR - 2019-07-29 06:28:04 --> 404 Page Not Found: /index
ERROR - 2019-07-29 06:28:13 --> 404 Page Not Found: ../modules/api/controllers/Fdiary/getfarmer_salereport
ERROR - 2019-07-29 06:35:50 --> Severity: Notice --> Undefined index: to_date /home/farmbooks/public_html/application/modules/api/controllers/Fdiary.php 1215
ERROR - 2019-07-29 06:36:37 --> Severity: Notice --> Undefined index: to_date /home/farmbooks/public_html/application/modules/api/controllers/Fdiary.php 1215
ERROR - 2019-07-29 06:37:48 --> Severity: Notice --> Undefined index: to_date /home/farmbooks/public_html/application/modules/api/controllers/Fdiary.php 1219
ERROR - 2019-07-29 06:40:22 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `ref`.`crop_variety_id`, `ref`.`output_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity_uom`, `ref`.`quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`, `ref`.`sale_price`, "100" `min_price`, "300" `max_price`, `ref`.`sale_status`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `ref`.`crop_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`trader_id` = '82'
AND `ref`.`status` = '1'
AND `ref`.`sale_status` <> '4'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-29 06:45:44 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `ref`.`crop_variety_id`, `ref`.`output_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity_uom`, `ref`.`quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`, `ref`.`sale_price`, "100" `min_price`, "300" `max_price`, `ref`.`sale_status`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `ref`.`crop_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`trader_id` = '82'
AND `ref`.`status` = '1'
AND `ref`.`sale_status` <> '4'
AND `ref`.`expected_time` BETWEEN "1970-01-01" and "1970-01-01"
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-29 06:46:35 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `ref`.`crop_variety_id`, `ref`.`output_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity_uom`, `ref`.`quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`, `ref`.`sale_price`, "100" `min_price`, "300" `max_price`, `ref`.`sale_status`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `ref`.`crop_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`trader_id` = '82'
AND `ref`.`status` = '1'
AND `ref`.`sale_status` <> '4'
AND `ref`.`expected_time` BETWEEN "22/07/2019" and "22/07/2019"
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-29 06:52:46 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `ref`.`crop_variety_id`, `ref`.`output_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity_uom`, `ref`.`quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`, `ref`.`sale_price`, "100" `min_price`, "300" `max_price`, `ref`.`sale_status`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `ref`.`crop_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`trader_id` = '82'
AND `ref`.`status` = '1'
AND `ref`.`sale_status` <> '4'
AND `ref`.`expected_time` BETWEEN "2019-07-22" and "22/07/2019"
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-29 06:53:28 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `ref`.`crop_variety_id`, `ref`.`output_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity_uom`, `ref`.`quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`, `ref`.`sale_price`, "100" `min_price`, "300" `max_price`, `ref`.`sale_status`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `ref`.`crop_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`trader_id` = '82'
AND `ref`.`status` = '1'
AND `ref`.`sale_status` <> '4'
AND `ref`.`expected_time` BETWEEN "2019-07-2200:00:00" and "2019-07-2223:59:59"
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-29 06:54:01 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `ref`.`crop_variety_id`, `ref`.`output_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity_uom`, `ref`.`quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`, `ref`.`sale_price`, "100" `min_price`, "300" `max_price`, `ref`.`sale_status`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `ref`.`crop_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`trader_id` = '82'
AND `ref`.`status` = '1'
AND `ref`.`sale_status` <> '4'
AND `ref`.`expected_time` >= "2019-07-2200:00:00" and `ref`.`expected_time` <= "2019-07-2223:59:59"
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-29 06:54:42 --> Query error: Table 'farmbook_prod.trv_farmer1' doesn't exist - Invalid query: SELECT `ref`.`id`, `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `ref`.`crop_variety_id`, `ref`.`output_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity_uom`, `ref`.`quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`, `ref`.`sale_price`, "100" `min_price`, "300" `max_price`, `ref`.`sale_status`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `ref`.`crop_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer1` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`trader_id` = '82'
AND `ref`.`status` = '1'
AND `ref`.`sale_status` <> '4'
AND `ref`.`expected_time` >= "2019-07-22 00:00:00" and `ref`.`expected_time` <= "2019-07-22 23:59:59"
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-29 06:55:27 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-07-29 06:56:13 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-07-29 07:01:48 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-07-29 07:05:24 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Fdiary.php:1243) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-29 07:05:24 --> Severity: Parsing Error --> syntax error, unexpected 'public' (T_PUBLIC) /home/farmbooks/public_html/application/modules/api/controllers/Fdiary.php 1243
ERROR - 2019-07-29 07:05:35 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Fdiary.php:1243) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-29 07:05:35 --> Severity: Parsing Error --> syntax error, unexpected 'public' (T_PUBLIC) /home/farmbooks/public_html/application/modules/api/controllers/Fdiary.php 1243
ERROR - 2019-07-29 07:06:12 --> 404 Page Not Found: /index
ERROR - 2019-07-29 07:12:22 --> 404 Page Not Found: ../modules/api/controllers/Fdiary/getfarmer_traderreport
ERROR - 2019-07-29 07:16:56 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-07-29 07:16:58 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-07-29 07:17:00 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-07-29 07:26:37 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-07-29 07:27:22 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-07-29 07:27:26 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-07-29 08:16:50 --> 404 Page Not Found: /index
ERROR - 2019-07-29 08:16:50 --> 404 Page Not Found: /index
ERROR - 2019-07-29 08:19:55 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-07-29 08:19:57 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-07-29 08:20:09 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-07-29 08:24:31 --> 404 Page Not Found: /index
ERROR - 2019-07-29 08:32:50 --> 404 Page Not Found: ../modules/fpo/controllers/Fpo/login
ERROR - 2019-07-29 09:25:25 --> 404 Page Not Found: ../modules/fpo/controllers/Fpo/login
ERROR - 2019-07-29 09:31:27 --> 404 Page Not Found: ../modules/fpo/controllers/Fpo/login
ERROR - 2019-07-29 12:11:16 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/models/API_Model.php:671) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-29 12:11:16 --> Severity: Parsing Error --> syntax error, unexpected end of file /home/farmbooks/public_html/application/modules/api/models/API_Model.php 671
ERROR - 2019-07-29 12:16:26 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/models/API_Model.php:671) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-29 12:16:26 --> Severity: Parsing Error --> syntax error, unexpected '?>', expecting function (T_FUNCTION) /home/farmbooks/public_html/application/modules/api/models/API_Model.php 671
ERROR - 2019-07-29 12:16:58 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/api/models/API_Model.php 631
ERROR - 2019-07-29 12:16:58 --> 404 Page Not Found: /index
ERROR - 2019-07-29 12:52:07 --> 404 Page Not Found: /index
ERROR - 2019-07-29 16:55:33 --> 404 Page Not Found: /index
ERROR - 2019-07-29 16:56:15 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 286
ERROR - 2019-07-29 16:56:19 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 286
ERROR - 2019-07-29 16:56:21 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 286
ERROR - 2019-07-29 16:56:29 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 286
ERROR - 2019-07-29 21:40:06 --> 404 Page Not Found: /index
