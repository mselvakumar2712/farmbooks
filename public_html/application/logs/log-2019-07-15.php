<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-15 04:37:27 --> 404 Page Not Found: /index
ERROR - 2019-07-15 05:03:27 --> 404 Page Not Found: /index
ERROR - 2019-07-15 05:03:28 --> 404 Page Not Found: /index
ERROR - 2019-07-15 05:07:18 --> 404 Page Not Found: /index
ERROR - 2019-07-15 05:20:09 --> 404 Page Not Found: /index
ERROR - 2019-07-15 05:45:37 --> Query error: Table 'farmbook_prod.fpo_fd_income1' doesn't exist - Invalid query: SELECT `ref`.`id`, DATE_FORMAT(ref.income_date, "%d/%m/%Y") income_date, `ref`.`source_of_income`, `ref`.`crop_id`, `tcnm`.`name` `crop_name`, `ref`.`sale_to`, `ref`.`fpo_id`, `fc`.`company_name` `fpo_name`, `ref`.`income_category`, `ref`.`borrower_name`, round(ref.trans_income, 0) trans_income, `ref`.`remarks`, `ref`.`flag`
FROM `fpo_fd_income1` as `ref`
LEFT JOIN `fpo_company` as `fc` ON `fc`.`company_id` = `ref`.`fpo_id`
JOIN `trv_crop_name_master` as `tcnm` ON `tcnm`.`id` = `ref`.`crop_id`
WHERE `ref`.`farmer_id` = '82'
AND `ref`.`status` = '1'
ORDER BY `ref`.`income_date` DESC
ERROR - 2019-07-15 05:54:01 --> 404 Page Not Found: /index
ERROR - 2019-07-15 06:21:43 --> 404 Page Not Found: /index
ERROR - 2019-07-15 06:37:46 --> 404 Page Not Found: /index
ERROR - 2019-07-15 08:47:22 --> Query error: Unknown column 'trv_notice_to_director.status' in 'field list' - Invalid query: SELECT `trv_notice_to_director`.`id`, `trv_notice_to_director`.`meeting_date`, `trv_notice_to_director`.`meeting_time`, `trv_notice_to_director`.`place_of_meeting`, `trv_notice_to_director`.`status`
FROM `trv_notice_to_director`
WHERE `trv_notice_to_director`.`fpo_id` = '32900007'
AND `trv_notice_to_director`.`status` != 1
ORDER BY `trv_notice_to_director`.`id` DESC
ERROR - 2019-07-15 08:47:23 --> 404 Page Not Found: /index
ERROR - 2019-07-15 08:48:25 --> Severity: Notice --> Undefined variable: location /home/farmbooks/public_html/application/modules/fpo/views/approver/supplierlist.php 338
ERROR - 2019-07-15 08:48:25 --> Severity: Notice --> Undefined variable: supplier_info /home/farmbooks/public_html/application/modules/fpo/views/approver/supplierlist.php 558
ERROR - 2019-07-15 08:48:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/fpo/views/approver/supplierlist.php 558
ERROR - 2019-07-15 08:48:30 --> Severity: Notice --> Undefined variable: location /home/farmbooks/public_html/application/modules/fpo/views/approver/supplierlist.php 338
ERROR - 2019-07-15 08:48:30 --> Severity: Notice --> Undefined variable: supplier_info /home/farmbooks/public_html/application/modules/fpo/views/approver/supplierlist.php 558
ERROR - 2019-07-15 08:48:30 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/fpo/views/approver/supplierlist.php 558
ERROR - 2019-07-15 09:35:49 --> Severity: Warning --> session_start(): Cannot send session cache limiter - headers already sent (output started at /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php:2) /home/farmbooks/public_html/system/libraries/Session/Session.php 143
ERROR - 2019-07-15 09:35:49 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php:2) /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php 31
ERROR - 2019-07-15 09:36:03 --> Severity: Warning --> session_start(): Cannot send session cache limiter - headers already sent (output started at /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php:2) /home/farmbooks/public_html/system/libraries/Session/Session.php 143
ERROR - 2019-07-15 09:36:03 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php:2) /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php 31
ERROR - 2019-07-15 09:36:04 --> Severity: Notice --> Undefined index: id /home/farmbooks/public_html/application/modules/fpo/views/crop/viewharvest_crop.php 294
ERROR - 2019-07-15 09:36:04 --> Severity: Notice --> Undefined index: id /home/farmbooks/public_html/application/modules/fpo/views/crop/viewharvest_crop.php 386
ERROR - 2019-07-15 09:36:05 --> Severity: Warning --> session_start(): Cannot send session cache limiter - headers already sent (output started at /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php:2) /home/farmbooks/public_html/system/libraries/Session/Session.php 143
ERROR - 2019-07-15 09:36:05 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php:2) /home/farmbooks/public_html/system/libraries/Session/Session.php 171
ERROR - 2019-07-15 09:36:05 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php:2) /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php 31
ERROR - 2019-07-15 09:36:32 --> Severity: Warning --> session_start(): Cannot send session cache limiter - headers already sent (output started at /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php:2) /home/farmbooks/public_html/system/libraries/Session/Session.php 143
ERROR - 2019-07-15 09:36:32 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php:2) /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php 31
ERROR - 2019-07-15 09:47:00 --> 404 Page Not Found: /index
ERROR - 2019-07-15 09:48:12 --> Query error: Unknown column 'trv_notice_to_director.status' in 'field list' - Invalid query: SELECT `trv_notice_to_director`.`id`, `trv_notice_to_director`.`meeting_date`, `trv_notice_to_director`.`meeting_time`, `trv_notice_to_director`.`place_of_meeting`, `trv_notice_to_director`.`status`
FROM `trv_notice_to_director`
WHERE `trv_notice_to_director`.`fpo_id` = '32900004'
AND `trv_notice_to_director`.`status` != 1
ORDER BY `trv_notice_to_director`.`id` DESC
ERROR - 2019-07-15 09:48:13 --> 404 Page Not Found: /index
ERROR - 2019-07-15 09:48:44 --> Severity: Notice --> Undefined variable: location /home/farmbooks/public_html/application/modules/fpo/views/approver/supplierlist.php 338
ERROR - 2019-07-15 09:48:44 --> Severity: Notice --> Undefined variable: supplier_info /home/farmbooks/public_html/application/modules/fpo/views/approver/supplierlist.php 558
ERROR - 2019-07-15 09:48:44 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/fpo/views/approver/supplierlist.php 558
ERROR - 2019-07-15 10:15:35 --> Severity: Warning --> Missing argument 1 for Farmer::getBlocksByDistrict() /home/farmbooks/public_html/application/modules/fpo/controllers/Farmer.php 522
ERROR - 2019-07-15 10:15:35 --> Severity: Notice --> Undefined variable: district_code /home/farmbooks/public_html/application/modules/fpo/controllers/Farmer.php 524
ERROR - 2019-07-15 10:23:35 --> Severity: Notice --> Undefined index: id /home/farmbooks/public_html/application/modules/fpo/views/fig/editfig.php 285
ERROR - 2019-07-15 10:23:35 --> Severity: Notice --> Undefined index: id /home/farmbooks/public_html/application/modules/fpo/views/fig/editfig.php 289
ERROR - 2019-07-15 10:29:36 --> Query error: Unknown column 'trv_notice_to_director.status' in 'field list' - Invalid query: SELECT `trv_notice_to_director`.`id`, `trv_notice_to_director`.`meeting_date`, `trv_notice_to_director`.`meeting_time`, `trv_notice_to_director`.`place_of_meeting`, `trv_notice_to_director`.`status`
FROM `trv_notice_to_director`
WHERE `trv_notice_to_director`.`fpo_id` = '32900004'
AND `trv_notice_to_director`.`status` != 1
ORDER BY `trv_notice_to_director`.`id` DESC
ERROR - 2019-07-15 10:29:37 --> 404 Page Not Found: /index
ERROR - 2019-07-15 10:41:53 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-15 10:41:53 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-15 10:42:10 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-15 10:42:10 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-15 10:42:28 --> 404 Page Not Found: /index
ERROR - 2019-07-15 10:46:57 --> 404 Page Not Found: /index
ERROR - 2019-07-15 10:53:57 --> 404 Page Not Found: /index
ERROR - 2019-07-15 11:15:06 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-15 11:15:06 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/api/models/Crop_Model.php 619
ERROR - 2019-07-15 11:53:41 --> 404 Page Not Found: /index
ERROR - 2019-07-15 11:55:20 --> 404 Page Not Found: /index
ERROR - 2019-07-15 11:55:53 --> 404 Page Not Found: /index
ERROR - 2019-07-15 11:56:09 --> 404 Page Not Found: /index
ERROR - 2019-07-15 11:58:15 --> 404 Page Not Found: /index
ERROR - 2019-07-15 12:02:37 --> Query error: Unknown column 'trv_notice_to_director.status' in 'field list' - Invalid query: SELECT `trv_notice_to_director`.`id`, `trv_notice_to_director`.`meeting_date`, `trv_notice_to_director`.`meeting_time`, `trv_notice_to_director`.`place_of_meeting`, `trv_notice_to_director`.`status`
FROM `trv_notice_to_director`
WHERE `trv_notice_to_director`.`fpo_id` = '32900004'
AND `trv_notice_to_director`.`status` != 1
ORDER BY `trv_notice_to_director`.`id` DESC
ERROR - 2019-07-15 12:02:38 --> 404 Page Not Found: /index
ERROR - 2019-07-15 12:16:10 --> Severity: Notice --> Undefined variable: location /home/farmbooks/public_html/application/modules/fpo/views/approver/supplierlist.php 338
ERROR - 2019-07-15 12:16:10 --> Severity: Notice --> Undefined variable: supplier_info /home/farmbooks/public_html/application/modules/fpo/views/approver/supplierlist.php 558
ERROR - 2019-07-15 12:16:10 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/fpo/views/approver/supplierlist.php 558
ERROR - 2019-07-15 12:18:59 --> Query error: Unknown column 'trv_notice_to_director.status' in 'field list' - Invalid query: SELECT `trv_notice_to_director`.`id`, `trv_notice_to_director`.`meeting_date`, `trv_notice_to_director`.`meeting_time`, `trv_notice_to_director`.`place_of_meeting`, `trv_notice_to_director`.`status`
FROM `trv_notice_to_director`
WHERE `trv_notice_to_director`.`fpo_id` = '32900004'
AND `trv_notice_to_director`.`status` != 1
ORDER BY `trv_notice_to_director`.`id` DESC
ERROR - 2019-07-15 12:29:31 --> 404 Page Not Found: /index
ERROR - 2019-07-15 12:29:52 --> 404 Page Not Found: /index
ERROR - 2019-07-15 12:29:56 --> 404 Page Not Found: /index
ERROR - 2019-07-15 12:29:59 --> 404 Page Not Found: ../modules/home/controllers/Home/tel:04346200000
ERROR - 2019-07-15 12:31:00 --> 404 Page Not Found: /index
ERROR - 2019-07-15 12:31:01 --> 404 Page Not Found: /index
ERROR - 2019-07-15 13:06:38 --> 404 Page Not Found: ../modules/fpo/controllers/Fpo/login
ERROR - 2019-07-15 13:07:38 --> 404 Page Not Found: ../modules/fpo/controllers/Fpo/login
ERROR - 2019-07-15 13:31:10 --> 404 Page Not Found: /index
ERROR - 2019-07-15 14:54:05 --> 404 Page Not Found: /index
ERROR - 2019-07-15 15:06:57 --> 404 Page Not Found: /index
ERROR - 2019-07-15 15:06:57 --> 404 Page Not Found: /index
ERROR - 2019-07-15 15:06:59 --> 404 Page Not Found: /index
ERROR - 2019-07-15 15:07:00 --> 404 Page Not Found: /index
ERROR - 2019-07-15 17:32:40 --> 404 Page Not Found: /index
ERROR - 2019-07-15 18:42:23 --> 404 Page Not Found: /index
ERROR - 2019-07-15 21:13:54 --> 404 Page Not Found: /index
