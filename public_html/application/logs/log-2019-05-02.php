<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-05-02 02:44:40 --> 404 Page Not Found: /index
ERROR - 2019-05-02 02:44:43 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:12:59 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 03:13:24 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 03:29:12 --> Query error: Table 'farmbook_prod.trv_state_master' doesn't exist - Invalid query: SELECT `trv_fpo`.*, `trv_popi`.`institution_name` As `popi_name`, `trv_village_master`.`name` As `village_name`, `trv_panchayat_master`.`name` As `panchayat_name`, `trv_block_master`.`name` As `block_name`, `trv_district_master`.`name` As `district_name`, `trv_state_master`.`name` As `state_name`
FROM `trv_fpo`
JOIN `trv_state_master` ON `trv_state_master`.`state_code` = `trv_fpo`.`state`
JOIN `trv_district_master` ON `trv_district_master`.`district_code` = `trv_fpo`.`district`
JOIN `trv_village_master` ON `trv_village_master`.`id` = `trv_fpo`.`village`
JOIN `trv_panchayat_master` ON `trv_panchayat_master`.`panchayat_code` = `trv_fpo`.`panchayat`
JOIN `trv_taluk_master` ON `trv_taluk_master`.`taluk_code` = `trv_fpo`.`taluk_id`
JOIN `trv_block_master` ON `trv_block_master`.`block_code` = `trv_fpo`.`block`
JOIN `trv_popi` ON `trv_popi`.`user_id` = `trv_fpo`.`popi_id`
WHERE `trv_fpo`.`id` = '2'
ERROR - 2019-05-02 03:29:13 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:31:00 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:35:41 --> Query error: Table 'farmbook_prod.trv_state_master' doesn't exist - Invalid query: SELECT SUM(Case When trv_crop.area_uom = 1 then trv_crop.area else (trv_crop.area *2.471) end) as total_area, YEAR(trv_crop.updated_on) as year, `trv_state_master`.`state_code`, `trv_state_master`.`name` as `state_name`, `trv_crop`.`area_uom`, `trv_state_master`.`state_code`
FROM `trv_crop`
JOIN `trv_crop_name_master` ON `trv_crop_name_master`.`id` = `trv_crop`.`crop_id`
JOIN `trv_farmer` ON `trv_farmer`.`id` = `trv_crop`.`farmer_id`
JOIN `trv_state_master` ON `trv_state_master`.`state_code` = `trv_farmer`.`state`
WHERE `trv_crop`.`status` = '1'
AND YEAR(trv_crop.updated_on) = '2019'
GROUP BY `trv_state_master`.`state_code`
ORDER BY `total_area` DESC
 LIMIT 10
