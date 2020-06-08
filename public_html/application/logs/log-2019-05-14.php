<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-05-14 06:40:46 --> 404 Page Not Found: /index
ERROR - 2019-05-14 09:47:20 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900004'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-05-14 09:47:21 --> 404 Page Not Found: /index
ERROR - 2019-05-14 15:34:43 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2018-07-01'
AND `trv_farmer`.`created_on` <= '2019-14-05'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-05-14 15:34:43 --> 404 Page Not Found: /index
ERROR - 2019-05-14 15:35:14 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2018-07-01'
AND `trv_farmer`.`created_on` <= '2019-14-05'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-05-14 15:35:22 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2018-07-01'
AND `trv_farmer`.`created_on` <= '2019-14-05'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-05-14 15:39:38 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2018-07-01'
AND `trv_farmer`.`created_on` <= '2019-14-05'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-05-14 17:03:36 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900004'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-05-14 17:03:36 --> 404 Page Not Found: /index
ERROR - 2019-05-14 22:57:03 --> 404 Page Not Found: /index
