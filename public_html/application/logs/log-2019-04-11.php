<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-11 07:34:52 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900103'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-04-11 07:34:52 --> 404 Page Not Found: /index
ERROR - 2019-04-11 07:35:00 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900103'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-04-11 07:35:01 --> 404 Page Not Found: /index
ERROR - 2019-04-11 07:36:15 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900103'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-04-11 07:36:19 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900103'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-04-11 07:36:38 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900103'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-04-11 07:41:52 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_farmer`.`id`, `trv_farmer`.`status`, YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2018-06-01'
AND `trv_farmer`.`created_on` <= '2019-11-04'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-04-11 07:41:52 --> 404 Page Not Found: /index
ERROR - 2019-04-11 07:44:08 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 283
ERROR - 2019-04-11 07:44:08 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 295
ERROR - 2019-04-11 07:47:15 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 283
ERROR - 2019-04-11 07:47:15 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 295
ERROR - 2019-04-11 07:47:51 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900103'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-04-11 07:47:51 --> 404 Page Not Found: /index
ERROR - 2019-04-11 07:48:21 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 283
ERROR - 2019-04-11 07:48:21 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 295
ERROR - 2019-04-11 07:50:52 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 283
ERROR - 2019-04-11 07:50:52 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 295
ERROR - 2019-04-11 08:27:33 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-04-11 08:27:33 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-04-11 08:27:33 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-04-11 08:27:33 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-04-11 08:27:33 --> Severity: Notice --> Undefined variable: ledgerBalance /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 175
ERROR - 2019-04-11 08:27:33 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 201
ERROR - 2019-04-11 17:28:40 --> 404 Page Not Found: /index
