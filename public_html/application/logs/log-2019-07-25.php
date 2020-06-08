<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-25 05:08:32 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-25 05:08:32 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-25 05:16:12 --> 404 Page Not Found: /index
ERROR - 2019-07-25 06:11:53 --> Query error: Duplicate entry '7070707070' for key 'username' - Invalid query: INSERT INTO `trv_user_auth` (`user_type`, `user_id`, `username`, `password`, `status`, `is_verified`, `created_by`, `updated_by`) VALUES ('6', '6292907290701329070130142065', '7070707070', '123456', '1', '1', '6292907290701329070130142065', '6292907290701329070130142065')
ERROR - 2019-07-25 06:50:09 --> Query error: Column 'sales_qty_uom' cannot be null - Invalid query: INSERT INTO `trv_crop_harvest` (`farmer_id`, `variety_id`, `date_of_harvest`, `output`, `output_qty`, `qty_uom`, `harvest_method`, `man_days`, `no_of_hours`, `harvest_cost`, `output_quality`, `sales_available`, `qty_sales`, `sales_qty_uom`, `status`, `updated_on`, `updated_by`) VALUES ('2068', '354', '2019-07-25', 'Redgram', '1', '20', 'இரண்டும்', '2', '3', '200', '1', '', '', NULL, 1, '2019-07-25 06:50:09', '')
ERROR - 2019-07-25 08:31:03 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900007'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-07-25 08:31:04 --> 404 Page Not Found: /index
ERROR - 2019-07-25 08:31:12 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900007'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-07-25 08:31:30 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900007'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-07-25 08:44:50 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-25 08:44:50 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-25 08:44:53 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-25 08:44:53 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-25 08:48:24 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '2068'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-25 08:49:19 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '2068'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-25 08:51:15 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900007'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-07-25 08:51:26 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900007'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-07-25 08:53:15 --> Query error: Expression #2 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2018-09-01'
AND `trv_farmer`.`created_on` <= '2019-25-07'
GROUP BY YEAR(trv_farmer.created_on), MONTHNAME(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-07-25 08:53:15 --> 404 Page Not Found: /index
ERROR - 2019-07-25 08:59:14 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '82'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-25 09:04:39 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '82'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-25 09:04:48 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '82'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-25 09:11:45 --> 404 Page Not Found: /index
ERROR - 2019-07-25 09:11:45 --> 404 Page Not Found: /index
ERROR - 2019-07-25 09:11:46 --> 404 Page Not Found: /index
ERROR - 2019-07-25 09:11:46 --> 404 Page Not Found: /index
ERROR - 2019-07-25 09:21:05 --> 404 Page Not Found: /index
ERROR - 2019-07-25 09:21:05 --> 404 Page Not Found: /index
ERROR - 2019-07-25 09:21:06 --> 404 Page Not Found: /index
ERROR - 2019-07-25 09:21:06 --> 404 Page Not Found: /index
ERROR - 2019-07-25 09:24:30 --> 404 Page Not Found: /index
ERROR - 2019-07-25 09:24:30 --> 404 Page Not Found: /index
ERROR - 2019-07-25 09:24:30 --> 404 Page Not Found: /index
ERROR - 2019-07-25 09:24:30 --> 404 Page Not Found: /index
ERROR - 2019-07-25 09:28:56 --> 404 Page Not Found: /index
ERROR - 2019-07-25 09:30:41 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900007'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-07-25 09:30:41 --> 404 Page Not Found: /index
ERROR - 2019-07-25 09:30:47 --> Query error: Expression #2 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2018-09-01'
AND `trv_farmer`.`created_on` <= '2019-25-07'
GROUP BY YEAR(trv_farmer.created_on), MONTHNAME(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-07-25 09:39:39 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-25 09:39:39 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-25 09:39:39 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-25 09:39:40 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-25 09:39:40 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-25 09:39:42 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-25 09:39:42 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-25 09:39:42 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-25 09:39:42 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-25 09:39:42 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-25 09:39:43 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-25 09:39:43 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-25 09:39:43 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-25 09:39:43 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-25 09:39:43 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-25 09:59:05 --> 404 Page Not Found: /index
ERROR - 2019-07-25 10:07:30 --> Severity: Warning --> Missing argument 1 for Api::getfarmerprofile() /home/farmbooks/public_html/application/modules/api/controllers/Api.php 299
ERROR - 2019-07-25 10:07:30 --> Severity: Notice --> Undefined variable: mobile_number /home/farmbooks/public_html/application/modules/api/controllers/Api.php 302
ERROR - 2019-07-25 10:07:57 --> 404 Page Not Found: ../modules/api/controllers/Api/farmerprofile
ERROR - 2019-07-25 10:12:39 --> 404 Page Not Found: ../modules/api/controllers/Api/get_available_saleList
ERROR - 2019-07-25 10:12:51 --> Query error: Unknown column 'ref.crop_variety_id' in 'field list' - Invalid query: SELECT `ref`.`id`, `ref`.`crop_variety_id`, `tcvm`.`variety` `crop_variety_name`, `ref`.`output_id`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity`, `ref`.`quantity_uom`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`sale_status`, `ref`.`remarks`, `ref`.`flag`, `ref`.`farmer_id`, "100" `min_price`, "300" `max_price`
FROM `trv_crop_harvest` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `tch`.`name_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
WHERE `ref`.`farmer_id` = '82'
AND `ref`.`status` = '1'
AND `ref`.`sale_status` <> '4'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-25 11:20:31 --> 404 Page Not Found: /index
ERROR - 2019-07-25 11:26:52 --> Query error: Unknown column 'ref.quantity_uom' in 'on clause' - Invalid query: SELECT `tcnm`.`name` `crop_name`, `ref`.`variety_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`id` `output_id`, `tcnm`.`name` `crop_output_name`, `ref`.`output_qty` `quantity`, `ref`.`qty_uom` `quantity_uom`, `u`.`short_name` `uom_name`, `ref`.`farmer_id`
FROM `trv_crop_harvest` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`name` = `tch`.`output`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
WHERE `ref`.`farmer_id` = '82'
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-25 11:27:36 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 284
ERROR - 2019-07-25 11:27:40 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 284
ERROR - 2019-07-25 11:27:50 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 284
ERROR - 2019-07-25 11:27:52 --> Query error: Unknown column 'tch.output' in 'on clause' - Invalid query: SELECT `tcnm`.`name` `crop_name`, `ref`.`variety_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`id` `output_id`, `tcnm`.`name` `crop_output_name`, `ref`.`output_qty` `quantity`, `ref`.`qty_uom` `quantity_uom`, `u`.`short_name` `uom_name`, `ref`.`farmer_id`
FROM `trv_crop_harvest` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`qty_uom` = `u`.`id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`name` = `tch`.`output`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
WHERE `ref`.`farmer_id` = '82'
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-25 11:28:02 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 284
ERROR - 2019-07-25 11:28:05 --> Query error: Unknown column 'ref.crop_variety_id' in 'on clause' - Invalid query: SELECT `tcnm`.`name` `crop_name`, `ref`.`variety_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`id` `output_id`, `tcnm`.`name` `crop_output_name`, `ref`.`output_qty` `quantity`, `ref`.`qty_uom` `quantity_uom`, `u`.`short_name` `uom_name`, `ref`.`farmer_id`
FROM `trv_crop_harvest` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`qty_uom` = `u`.`id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`name` = `ref`.`output`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
WHERE `ref`.`farmer_id` = '82'
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-25 11:28:31 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 284
ERROR - 2019-07-25 11:28:43 --> 404 Page Not Found: /index
ERROR - 2019-07-25 11:30:28 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 284
ERROR - 2019-07-25 12:17:18 --> 404 Page Not Found: /index
ERROR - 2019-07-25 12:28:39 --> Query error: Table 'farmbook_prod.trv_uom_master1' doesn't exist - Invalid query: SELECT DISTINCT `trv_uom_master`.`id`, `trv_uom_master`.`short_name`, `trv_uom_master`.`full_name`
FROM `trv_uom_master1`
WHERE `trv_uom_master`.`status` = '1'
ERROR - 2019-07-25 12:30:50 --> Query error: Table 'farmbook_prod.trv_uom_master1' doesn't exist - Invalid query: SELECT DISTINCT `trv_uom_master`.`id`, `trv_uom_master`.`short_name`, `trv_uom_master`.`full_name`
FROM `trv_uom_master1`
WHERE `trv_uom_master`.`id` in (25,17,20)
AND `trv_uom_master`.`status` = '1'
ERROR - 2019-07-25 12:39:47 --> Query error: Column 'bank_name_id' cannot be null - Invalid query: INSERT INTO `trv_bank_master` (`branch_name`, `bank_name_id`, `type_id`, `ifsc_code`, `pincode`, `bank_state`, `bank_district`, `bank_taluk_id`, `bank_block`, `bank_panchayat`, `bank_village`, `address_local`, `contact_no`, `email_id`, `status`, `updated_on`, `updated_by`) VALUES ('', NULL, '', '', '', '', '', '', '', '', '', '', '', '', 1, '2019-07-25 12:39:47', '')
ERROR - 2019-07-25 12:39:48 --> 404 Page Not Found: /index
ERROR - 2019-07-25 13:17:53 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-07-25 13:17:53 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-07-25 13:17:53 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-07-25 13:17:53 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-07-25 13:17:53 --> Severity: Notice --> Undefined variable: ledgerBalance /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 175
ERROR - 2019-07-25 13:17:53 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 201
ERROR - 2019-07-25 13:26:25 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-07-25 13:26:39 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-07-25 13:28:44 --> 404 Page Not Found: /index
ERROR - 2019-07-25 13:30:16 --> Severity: Notice --> Undefined index: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/Fdiary.php 1035
ERROR - 2019-07-25 13:49:57 --> Query error: Unknown column 'tf.farmer_id' in 'where clause' - Invalid query: SELECT `ref`.`id`, `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `ref`.`crop_variety_id`, `ref`.`output_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity_uom`, `ref`.`quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`, `ref`.`sale_price`, "100" `min_price`, "300" `max_price`, `ref`.`sale_status`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `ref`.`crop_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `tf`.`farmer_id` = '2063'
AND `ref`.`status` = '1'
AND `ref`.`sale_status` <> '4'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-25 13:56:01 --> Query error: Unknown column 'tf.trader_id' in 'where clause' - Invalid query: SELECT `ref`.`id`, `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `ref`.`crop_variety_id`, `ref`.`output_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity_uom`, `ref`.`quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`, `ref`.`sale_price`, "100" `min_price`, "300" `max_price`, `ref`.`sale_status`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `ref`.`crop_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `tf`.`trader_id` = '2063'
AND `ref`.`status` = '1'
AND `ref`.`sale_status` <> '4'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-25 13:58:16 --> Query error: Unknown column 'tf.trader_id' in 'where clause' - Invalid query: SELECT `ref`.`id`, `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `ref`.`crop_variety_id`, `ref`.`output_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity_uom`, `ref`.`quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`, `ref`.`sale_price`, "100" `min_price`, "300" `max_price`, `ref`.`sale_status`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `ref`.`crop_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `tf`.`trader_id` = '2063'
AND `ref`.`status` = '1'
AND `ref`.`sale_status` <> '4'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-25 14:05:10 --> 404 Page Not Found: ../modules/fpo/controllers/Fpo/login
ERROR - 2019-07-25 14:05:22 --> Query error: Unknown column 'tf.trader_id' in 'where clause' - Invalid query: SELECT `ref`.`id`, `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `ref`.`crop_variety_id`, `ref`.`output_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity_uom`, `ref`.`quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`, `ref`.`sale_price`, "100" `min_price`, "300" `max_price`, `ref`.`sale_status`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `ref`.`crop_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `tf`.`trader_id` = '2063'
AND `ref`.`status` = '1'
AND `ref`.`sale_status` <> '4'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-25 14:14:04 --> Severity: Notice --> Undefined variable: post_data /home/farmbooks/public_html/application/modules/api/models/Notification_Model.php 48
ERROR - 2019-07-25 14:14:04 --> Severity: Notice --> Undefined variable: post_data /home/farmbooks/public_html/application/modules/api/models/Notification_Model.php 55
ERROR - 2019-07-25 14:14:06 --> 404 Page Not Found: /index
ERROR - 2019-07-25 14:14:36 --> 404 Page Not Found: /index
ERROR - 2019-07-25 14:30:47 --> 404 Page Not Found: /index
ERROR - 2019-07-25 14:32:32 --> Severity: Notice --> Undefined index: trader_id /home/farmbooks/public_html/application/modules/api/models/Notification_Model.php 55
ERROR - 2019-07-25 20:52:35 --> 404 Page Not Found: /index