ERROR - 2019-05-02 03:35:41 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:54:58 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/popi/views/fpo/editfpo.php 127
ERROR - 2019-05-02 03:54:59 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:55:06 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:55:09 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:55:11 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:55:18 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:55:34 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:55:50 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:56:32 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:56:36 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:56:39 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:56:43 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:56:49 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:56:59 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:57:02 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:57:10 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:57:13 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:57:15 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:57:18 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:57:21 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:57:23 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:57:25 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:57:27 --> 404 Page Not Found: /index
ERROR - 2019-05-02 03:57:29 --> 404 Page Not Found: /index
ERROR - 2019-05-02 04:02:18 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 04:10:25 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 04:11:09 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 04:12:24 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/popi/views/fpo/editfpo.php 127
ERROR - 2019-05-02 04:16:47 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/popi/views/fpo/editfpo.php 127
ERROR - 2019-05-02 04:17:16 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/popi/views/fpo/editfpo.php 127
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/controllers/Popi.php 156
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/controllers/Popi.php 156
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 55
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 55
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 59
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 59
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 64
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 64
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 74
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 74
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 78
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 78
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 82
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 82
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 86
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 86
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 90
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 90
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 94
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 94
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 98
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 98
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 102
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 102
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 106
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 106
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 114
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 114
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 124
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 124
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 128
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 128
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 133
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 133
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 143
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 143
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 148
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 148
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 153
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 153
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 158
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 158
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 166
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 166
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 167
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 167
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 168
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 168
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 169
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 169
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 170
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 170
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 176
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 176
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 181
ERROR - 2019-05-02 04:17:25 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 181
ERROR - 2019-05-02 04:18:03 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/popi/views/fpo/editfpo.php 127
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/controllers/Popi.php 156
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/controllers/Popi.php 156
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 55
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 55
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 59
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 59
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 64
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 64
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 74
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 74
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 78
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 78
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 82
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 82
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 86
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 86
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 90
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 90
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 94
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 94
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 98
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 98
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 102
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 102
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 106
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 106
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 114
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 114
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 124
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 124
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 128
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 128
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 133
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 133
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 143
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 143
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 148
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 148
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 153
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 153
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 158
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 158
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 166
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 166
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 167
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 167
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 168
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 168
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 169
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 169
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 170
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 170
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 176
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 176
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Undefined offset: 0 /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 181
ERROR - 2019-05-02 04:20:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/popi/views/popi_profile.php 181
ERROR - 2019-05-02 04:20:51 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/popi/views/fpo/editfpo.php 127
ERROR - 2019-05-02 04:21:04 --> 404 Page Not Found: /index
ERROR - 2019-05-02 04:21:09 --> 404 Page Not Found: /index
ERROR - 2019-05-02 04:21:14 --> 404 Page Not Found: /index
ERROR - 2019-05-02 04:21:19 --> 404 Page Not Found: /index
ERROR - 2019-05-02 04:53:09 --> 404 Page Not Found: /index
ERROR - 2019-05-02 04:53:22 --> 404 Page Not Found: /index
ERROR - 2019-05-02 05:01:47 --> 404 Page Not Found: /index
ERROR - 2019-05-02 05:02:14 --> 404 Page Not Found: /index
ERROR - 2019-05-02 07:20:35 --> 404 Page Not Found: /index
ERROR - 2019-05-02 07:20:46 --> 404 Page Not Found: /index
ERROR - 2019-05-02 07:20:55 --> 404 Page Not Found: /index
ERROR - 2019-05-02 08:22:22 --> 404 Page Not Found: /index
ERROR - 2019-05-02 08:23:50 --> 404 Page Not Found: /index
ERROR - 2019-05-02 08:23:54 --> 404 Page Not Found: /index
ERROR - 2019-05-02 08:25:16 --> 404 Page Not Found: /index
ERROR - 2019-05-02 10:53:29 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 10:54:11 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 10:54:11 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 10:56:30 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 10:56:30 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 10:57:11 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 10:57:29 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 10:57:29 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 11:07:05 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 11:07:05 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/administrator/views/fpo/editfpo.php 127
ERROR - 2019-05-02 12:30:54 --> 404 Page Not Found: /index
ERROR - 2019-05-02 12:31:35 --> 404 Page Not Found: /index
ERROR - 2019-05-02 12:31:48 --> 404 Page Not Found: /index
ERROR - 2019-05-02 12:32:04 --> 404 Page Not Found: /index
ERROR - 2019-05-02 12:32:23 --> 404 Page Not Found: /index
ERROR - 2019-05-02 12:34:06 --> 404 Page Not Found: /index
ERROR - 2019-05-02 12:34:23 --> 404 Page Not Found: /index
ERROR - 2019-05-02 12:34:39 --> 404 Page Not Found: /index
ERROR - 2019-05-02 12:34:53 --> 404 Page Not Found: /index
ERROR - 2019-05-02 12:34:56 --> 404 Page Not Found: /index
ERROR - 2019-05-02 12:35:05 --> Severity: Warning --> Missing argument 1 for Farmer::getBlocksByDistrict() /home/farmbooks/public_html/application/modules/fpo/controllers/Farmer.php 463
ERROR - 2019-05-02 12:35:05 --> Severity: Notice --> Undefined variable: district_code /home/farmbooks/public_html/application/modules/fpo/controllers/Farmer.php 464
ERROR - 2019-05-02 19:05:26 --> 404 Page Not Found: /index
