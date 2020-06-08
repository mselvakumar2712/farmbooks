<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-22 11:37:40 --> Severity: Compile Error --> Cannot redeclare Operation_Model::getnoticedetail() /home/easzapps/public_html/UAT/fpo/application/models/Operation_Model.php 461
ERROR - 2019-01-22 11:48:39 --> Severity: Compile Error --> Cannot redeclare Operation_Model::getnoticedetail() /home/easzapps/public_html/UAT/fpo/application/models/Operation_Model.php 461
ERROR - 2019-01-22 11:52:38 --> Severity: Compile Error --> Cannot redeclare Operation_Model::getnoticedetail() /home/easzapps/public_html/UAT/fpo/application/models/Operation_Model.php 461
ERROR - 2019-01-22 12:27:14 --> Severity: Compile Error --> Cannot redeclare Operation_Model::getnoticedetail() /home/easzapps/public_html/UAT/fpo/application/models/Operation_Model.php 461
ERROR - 2019-01-22 16:58:17 --> Severity: Compile Error --> Cannot redeclare Operation_Model::getnoticedetail() /home/easzapps/public_html/UAT/fpo/application/models/Operation_Model.php 461
ERROR - 2019-01-22 17:41:20 --> Severity: Notice --> Undefined variable: last_voucher_no /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/inventory/purchase/purchase_entry/add_purchase_entry.php 161
ERROR - 2019-01-22 18:48:04 --> Query error: Unknown column 'trv_land_holdings1.id' in 'where clause' - Invalid query: SELECT `trv_land_holdings`.*, `trv_farmer`.`profile_name`, `trv_farmer`.`status`, `trv_farmer`.`land_holdings`, `trv_village_master`.`name` As `village_name`, `trv_state_master`.`name` As `state_name`, `trv_district_master`.`name` As `district_name`, `trv_block_master`.`name` As `block_name`, `trv_taluk_master`.`name` As `taluk_name`, `trv_panchayat_master`.`name` As `panchayat_name`
FROM `trv_land_holdings`
INNER JOIN `trv_farmer` ON `trv_farmer`.`id` = `trv_land_holdings`.`farmer_id`
INNER JOIN `trv_village_master` ON `trv_village_master`.`id` = `trv_land_holdings`.`village`
INNER JOIN `trv_panchayat_master` ON `trv_panchayat_master`.`id` = `trv_land_holdings`.`panchayat`
INNER JOIN `trv_taluk_master` ON `trv_taluk_master`.`id` = `trv_land_holdings`.`taluk`
INNER JOIN `trv_block_master` ON `trv_block_master`.`id` = `trv_land_holdings`.`block`
INNER JOIN `trv_district_master` ON `trv_district_master`.`id` = `trv_land_holdings`.`district`
INNER JOIN `trv_state_master` ON `trv_state_master`.`id` = `trv_land_holdings`.`state`
WHERE `trv_land_holdings1`.`id` = '10'
ERROR - 2019-01-22 22:10:06 --> 404 Page Not Found: ../modules/fpo/controllers/Finance/index
ERROR - 2019-01-22 23:33:20 --> Severity: Notice --> Undefined variable: last_voucher_no /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/inventory/purchase/purchase_entry/add_purchase_entry.php 161
