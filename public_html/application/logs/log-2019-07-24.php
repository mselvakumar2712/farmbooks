<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-24 09:10:01 --> Query error: Column 'sales_qty_uom' cannot be null - Invalid query: INSERT INTO `trv_crop_harvest` (`farmer_id`, `variety_id`, `date_of_harvest`, `output`, `output_qty`, `qty_uom`, `harvest_method`, `man_days`, `no_of_hours`, `harvest_cost`, `output_quality`, `sales_available`, `qty_sales`, `sales_qty_uom`, `status`, `updated_on`, `updated_by`) VALUES ('2061', '500', '2019-07-24', 'Guinea grass', '1', '20', 'Both', '2', '12', '200', '1', '', '', NULL, 1, '2019-07-24 09:10:01', '')
ERROR - 2019-07-24 09:10:04 --> Query error: Column 'sales_qty_uom' cannot be null - Invalid query: INSERT INTO `trv_crop_harvest` (`farmer_id`, `variety_id`, `date_of_harvest`, `output`, `output_qty`, `qty_uom`, `harvest_method`, `man_days`, `no_of_hours`, `harvest_cost`, `output_quality`, `sales_available`, `qty_sales`, `sales_qty_uom`, `status`, `updated_on`, `updated_by`) VALUES ('2061', '500', '2019-07-24', 'Guinea grass', '1', '20', 'Both', '2', '12', '200', '1', '', '', NULL, 1, '2019-07-24 09:10:04', '')
ERROR - 2019-07-24 09:10:21 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '2061'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-24 09:11:38 --> 404 Page Not Found: /index
ERROR - 2019-07-24 09:37:20 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:04:03 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:04:04 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:05:03 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:05:04 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:06:17 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:06:17 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:29:06 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:29:07 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:29:50 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:29:50 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:29:50 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:29:51 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:30:34 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:30:34 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:30:34 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:30:35 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:30:35 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:30:35 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:31:03 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:31:03 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:31:03 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:31:04 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:31:04 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:31:04 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:31:10 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:31:11 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:31:11 --> 404 Page Not Found: /index
ERROR - 2019-07-24 10:31:12 --> 404 Page Not Found: /index
ERROR - 2019-07-24 11:03:18 --> Query error: Column 'dependent_name' cannot be null - Invalid query: INSERT INTO `trv_farmer` (`user_id`, `profile_name`, `alias_name`, `father_spouse_name`, `no_of_dependents`, `dependent_name`, `aadhar_no`, `mobile`, `pin_code`, `state`, `district`, `block`, `taluk`, `panchayat`, `village`, `street`, `door_no`, `dob`, `age`, `income_category`, `is_promotor`, `is_trader`, `land_holdings`, `farm_implements`, `live_stocks`, `status`) VALUES ('6292907290701429070140022064', 'K', '', 'H', '', NULL, '', '7373737373', '636502', '29', '2907', '2907014', '290705', '2907014002', '25357', '', '', '1955/07/30', '63', '2', '0', '0', 0, 0, 0, 1)
ERROR - 2019-07-24 11:03:29 --> Query error: Duplicate entry '6292907290701429070140022064' for key 'user_id' - Invalid query: INSERT INTO `trv_user_auth` (`user_type`, `user_id`, `username`, `password`, `status`, `is_verified`, `created_by`, `updated_by`) VALUES ('6', '6292907290701429070140022064', '7373737373', '123456', '1', '1', '6292907290701429070140022064', '6292907290701429070140022064')
ERROR - 2019-07-24 11:03:41 --> Query error: Duplicate entry '6292907290701429070140022064' for key 'user_id' - Invalid query: INSERT INTO `trv_user_auth` (`user_type`, `user_id`, `username`, `password`, `status`, `is_verified`, `created_by`, `updated_by`) VALUES ('6', '6292907290701429070140022064', '7070707070', '123456', '1', '1', '6292907290701429070140022064', '6292907290701429070140022064')
ERROR - 2019-07-24 11:04:18 --> Query error: Column 'dependent_name' cannot be null - Invalid query: INSERT INTO `trv_farmer` (`user_id`, `profile_name`, `alias_name`, `father_spouse_name`, `no_of_dependents`, `dependent_name`, `aadhar_no`, `mobile`, `pin_code`, `state`, `district`, `block`, `taluk`, `panchayat`, `village`, `street`, `door_no`, `dob`, `age`, `income_category`, `is_promotor`, `is_trader`, `land_holdings`, `farm_implements`, `live_stocks`, `status`) VALUES ('6292907290701229070120082064', 'K', '', 'H', '', NULL, '', '7070707070', '636502', '29', '2907', '2907012', '290704', '2907012008', '24939', '', '', '1955/07/30', '63', '2', '0', '0', 0, 0, 0, 1)
ERROR - 2019-07-24 11:05:27 --> Query error: Duplicate entry '7070707070' for key 'username' - Invalid query: INSERT INTO `trv_user_auth` (`user_type`, `user_id`, `username`, `password`, `status`, `is_verified`, `created_by`, `updated_by`) VALUES ('6', '6292907290701329070130142064', '7070707070', '123456', '1', '1', '6292907290701329070130142064', '6292907290701329070130142064')
ERROR - 2019-07-24 11:05:37 --> Query error: Duplicate entry '7070707070' for key 'username' - Invalid query: INSERT INTO `trv_user_auth` (`user_type`, `user_id`, `username`, `password`, `status`, `is_verified`, `created_by`, `updated_by`) VALUES ('6', '6292907290701329070130142064', '7070707070', '123456', '1', '1', '6292907290701329070130142064', '6292907290701329070130142064')
ERROR - 2019-07-24 11:06:11 --> Query error: Duplicate entry '7070707070' for key 'username' - Invalid query: INSERT INTO `trv_user_auth` (`user_type`, `user_id`, `username`, `password`, `status`, `is_verified`, `created_by`, `updated_by`) VALUES ('6', '6292907290701329070130142064', '7070707070', '123456', '1', '1', '6292907290701329070130142064', '6292907290701329070130142064')
ERROR - 2019-07-24 11:36:29 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-24 11:36:29 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-24 11:36:32 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-24 11:36:32 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-24 11:37:11 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-24 11:37:11 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-24 11:39:50 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-24 11:39:50 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-24 11:40:00 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_post_harvest.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_post_harvest`.*, `trv_crop_variety_master`.`variety` AS `crop_name`
FROM `trv_post_harvest`
JOIN `trv_crop_variety_master` ON `trv_crop_variety_master`.`id` = `trv_post_harvest`.`crop_id`
JOIN `trv_post_harvest_master` ON `trv_post_harvest_master`.`crop_id` = `trv_post_harvest`.`crop_id`
WHERE `trv_post_harvest`.`status` = 1
AND `trv_post_harvest`.`farmer_id` = '2061'
GROUP BY `trv_post_harvest`.`farmer_id`
ERROR - 2019-07-24 11:53:27 --> 404 Page Not Found: /index
ERROR - 2019-07-24 14:44:53 --> Query error: Duplicate entry '7070707070' for key 'username' - Invalid query: INSERT INTO `trv_user_auth` (`user_type`, `user_id`, `username`, `password`, `status`, `is_verified`, `created_by`, `updated_by`) VALUES ('6', '6292907290701329070130142065', '7070707070', '123456', '1', '1', '6292907290701329070130142065', '6292907290701329070130142065')
ERROR - 2019-07-24 16:22:00 --> 404 Page Not Found: /index
ERROR - 2019-07-24 16:23:22 --> 404 Page Not Found: /index
ERROR - 2019-07-24 18:14:03 --> 404 Page Not Found: /index
ERROR - 2019-07-24 18:15:33 --> 404 Page Not Found: /index
ERROR - 2019-07-24 19:26:48 --> 404 Page Not Found: /index
ERROR - 2019-07-24 23:51:10 --> 404 Page Not Found: /index
