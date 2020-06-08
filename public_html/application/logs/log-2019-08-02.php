<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-08-02 00:22:48 --> 404 Page Not Found: /index
ERROR - 2019-08-02 00:22:48 --> 404 Page Not Found: /index
ERROR - 2019-08-02 00:22:48 --> 404 Page Not Found: /index
ERROR - 2019-08-02 00:22:51 --> 404 Page Not Found: /index
ERROR - 2019-08-02 00:22:55 --> 404 Page Not Found: /index
ERROR - 2019-08-02 00:22:55 --> 404 Page Not Found: /index
ERROR - 2019-08-02 02:28:16 --> 404 Page Not Found: /index
ERROR - 2019-08-02 04:40:50 --> 404 Page Not Found: /index
ERROR - 2019-08-02 07:59:54 --> 404 Page Not Found: /index
ERROR - 2019-08-02 08:08:43 --> Query error: Unknown column 'ref.farmer_id1' in 'where clause' - Invalid query: SELECT `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `ref`.`variety_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`id` `output_id`, `tcnm`.`name` `crop_output_name`, `ref`.`output_qty` `quantity`, `ref`.`qty_uom` `quantity_uom`, `u`.`short_name` `uom_name`, `ref`.`farmer_id`
FROM `trv_crop_harvest` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`qty_uom` = `u`.`id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`name` = `ref`.`output`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`variety_id`
WHERE `ref`.`farmer_id1` = '2074'
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-08-02 08:14:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '= `tcnm`.`id`
WHERE `ref`.`farmer_id` = '2074'
AND `ref`.`status` = '1'
ORDER BY' at line 5 - Invalid query: SELECT `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `ref`.`variety_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`id` `output_id`, `tcnm`.`name` `crop_output_name`, `ref`.`output_qty` `quantity`, `ref`.`qty_uom` `quantity_uom`, `u`.`short_name` `uom_name`, `ref`.`farmer_id`
FROM `trv_crop_harvest` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`qty_uom` = `u`.`id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`name` = `ref`.`output`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`variety_id` AND .`name_id` = `tcnm`.`id`
WHERE `ref`.`farmer_id` = '2074'
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-08-02 08:14:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '= `tcnm`.`id`
WHERE `ref`.`farmer_id` IS NULL
AND `ref`.`status` = '1'
ORDER BY ' at line 5 - Invalid query: SELECT `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `ref`.`variety_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`id` `output_id`, `tcnm`.`name` `crop_output_name`, `ref`.`output_qty` `quantity`, `ref`.`qty_uom` `quantity_uom`, `u`.`short_name` `uom_name`, `ref`.`farmer_id`
FROM `trv_crop_harvest` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`qty_uom` = `u`.`id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`name` = `ref`.`output`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`variety_id` AND .`name_id` = `tcnm`.`id`
WHERE `ref`.`farmer_id` IS NULL
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-08-02 08:14:32 --> 404 Page Not Found: /index
ERROR - 2019-08-02 08:14:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '= `tcnm`.`id`
WHERE `ref`.`farmer_id` = '2074'
AND `ref`.`status` = '1'
ORDER BY' at line 5 - Invalid query: SELECT `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `ref`.`variety_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`id` `output_id`, `tcnm`.`name` `crop_output_name`, `ref`.`output_qty` `quantity`, `ref`.`qty_uom` `quantity_uom`, `u`.`short_name` `uom_name`, `ref`.`farmer_id`
FROM `trv_crop_harvest` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`qty_uom` = `u`.`id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`name` = `ref`.`output`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`variety_id` AND .`name_id` = `tcnm`.`id`
WHERE `ref`.`farmer_id` = '2074'
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-08-02 08:15:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '= `tcnm`.`id`
WHERE `ref`.`farmer_id` IS NULL
AND `ref`.`status` = '1'
ORDER BY ' at line 5 - Invalid query: SELECT `tcnm`.`id` `crop_id`, `tcnm`.`name` `crop_name`, `ref`.`variety_id`, `tcvm`.`variety` `crop_variety_name`, `tcnm`.`id` `output_id`, `tcnm`.`name` `crop_output_name`, `ref`.`output_qty` `quantity`, `ref`.`qty_uom` `quantity_uom`, `u`.`short_name` `uom_name`, `ref`.`farmer_id`
FROM `trv_crop_harvest` as `ref`
JOIN `trv_uom_master` as `u` ON `ref`.`qty_uom` = `u`.`id`
JOIN `trv_crop_name_master` `tcnm` ON `tcnm`.`name` = `ref`.`output`
JOIN `trv_crop_variety_master` as `tcvm` ON `tcvm`.`id` = `ref`.`variety_id` AND .`name_id` = `tcnm`.`id`
WHERE `ref`.`farmer_id` IS NULL
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` DESC
ERROR - 2019-08-02 08:15:46 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/models/Fdiary_Model.php:710) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-08-02 08:15:46 --> Severity: Parsing Error --> syntax error, unexpected 'ref' (T_STRING) /home/farmbooks/public_html/application/modules/api/models/Fdiary_Model.php 710
ERROR - 2019-08-02 08:16:05 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/api/models/Fdiary_Model.php:710) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-08-02 08:16:05 --> Severity: Parsing Error --> syntax error, unexpected 'ref' (T_STRING) /home/farmbooks/public_html/application/modules/api/models/Fdiary_Model.php 710
ERROR - 2019-08-02 08:42:52 --> 404 Page Not Found: /index
ERROR - 2019-08-02 23:27:09 --> 404 Page Not Found: /index
ERROR - 2019-08-02 23:27:11 --> 404 Page Not Found: /index
ERROR - 2019-08-02 23:27:20 --> 404 Page Not Found: /index
