<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-05 02:04:02 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '1027'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 02:51:35 --> 404 Page Not Found: /index
ERROR - 2019-07-05 03:32:14 --> 404 Page Not Found: /index
ERROR - 2019-07-05 04:35:59 --> 404 Page Not Found: /index
ERROR - 2019-07-05 04:36:09 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900002'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-07-05 04:36:44 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900002'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-07-05 04:58:38 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '1027'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 05:00:56 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-05 05:00:56 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-05 05:00:56 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:00:56 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-05 05:00:56 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:00:58 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-05 05:00:58 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-05 05:00:58 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:00:58 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-05 05:00:58 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:01:00 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-05 05:01:00 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-05 05:01:00 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:01:00 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-05 05:01:00 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:01:08 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-05 05:01:08 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-05 05:01:08 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:01:08 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-05 05:01:08 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:01:09 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-05 05:01:09 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-05 05:01:09 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:01:09 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-05 05:01:09 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:01:18 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-05 05:01:18 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-05 05:01:18 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:01:18 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-05 05:01:18 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:01:29 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-05 05:01:29 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-05 05:01:29 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:01:29 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-05 05:01:29 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:38:05 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-05 05:38:05 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-05 05:38:05 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:38:05 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-05 05:38:05 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:38:06 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-05 05:38:06 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-05 05:38:06 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:38:06 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-05 05:38:06 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 05:47:32 --> 404 Page Not Found: /index
ERROR - 2019-07-05 06:16:06 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 471
ERROR - 2019-07-05 06:16:06 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 471
ERROR - 2019-07-05 06:16:06 --> Severity: Notice --> Undefined index: updatecrop_id /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 520
ERROR - 2019-07-05 06:20:44 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '778'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 06:32:21 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-05 06:32:21 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-05 06:32:21 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 06:32:21 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-05 06:32:21 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 06:38:49 --> Severity: Notice --> Undefined index: updatecrop_id /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 520
ERROR - 2019-07-05 06:39:18 --> 404 Page Not Found: /index
ERROR - 2019-07-05 06:47:56 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '1027'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 06:51:51 --> Severity: Notice --> Undefined index: updatecrop_id /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 520
ERROR - 2019-07-05 07:00:14 --> Severity: Notice --> Undefined index: cost_of_pesticide /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 477
ERROR - 2019-07-05 07:01:34 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '1027'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 07:25:50 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '82'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 07:26:59 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '82'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 07:29:22 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '778'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 07:32:01 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '1027'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 07:35:11 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '82'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 07:38:42 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '778'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 07:43:46 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '778'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 07:54:21 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '778'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 08:24:06 --> 404 Page Not Found: /index
ERROR - 2019-07-05 08:24:07 --> 404 Page Not Found: /index
ERROR - 2019-07-05 09:56:02 --> Query error: Column 'crop_id' cannot be null - Invalid query: INSERT INTO `trv_update_crop` (`farmer_id`, `update_type`, `name`, `crop_id`, `variety_id`, `process_date`, `brand_name`, `dosage`, `feed_type`, `qty`, `qty_uom`, `weed_type`, `man_days`, `machine_hours`, `process_cost`, `status`, `updated_on`, `updated_by`) VALUES ('82', '1', '2', NULL, '386', '2019-07-04', ' ', '2', '', '65', '20', '', '', '', '57000', 1, '2019-07-05 09:56:02', '')
ERROR - 2019-07-05 09:59:11 --> Query error: Column 'crop_id' cannot be null - Invalid query: INSERT INTO `trv_update_crop` (`farmer_id`, `update_type`, `name`, `crop_id`, `variety_id`, `process_date`, `brand_name`, `dosage`, `feed_type`, `qty`, `qty_uom`, `weed_type`, `man_days`, `machine_hours`, `process_cost`, `status`, `updated_on`, `updated_by`) VALUES ('82', '1', '4', NULL, '386', '2019-07-05', ' ', '7', '', '6', '20', '', '', '', '500', 1, '2019-07-05 09:59:10', '')
ERROR - 2019-07-05 10:06:13 --> 404 Page Not Found: /index
ERROR - 2019-07-05 10:10:55 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '82'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 10:11:33 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '82'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 10:14:55 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900002'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-07-05 10:14:56 --> 404 Page Not Found: /index
ERROR - 2019-07-05 10:15:10 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900002'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-07-05 10:24:35 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900002'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-07-05 10:25:37 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900002'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-07-05 10:25:58 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900002'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-07-05 10:33:31 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` IS NULL
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 10:33:45 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '82'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 10:35:22 --> 404 Page Not Found: ../modules/api/controllers/Crop/postHarvestList
ERROR - 2019-07-05 10:35:40 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '82'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 10:36:45 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '82'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 10:36:45 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '82'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-05 10:37:31 --> Query error: Column 'sales_qty_uom' cannot be null - Invalid query: INSERT INTO `trv_crop_harvest` (`farmer_id`, `variety_id`, `date_of_harvest`, `output`, `output_qty`, `qty_uom`, `harvest_method`, `man_days`, `no_of_hours`, `harvest_cost`, `output_quality`, `sales_available`, `qty_sales`, `sales_qty_uom`, `status`, `updated_on`, `updated_by`) VALUES ('82', '39', '2019-07-03', 'Blackgram', '6', '17', 'Manual', '20', '', '350', '1', '2', '', NULL, 1, '2019-07-05 10:37:31', '')
ERROR - 2019-07-05 11:21:15 --> Severity: Notice --> Undefined index: updatecrop_id /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 520
ERROR - 2019-07-05 11:21:15 --> Severity: Notice --> Undefined index: updatecrop_id /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 526
ERROR - 2019-07-05 11:21:18 --> Severity: Notice --> Undefined index: updatecrop_id /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 520
ERROR - 2019-07-05 11:21:18 --> Severity: Notice --> Undefined index: updatecrop_id /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 537
ERROR - 2019-07-05 11:21:18 --> Query error: Column 'crop_id' cannot be null - Invalid query: INSERT INTO `trv_update_expense` (`crop_id`, `farmer_id`, `nutrient_cost`, `fertilizer_cost`, `pesticide_cost`, `weeding_cost`) VALUES (NULL, '82', '500', 0, 0, 0)
ERROR - 2019-07-05 11:21:18 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-05 11:21:20 --> Severity: Notice --> Undefined index: updatecrop_id /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 520
ERROR - 2019-07-05 11:21:20 --> Severity: Notice --> Undefined index: updatecrop_id /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 537
ERROR - 2019-07-05 11:21:20 --> Query error: Column 'crop_id' cannot be null - Invalid query: INSERT INTO `trv_update_expense` (`crop_id`, `farmer_id`, `nutrient_cost`, `fertilizer_cost`, `pesticide_cost`, `weeding_cost`) VALUES (NULL, '82', '500', 0, 0, 0)
ERROR - 2019-07-05 11:21:20 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-05 11:22:59 --> Severity: Notice --> Undefined index: input_id /home/farmbooks/public_html/application/modules/api/controllers/Crop.php 1001
ERROR - 2019-07-05 11:26:05 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-05 11:26:05 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-05 11:26:05 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 11:26:05 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-05 11:26:05 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 11:26:15 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-05 11:26:15 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-05 11:26:15 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 11:26:15 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-05 11:26:15 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-05 11:37:06 --> Severity: Notice --> Undefined index: input_id /home/farmbooks/public_html/application/modules/api/controllers/Crop.php 1001
ERROR - 2019-07-05 12:18:48 --> Severity: Notice --> Undefined index: input_id /home/farmbooks/public_html/application/modules/api/controllers/Crop.php 1001
ERROR - 2019-07-05 20:28:22 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-05 20:28:22 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-05 20:29:36 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-05 20:29:36 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
