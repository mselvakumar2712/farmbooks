<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-26 04:35:05 --> 404 Page Not Found: ../modules/fpo/controllers/Fpo/login
ERROR - 2019-07-26 04:39:17 --> 404 Page Not Found: ../modules/fpo/controllers/Fpo/login
ERROR - 2019-07-26 04:56:38 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 284
ERROR - 2019-07-26 04:56:41 --> Severity: Notice --> Undefined index: dependents_name /home/farmbooks/public_html/application/modules/api/models/API_Model.php 284
ERROR - 2019-07-26 05:16:03 --> Severity: Notice --> Undefined index: sale_id /home/farmbooks/public_html/application/modules/api/models/Notification_Model.php 57
ERROR - 2019-07-26 05:16:22 --> Severity: Notice --> Undefined index: sale_id /home/farmbooks/public_html/application/modules/api/models/Notification_Model.php 57
ERROR - 2019-07-26 05:18:08 --> 404 Page Not Found: /index
ERROR - 2019-07-26 05:26:35 --> 404 Page Not Found: /index
ERROR - 2019-07-26 05:31:14 --> Query error: Unknown column 'ref.trader_id1' in 'where clause' - Invalid query: SELECT `ref`.`id`, `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `ref`.`crop_variety_id`, `ref`.`output_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity_uom`, `ref`.`quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`, `ref`.`sale_price`, "100" `min_price`, "300" `max_price`, `ref`.`sale_status`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `ref`.`crop_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`trader_id1` = '2063'
AND `ref`.`status` = '1'
AND `ref`.`sale_status` <> '4'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-26 05:34:15 --> Query error: Unknown column 'ref.trader_id1' in 'where clause' - Invalid query: SELECT `ref`.`id`, `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `tf`.`profile_name` `farmer_name`, CONCAT(tf.door_no, ", ", tf.street) AS address, `tf`.`mobile` `mobile_no`, `ref`.`crop_variety_id`, `ref`.`output_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`name` `crop_output_name`, `ref`.`quantity_uom`, `ref`.`quantity`, `u`.`short_name` `uom_name`, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, `ref`.`remarks`, `ref`.`farmer_id`, `ref`.`sale_price`, "100" `min_price`, "300" `max_price`, `ref`.`sale_status`
FROM `fpo_fd_sale` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`quantity_uom` = `u`.`id`
JOIN `trv_crop_master` as `tch` ON `ref`.`output_id` = `tch`.`variety_id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`id` = `ref`.`crop_id`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`crop_variety_id`
JOIN `trv_farmer` as `tf` ON `tf`.`id` = `ref`.`farmer_id`
WHERE `ref`.`trader_id1` = '2063'
AND `ref`.`status` = '1'
AND `ref`.`sale_status` <> '4'
ORDER BY `ref`.`id` DESC
ERROR - 2019-07-26 05:36:53 --> Query error: Column 'sales_qty_uom' cannot be null - Invalid query: INSERT INTO `trv_crop_harvest` (`farmer_id`, `variety_id`, `date_of_harvest`, `output`, `output_qty`, `qty_uom`, `harvest_method`, `man_days`, `no_of_hours`, `harvest_cost`, `output_quality`, `sales_available`, `qty_sales`, `sales_qty_uom`, `status`, `updated_on`, `updated_by`) VALUES ('2068', '660', '2019-07-26', 'Carambola', '1', '20', 'இயந்திர முறை', '', '1', '100', '3', '', '', NULL, 1, '2019-07-26 05:36:53', '')
ERROR - 2019-07-26 05:40:45 --> 404 Page Not Found: /index
ERROR - 2019-07-26 05:43:31 --> Severity: 4096 --> Object of class stdClass could not be converted to string /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-26 05:43:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 2 - Invalid query: UPDATE `fpo_fd_sale` SET `trader_id` = '2063'
WHERE `id` = 
ERROR - 2019-07-26 05:43:31 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-26 05:43:57 --> Severity: 4096 --> Object of class stdClass could not be converted to string /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-26 05:43:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 2 - Invalid query: UPDATE `fpo_fd_sale` SET `trader_id` = '2063'
WHERE `id` = 
ERROR - 2019-07-26 05:43:57 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-26 05:44:43 --> Severity: 4096 --> Object of class stdClass could not be converted to string /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-26 05:44:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 2 - Invalid query: UPDATE `fpo_fd_sale1` SET `trader_id` = '2063'
WHERE `id` = 
ERROR - 2019-07-26 05:44:43 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-26 05:46:21 --> Query error: Unknown column 'farmer_id1' in 'where clause' - Invalid query: SELECT `id`
FROM `fpo_fd_sale`
WHERE `farmer_id1` = '82'
ORDER BY `id` DESC
 LIMIT 1
ERROR - 2019-07-26 05:47:32 --> Severity: 4096 --> Object of class stdClass could not be converted to string /home/farmbooks/public_html/system/database/DB_query_builder.php 2442
ERROR - 2019-07-26 05:47:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 2 - Invalid query: UPDATE `fpo_fd_sale1` SET `trader_id` = '2063'
WHERE `id` = 
ERROR - 2019-07-26 05:47:32 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-26 05:48:37 --> Severity: Notice --> Undefined variable: sale_id /home/farmbooks/public_html/application/modules/api/models/Notification_Model.php 61
ERROR - 2019-07-26 05:48:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/api/models/Notification_Model.php 61
ERROR - 2019-07-26 05:48:37 --> Query error: Table 'farmbook_prod.fpo_fd_sale1' doesn't exist - Invalid query: UPDATE `fpo_fd_sale1` SET `trader_id` = '2063'
WHERE `id` IS NULL
ERROR - 2019-07-26 05:48:37 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-26 05:49:14 --> Query error: Table 'farmbook_prod.fpo_fd_sal1e' doesn't exist - Invalid query: SELECT `id`
FROM `fpo_fd_sal1e`
WHERE `farmer_id` = '82'
ORDER BY `id` DESC
 LIMIT 1
ERROR - 2019-07-26 05:50:24 --> Query error: Table 'farmbook_prod.fpo_fd_sale1' doesn't exist - Invalid query: UPDATE `fpo_fd_sale1` SET `trader_id` = '2063'
WHERE `id` = '1'
ERROR - 2019-07-26 06:04:43 --> 404 Page Not Found: /index
ERROR - 2019-07-26 06:14:39 --> 404 Page Not Found: /index
ERROR - 2019-07-26 06:14:40 --> 404 Page Not Found: /index
ERROR - 2019-07-26 07:05:47 --> 404 Page Not Found: /index
ERROR - 2019-07-26 10:14:43 --> Severity: Notice --> Undefined index: sale_status /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 136
ERROR - 2019-07-26 10:14:43 --> Severity: Notice --> Undefined index: sale_status /home/farmbooks/public_html/application/modules/api/models/Fdiary_Model.php 818
ERROR - 2019-07-26 10:14:43 --> Severity: Notice --> Undefined index: trader_id /home/farmbooks/public_html/application/modules/api/models/Fdiary_Model.php 819
ERROR - 2019-07-26 10:16:35 --> Severity: Notice --> Undefined index: sale_status /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 136
ERROR - 2019-07-26 10:16:35 --> Severity: Notice --> Undefined index: sale_status /home/farmbooks/public_html/application/modules/api/models/Fdiary_Model.php 818
ERROR - 2019-07-26 10:16:35 --> Severity: Notice --> Undefined index: trader_id /home/farmbooks/public_html/application/modules/api/models/Fdiary_Model.php 819
ERROR - 2019-07-26 10:16:51 --> Severity: Notice --> Undefined index: sale_status /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 136
ERROR - 2019-07-26 10:16:51 --> Severity: Notice --> Undefined index: sale_status /home/farmbooks/public_html/application/modules/api/models/Fdiary_Model.php 818
ERROR - 2019-07-26 10:16:51 --> Severity: Notice --> Undefined index: trader_id /home/farmbooks/public_html/application/modules/api/models/Fdiary_Model.php 819
ERROR - 2019-07-26 10:18:38 --> Severity: Notice --> Undefined index: sale_status /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 136
ERROR - 2019-07-26 10:20:17 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Notification.php:167) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-26 10:20:17 --> Severity: Parsing Error --> syntax error, unexpected 'echo' (T_ECHO), expecting function (T_FUNCTION) /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 167
ERROR - 2019-07-26 10:20:30 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Notification.php:167) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-26 10:20:30 --> Severity: Parsing Error --> syntax error, unexpected 'echo' (T_ECHO), expecting function (T_FUNCTION) /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 167
ERROR - 2019-07-26 10:20:30 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/controllers/Notification.php:167) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-26 10:20:30 --> Severity: Parsing Error --> syntax error, unexpected 'echo' (T_ECHO), expecting function (T_FUNCTION) /home/farmbooks/public_html/application/modules/api/controllers/Notification.php 167
ERROR - 2019-07-26 10:20:30 --> 404 Page Not Found: /index
ERROR - 2019-07-26 10:20:30 --> 404 Page Not Found: /index
ERROR - 2019-07-26 10:41:18 --> 404 Page Not Found: /index
ERROR - 2019-07-26 11:32:00 --> Severity: Notice --> Undefined variable: uom /home/farmbooks/public_html/application/modules/fpo/views/masterdata/godown/viewgodown.php 92
ERROR - 2019-07-26 11:32:08 --> Severity: Notice --> Undefined variable: uom /home/farmbooks/public_html/application/modules/fpo/views/masterdata/godown/editgodown.php 93
ERROR - 2019-07-26 13:18:33 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-07-26 13:18:33 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-07-26 13:18:33 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-07-26 13:18:33 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-07-26 13:18:33 --> Severity: Notice --> Undefined variable: ledgerBalance /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 175
ERROR - 2019-07-26 13:18:33 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 201
ERROR - 2019-07-26 13:18:35 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 190
ERROR - 2019-07-26 13:18:35 --> Severity: Warning --> number_format() expects parameter 1 to be double, string given /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 190
ERROR - 2019-07-26 13:21:31 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-07-26 13:21:31 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-07-26 13:21:31 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-07-26 13:21:31 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-07-26 13:21:31 --> Severity: Notice --> Undefined variable: ledgerBalance /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 175
ERROR - 2019-07-26 13:21:31 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 201
ERROR - 2019-07-26 13:21:52 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 190
ERROR - 2019-07-26 13:21:52 --> Severity: Warning --> number_format() expects parameter 1 to be double, string given /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 190
