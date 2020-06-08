<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-21 03:40:14 --> 404 Page Not Found: /index
ERROR - 2019-03-21 03:40:16 --> 404 Page Not Found: /index
ERROR - 2019-03-21 03:40:19 --> 404 Page Not Found: /index
ERROR - 2019-03-21 03:40:23 --> 404 Page Not Found: /index
ERROR - 2019-03-21 07:17:40 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900101'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-03-21 07:17:40 --> 404 Page Not Found: /index
ERROR - 2019-03-21 07:17:54 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900101'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-03-21 07:17:54 --> 404 Page Not Found: /index
ERROR - 2019-03-21 07:17:57 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900101'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-03-21 07:18:07 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900101'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-03-21 07:21:40 --> 404 Page Not Found: /index
ERROR - 2019-03-21 07:22:16 --> 404 Page Not Found: /index
ERROR - 2019-03-21 07:22:22 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 295
ERROR - 2019-03-21 09:56:41 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900101'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-03-21 09:56:41 --> 404 Page Not Found: /index
ERROR - 2019-03-21 09:57:01 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900101'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-03-21 09:57:01 --> 404 Page Not Found: /index
ERROR - 2019-03-21 10:13:45 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900101'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-03-21 10:14:45 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_farmer`.`id`, `trv_farmer`.`status`, YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2018-05-01'
AND `trv_farmer`.`created_on` <= '2019-21-03'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-03-21 10:14:45 --> 404 Page Not Found: /index
ERROR - 2019-03-21 10:14:59 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900101'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-03-21 10:14:59 --> 404 Page Not Found: /index
ERROR - 2019-03-21 10:19:56 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900101'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-03-21 10:23:33 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_farmer`.`id`, `trv_farmer`.`status`, YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2018-05-01'
AND `trv_farmer`.`created_on` <= '2019-21-03'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-03-21 11:26:35 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_farmer`.`id`, `trv_farmer`.`status`, YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2018-05-01'
AND `trv_farmer`.`created_on` <= '2019-21-03'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-03-21 11:41:35 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900101'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-03-21 12:53:36 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 295
ERROR - 2019-03-21 12:56:00 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 295
ERROR - 2019-03-21 12:56:31 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 295
ERROR - 2019-03-21 12:56:53 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 295
