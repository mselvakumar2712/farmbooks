<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-16 11:51:12 --> Query error: Table 'easzapps_uatfpo.trv_post_harvest_master' doesn't exist - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `variety_name`, `trv_farmer`.`profile_name` AS `profile_name`, GROUP_CONCAT(trv_post_harvest_master.output_product) AS output_name
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
JOIN `trv_farmer` ON `trv_farmer`.`id` = `trv_post_harvest`.`farmer_id`
WHERE `trv_post_harvest`.`status` = 1
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-02-16 11:51:32 --> Query error: Table 'easzapps_uatfpo.trv_post_harvest_master' doesn't exist - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `variety_name`, `trv_farmer`.`profile_name` AS `profile_name`, GROUP_CONCAT(trv_post_harvest_master.output_product) AS output_name
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
JOIN `trv_farmer` ON `trv_farmer`.`id` = `trv_post_harvest`.`farmer_id`
WHERE `trv_post_harvest`.`status` = 1
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-02-16 11:51:39 --> Query error: Table 'easzapps_uatfpo.trv_post_harvest_master' doesn't exist - Invalid query: SELECT `trv_crop_harvest`.*, `trv_post_harvest_master`.`output_product` AS `output_name`
FROM `trv_crop_harvest`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_crop_harvest`.`variety_id`
WHERE `trv_crop_harvest`.`variety_id` = '24'
AND `trv_crop_harvest`.`status` = '1'
ERROR - 2019-02-16 11:51:43 --> 404 Page Not Found: /index
ERROR - 2019-02-16 11:51:47 --> Query error: Table 'easzapps_uatfpo.trv_post_harvest_master' doesn't exist - Invalid query: SELECT `trv_crop_harvest`.*, `trv_post_harvest_master`.`output_product` AS `output_name`
FROM `trv_crop_harvest`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_crop_harvest`.`variety_id`
WHERE `trv_crop_harvest`.`variety_id` = '24'
AND `trv_crop_harvest`.`status` = '1'
ERROR - 2019-02-16 11:57:59 --> Query error: Table 'easzapps_uatfpo.trv_post_harvest_master' doesn't exist - Invalid query: SELECT `trv_crop_harvest`.*, `trv_post_harvest_master`.`output_product` AS `output_name`
FROM `trv_crop_harvest`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_crop_harvest`.`variety_id`
WHERE `trv_crop_harvest`.`variety_id` = '24'
AND `trv_crop_harvest`.`status` = '1'
ERROR - 2019-02-16 12:08:09 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-16 12:08:37 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-16 12:10:14 --> Query error: Unknown column 'nutrient_cost' in 'field list' - Invalid query: INSERT INTO `trv_update_expense` (`crop_id`, `farmer_id`, `nutrient_cost`, `fertilizer_cost`, `pesticide_cost`, `weeding_cost`) VALUES ('134', '105', '', '1500', '', '')
ERROR - 2019-02-16 12:10:19 --> 404 Page Not Found: /index
ERROR - 2019-02-16 12:11:24 --> 404 Page Not Found: /index
ERROR - 2019-02-16 12:12:24 --> 404 Page Not Found: /index
ERROR - 2019-02-16 12:16:53 --> Severity: Notice --> Undefined variable: taluk_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 126
ERROR - 2019-02-16 12:16:53 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 126
ERROR - 2019-02-16 12:16:53 --> Severity: Notice --> Undefined variable: block_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 140
ERROR - 2019-02-16 12:16:53 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 140
ERROR - 2019-02-16 12:16:53 --> Severity: Notice --> Undefined variable: panchayat_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 154
ERROR - 2019-02-16 12:16:53 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 154
ERROR - 2019-02-16 12:16:53 --> Severity: Notice --> Undefined variable: village_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 168
ERROR - 2019-02-16 12:16:53 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 168
ERROR - 2019-02-16 12:16:58 --> Severity: Notice --> Undefined variable: taluk_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 126
ERROR - 2019-02-16 12:16:58 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 126
ERROR - 2019-02-16 12:16:58 --> Severity: Notice --> Undefined variable: block_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 140
ERROR - 2019-02-16 12:16:58 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 140
ERROR - 2019-02-16 12:16:58 --> Severity: Notice --> Undefined variable: panchayat_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 154
ERROR - 2019-02-16 12:16:58 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 154
ERROR - 2019-02-16 12:16:58 --> Severity: Notice --> Undefined variable: village_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 168
ERROR - 2019-02-16 12:16:58 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 168
ERROR - 2019-02-16 12:21:52 --> Severity: Notice --> Undefined variable: taluk_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 126
ERROR - 2019-02-16 12:21:52 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 126
ERROR - 2019-02-16 12:21:52 --> Severity: Notice --> Undefined variable: block_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 140
ERROR - 2019-02-16 12:21:52 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 140
ERROR - 2019-02-16 12:21:52 --> Severity: Notice --> Undefined variable: panchayat_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 154
ERROR - 2019-02-16 12:21:52 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 154
ERROR - 2019-02-16 12:21:52 --> Severity: Notice --> Undefined variable: village_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 168
ERROR - 2019-02-16 12:21:52 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 168
ERROR - 2019-02-16 12:23:35 --> Severity: Notice --> Undefined variable: taluk_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 126
ERROR - 2019-02-16 12:23:35 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 126
ERROR - 2019-02-16 12:23:35 --> Severity: Notice --> Undefined variable: block_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 140
ERROR - 2019-02-16 12:23:35 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 140
ERROR - 2019-02-16 12:23:35 --> Severity: Notice --> Undefined variable: panchayat_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 154
ERROR - 2019-02-16 12:23:35 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 154
ERROR - 2019-02-16 12:23:35 --> Severity: Notice --> Undefined variable: village_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 168
ERROR - 2019-02-16 12:23:35 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 168
ERROR - 2019-02-16 12:23:56 --> Severity: Notice --> Undefined variable: taluk_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 126
ERROR - 2019-02-16 12:23:56 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 126
ERROR - 2019-02-16 12:23:56 --> Severity: Notice --> Undefined variable: block_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 140
ERROR - 2019-02-16 12:23:56 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 140
ERROR - 2019-02-16 12:23:56 --> Severity: Notice --> Undefined variable: panchayat_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 154
ERROR - 2019-02-16 12:23:56 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 154
ERROR - 2019-02-16 12:23:56 --> Severity: Notice --> Undefined variable: village_info /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 168
ERROR - 2019-02-16 12:23:56 --> Severity: Warning --> Invalid argument supplied for foreach() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/masterdata/bank/editbank.php 168
ERROR - 2019-02-16 12:29:27 --> Query error: Table 'easzapps_uatfpo.trv_post_harvest_master' doesn't exist - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `variety_name`, `trv_farmer`.`profile_name` AS `profile_name`, GROUP_CONCAT(trv_post_harvest_master.output_product) AS output_name
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
JOIN `trv_farmer` ON `trv_farmer`.`id` = `trv_post_harvest`.`farmer_id`
WHERE `trv_post_harvest`.`status` = 1
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-02-16 12:39:00 --> 404 Page Not Found: /index
ERROR - 2019-02-16 13:55:26 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 114
ERROR - 2019-02-16 13:55:26 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 114
ERROR - 2019-02-16 13:55:26 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 163
ERROR - 2019-02-16 13:55:26 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 163
ERROR - 2019-02-16 13:56:18 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 114
ERROR - 2019-02-16 13:56:18 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 114
ERROR - 2019-02-16 13:56:18 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 163
ERROR - 2019-02-16 13:56:18 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 163
ERROR - 2019-02-16 17:34:25 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 114
ERROR - 2019-02-16 17:34:25 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 114
ERROR - 2019-02-16 17:34:25 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 163
ERROR - 2019-02-16 17:34:25 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 163
ERROR - 2019-02-16 17:35:23 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 114
ERROR - 2019-02-16 17:35:23 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 114
ERROR - 2019-02-16 17:35:23 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 163
ERROR - 2019-02-16 17:35:23 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 163
