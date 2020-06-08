<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-12-13 02:41:27 --> 404 Page Not Found: /index
ERROR - 2019-12-13 02:41:28 --> 404 Page Not Found: /index
ERROR - 2019-12-13 02:41:30 --> 404 Page Not Found: /index
ERROR - 2019-12-13 02:41:32 --> 404 Page Not Found: /index
ERROR - 2019-12-13 03:29:48 --> 404 Page Not Found: /index
ERROR - 2019-12-13 05:10:23 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900008'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-12-13 05:10:23 --> 404 Page Not Found: /index
ERROR - 2019-12-13 05:10:27 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900008'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-12-13 05:11:44 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900008'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-12-13 05:14:33 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900015'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-12-13 05:14:34 --> 404 Page Not Found: /index
ERROR - 2019-12-13 05:15:12 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900015'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-12-13 05:18:52 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900015'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-12-13 05:19:01 --> Severity: Notice --> Undefined variable: ecommerce_url /home/farmbooks/public_html/application/modules/fpo/views/templates/menu-inner.php 149
ERROR - 2019-12-13 05:19:27 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900012'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-12-13 05:26:03 --> 404 Page Not Found: /index
ERROR - 2019-12-13 05:26:12 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2019-02-01'
AND `trv_farmer`.`created_on` <= '2019-13-12'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-12-13 05:26:18 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2019-02-01'
AND `trv_farmer`.`created_on` <= '2019-13-12'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-12-13 05:26:34 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2019-02-01'
AND `trv_farmer`.`created_on` <= '2019-13-12'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-12-13 05:27:27 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2019-02-01'
AND `trv_farmer`.`created_on` <= '2019-13-12'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-12-13 05:27:45 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2019-02-01'
AND `trv_farmer`.`created_on` <= '2019-13-12'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-12-13 05:30:47 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2019-02-01'
AND `trv_farmer`.`created_on` <= '2019-13-12'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-12-13 05:31:23 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2019-02-01'
AND `trv_farmer`.`created_on` <= '2019-13-12'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-12-13 05:31:37 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2019-02-01'
AND `trv_farmer`.`created_on` <= '2019-13-12'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-12-13 05:32:15 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2019-02-01'
AND `trv_farmer`.`created_on` <= '2019-13-12'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-12-13 05:41:52 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2019-02-01'
AND `trv_farmer`.`created_on` <= '2019-13-12'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-12-13 05:42:29 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2019-02-01'
AND `trv_farmer`.`created_on` <= '2019-13-12'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-12-13 05:45:25 --> 404 Page Not Found: /index
ERROR - 2019-12-13 05:45:28 --> Severity: Notice --> Undefined variable: ecommerce_url /home/farmbooks/public_html/application/modules/fpo/views/templates/menu-inner.php 149
ERROR - 2019-12-13 05:49:56 --> Severity: Notice --> Undefined variable: ecommerce_url /home/farmbooks/public_html/application/modules/fpo/views/templates/menu-inner.php 149
ERROR - 2019-12-13 06:19:37 --> Severity: Notice --> Undefined variable: ecommerce_url /home/farmbooks/public_html/application/modules/fpo/views/templates/menu-inner.php 149
ERROR - 2019-12-13 06:20:35 --> Severity: Notice --> Undefined variable: ecommerce_url /home/farmbooks/public_html/application/modules/fpo/views/templates/menu-inner.php 149
ERROR - 2019-12-13 06:20:48 --> Severity: Notice --> Undefined variable: ecommerce_url /home/farmbooks/public_html/application/modules/fpo/views/templates/menu-inner.php 149
ERROR - 2019-12-13 07:12:27 --> 404 Page Not Found: /index
ERROR - 2019-12-13 07:12:30 --> 404 Page Not Found: /index
ERROR - 2019-12-13 07:20:47 --> 404 Page Not Found: /index
ERROR - 2019-12-13 07:27:02 --> 404 Page Not Found: /index
ERROR - 2019-12-13 08:24:55 --> 404 Page Not Found: /index
ERROR - 2019-12-13 09:39:57 --> Severity: Notice --> Undefined variable: ecommerce_url /home/farmbooks/public_html/application/modules/fpo/views/templates/menu-inner.php 149
ERROR - 2019-12-13 09:40:04 --> Severity: Notice --> Undefined variable: ecommerce_url /home/farmbooks/public_html/application/modules/fpo/views/templates/menu-inner.php 149
ERROR - 2019-12-13 09:40:09 --> Severity: Notice --> Undefined variable: ecommerce_url /home/farmbooks/public_html/application/modules/fpo/views/templates/menu-inner.php 149
ERROR - 2019-12-13 09:40:13 --> Severity: Notice --> Undefined variable: ecommerce_url /home/farmbooks/public_html/application/modules/fpo/views/templates/menu-inner.php 149
ERROR - 2019-12-13 12:27:01 --> 404 Page Not Found: /index
ERROR - 2019-12-13 12:27:08 --> 404 Page Not Found: /index
ERROR - 2019-12-13 14:04:26 --> 404 Page Not Found: /index
ERROR - 2019-12-13 15:04:24 --> 404 Page Not Found: /index
ERROR - 2019-12-13 15:04:25 --> 404 Page Not Found: /index
ERROR - 2019-12-13 18:19:45 --> 404 Page Not Found: /index
ERROR - 2019-12-13 18:19:46 --> 404 Page Not Found: ../modules/api/controllers/Api/vendor
ERROR - 2019-12-13 18:19:46 --> 404 Page Not Found: /index
ERROR - 2019-12-13 18:49:16 --> 404 Page Not Found: /index
ERROR - 2019-12-13 19:24:05 --> 404 Page Not Found: /index
ERROR - 2019-12-13 19:34:07 --> 404 Page Not Found: /index
ERROR - 2019-12-13 19:34:07 --> 404 Page Not Found: /index
ERROR - 2019-12-13 20:37:38 --> 404 Page Not Found: /index
ERROR - 2019-12-13 20:55:19 --> 404 Page Not Found: /index
ERROR - 2019-12-13 23:25:25 --> 404 Page Not Found: /index
