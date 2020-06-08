<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-05-01 00:40:29 --> 404 Page Not Found: /index
ERROR - 2019-05-01 07:12:03 --> 404 Page Not Found: /index
ERROR - 2019-05-01 14:53:15 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:19:04 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_farmer`.`id`, `trv_farmer`.`status`, YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2018-07-01'
AND `trv_farmer`.`created_on` <= '2019-01-05'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-05-01 16:19:05 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:21:58 --> 404 Page Not Found: ../modules/administrator/controllers/Finance/index
ERROR - 2019-05-01 16:22:06 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_farmer`.`id`, `trv_farmer`.`status`, YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2018-07-01'
AND `trv_farmer`.`created_on` <= '2019-01-05'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-05-01 16:28:43 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `trv_farmer`.`id`, `trv_farmer`.`status`, YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2018-07-01'
AND `trv_farmer`.`created_on` <= '2019-01-05'
GROUP BY YEAR(trv_farmer.created_on), month(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2019-05-01 16:28:51 --> 404 Page Not Found: ../modules/administrator/controllers/Finance/index
ERROR - 2019-05-01 16:29:23 --> 404 Page Not Found: ../modules/administrator/controllers/Finance/salesentry
ERROR - 2019-05-01 16:29:47 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900103'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-05-01 16:30:11 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:30:19 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:30:24 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:30:30 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:30:33 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:30:46 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:30:50 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:30:56 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:31:00 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:31:03 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:31:06 --> Severity: Notice --> Undefined variable: incomeGLData /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/trial_balance.php 179
ERROR - 2019-05-01 16:31:06 --> Severity: Notice --> Undefined variable: openingStock /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/trial_balance.php 204
ERROR - 2019-05-01 16:31:06 --> Severity: Notice --> Undefined variable: expenseGLData /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/trial_balance.php 217
ERROR - 2019-05-01 16:31:07 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:31:10 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-05-01 16:31:10 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-05-01 16:31:10 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-05-01 16:31:10 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-05-01 16:31:10 --> Severity: Notice --> Undefined variable: ledgerBalance /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 175
ERROR - 2019-05-01 16:31:10 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 201
ERROR - 2019-05-01 16:31:10 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:31:13 --> Severity: Notice --> Undefined variable: incomeGLData /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 107
ERROR - 2019-05-01 16:31:13 --> Severity: Notice --> Undefined variable: closingStock /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 115
ERROR - 2019-05-01 16:31:13 --> Severity: Notice --> Undefined variable: incomeCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 132
ERROR - 2019-05-01 16:31:13 --> Severity: Notice --> Undefined variable: incomeCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 132
ERROR - 2019-05-01 16:31:13 --> Severity: Notice --> Undefined variable: openingStock /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 144
ERROR - 2019-05-01 16:31:13 --> Severity: Notice --> Undefined variable: expenseGLData /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 151
ERROR - 2019-05-01 16:31:13 --> Severity: Notice --> Undefined variable: expenseCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 170
ERROR - 2019-05-01 16:31:13 --> Severity: Notice --> Undefined variable: expenseCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 170
ERROR - 2019-05-01 16:31:13 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 180
ERROR - 2019-05-01 16:31:13 --> Severity: Warning --> number_format() expects parameter 1 to be double, string given /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 180
ERROR - 2019-05-01 16:31:13 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 180
ERROR - 2019-05-01 16:31:13 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:31:20 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900103'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-05-01 16:31:20 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:32:43 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 285
ERROR - 2019-05-01 16:32:43 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 297
ERROR - 2019-05-01 16:32:44 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:32:46 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 285
ERROR - 2019-05-01 16:32:46 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 297
ERROR - 2019-05-01 16:32:46 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:33:51 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:34:02 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:37:14 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:37:21 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:37:27 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:37:30 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:38:20 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:38:27 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:38:33 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:38:38 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:40:05 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:40:13 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:40:19 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:41:51 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:42:33 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:42:38 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:43:33 --> Severity: Warning --> Missing argument 1 for Inventory::getbanklist() /home/farmbooks/public_html/application/modules/fpo/controllers/Inventory.php 426
ERROR - 2019-05-01 16:43:33 --> Severity: Notice --> Undefined variable: state_id /home/farmbooks/public_html/application/modules/fpo/controllers/Inventory.php 427
ERROR - 2019-05-01 16:43:59 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:44:11 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:44:18 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:45:13 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:45:29 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:45:47 --> Query error: Unknown column 'fpo_purch_order_details.selling_price' in 'field list' - Invalid query: SELECT `fpo_purch_order_details`.`po_detail_item`, `fpo_purch_order_details`.`selling_price`, `fpo_purch_order_details`.`mrp`, `fpo_purch_order_details`.`item_code`
FROM `fpo_purch_order_details`
WHERE `fpo_purch_order_details`.`item_code` = '6'
AND `fpo_purch_order_details`.`fpo_id` = '32900103'
GROUP BY `fpo_purch_order_details`.`mrp`
ERROR - 2019-05-01 16:45:55 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:46:15 --> Query error: Unknown column 'fpo_stock_moves.uom' in 'field list' - Invalid query: SELECT DISTINCT SUM(`fpo_stock_moves`.`qty`) AS `qty`, `fpo_stock_moves`.`uom`
FROM `fpo_stock_moves`
WHERE `fpo_stock_moves`.`stock_id` = '6'
AND `fpo_stock_moves`.`visible` = 1
AND `fpo_stock_moves`.`person_id` = '32900103'
ERROR - 2019-05-01 16:47:03 --> Query error: Unknown column 'mrp' in 'field list' - Invalid query: INSERT INTO `fpo_purch_order_details` (`fpo_id`, `order_no`, `item_code`, `description`, `delivery_date`, `qty_invoiced`, `unit_price`, `quantity_received`, `act_price`, `std_cost_unit`, `quantity_ordered`, `uom`, `mrp`, `selling_price`) VALUES ('32900103', 3, '6', 'Desc', '2019-05-01', '100', '250', '100', 0, 0, '100', '1', '', '')
ERROR - 2019-05-01 16:54:47 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:55:11 --> Query error: Unknown column 'fpo_stock_moves.uom' in 'field list' - Invalid query: SELECT DISTINCT SUM(`fpo_stock_moves`.`qty`) AS `qty`, `fpo_stock_moves`.`uom`
FROM `fpo_stock_moves`
WHERE `fpo_stock_moves`.`stock_id` = '6'
AND `fpo_stock_moves`.`visible` = 1
AND `fpo_stock_moves`.`person_id` = '32900103'
ERROR - 2019-05-01 16:55:41 --> Query error: Unknown column 'uom' in 'field list' - Invalid query: INSERT INTO `fpo_stock_moves` (`trans_no`, `stock_id`, `loc_code`, `tran_date`, `price`, `qty`, `type`, `uom`, `person_id`, `visible`) VALUES (1, '6', '4', '2019-05-01', '300', '100', 1, '1', '32900103', 1)
ERROR - 2019-05-01 16:58:30 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:58:33 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:59:47 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:59:52 --> 404 Page Not Found: /index
ERROR - 2019-05-01 16:59:57 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:00:13 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:01:10 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:01:18 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:01:22 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:01:32 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:02:11 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:02:19 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:02:55 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:03:04 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:03:53 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:04:06 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-05-01 17:04:06 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-05-01 17:04:06 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-05-01 17:04:06 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-05-01 17:04:06 --> Severity: Notice --> Undefined variable: ledgerBalance /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 175
ERROR - 2019-05-01 17:04:06 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 201
ERROR - 2019-05-01 17:04:07 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:04:09 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:04:35 --> Severity: Notice --> Undefined variable: incomeGLData /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 107
ERROR - 2019-05-01 17:04:35 --> Severity: Notice --> Undefined variable: closingStock /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 115
ERROR - 2019-05-01 17:04:35 --> Severity: Notice --> Undefined variable: incomeCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 132
ERROR - 2019-05-01 17:04:35 --> Severity: Notice --> Undefined variable: incomeCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 132
ERROR - 2019-05-01 17:04:35 --> Severity: Notice --> Undefined variable: openingStock /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 144
ERROR - 2019-05-01 17:04:35 --> Severity: Notice --> Undefined variable: expenseGLData /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 151
ERROR - 2019-05-01 17:04:35 --> Severity: Notice --> Undefined variable: expenseCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 170
ERROR - 2019-05-01 17:04:35 --> Severity: Notice --> Undefined variable: expenseCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 170
ERROR - 2019-05-01 17:04:35 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 180
ERROR - 2019-05-01 17:04:35 --> Severity: Warning --> number_format() expects parameter 1 to be double, string given /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 180
ERROR - 2019-05-01 17:04:35 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 180
ERROR - 2019-05-01 17:04:36 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:04:39 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:04:58 --> Severity: Notice --> Undefined variable: incomeGLData /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/trial_balance.php 179
ERROR - 2019-05-01 17:04:58 --> Severity: Notice --> Undefined variable: openingStock /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/trial_balance.php 204
ERROR - 2019-05-01 17:04:58 --> Severity: Notice --> Undefined variable: expenseGLData /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/trial_balance.php 217
ERROR - 2019-05-01 17:04:58 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:05:00 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:05:08 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:05:24 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:07:00 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:07:30 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:07:46 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:08:29 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:08:59 --> Severity: Notice --> Undefined index: credit /home/farmbooks/public_html/application/models/Finance_Model.php 156
ERROR - 2019-05-01 17:09:00 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/helpers/url_helper.php 564
ERROR - 2019-05-01 17:11:45 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:11:58 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:12:45 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:12:50 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:13:17 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:13:17 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:13:18 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:13:46 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:13:46 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:14:16 --> Severity: Notice --> Undefined variable: incomeGLData /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/trial_balance.php 179
ERROR - 2019-05-01 17:14:16 --> Severity: Notice --> Undefined variable: openingStock /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/trial_balance.php 204
ERROR - 2019-05-01 17:14:16 --> Severity: Notice --> Undefined variable: expenseGLData /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/trial_balance.php 217
ERROR - 2019-05-01 17:14:17 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:14:17 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:14:20 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:14:20 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:14:26 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-05-01 17:14:26 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-05-01 17:14:26 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-05-01 17:14:26 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-05-01 17:14:26 --> Severity: Notice --> Undefined variable: ledgerBalance /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 175
ERROR - 2019-05-01 17:14:26 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 201
ERROR - 2019-05-01 17:14:27 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:14:27 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:14:30 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:14:30 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:14:42 --> Severity: Notice --> Undefined variable: incomeGLData /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 107
ERROR - 2019-05-01 17:14:42 --> Severity: Notice --> Undefined variable: closingStock /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 115
ERROR - 2019-05-01 17:14:42 --> Severity: Notice --> Undefined variable: incomeCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 132
ERROR - 2019-05-01 17:14:42 --> Severity: Notice --> Undefined variable: incomeCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 132
ERROR - 2019-05-01 17:14:42 --> Severity: Notice --> Undefined variable: openingStock /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 144
ERROR - 2019-05-01 17:14:42 --> Severity: Notice --> Undefined variable: expenseGLData /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 151
ERROR - 2019-05-01 17:14:42 --> Severity: Notice --> Undefined variable: expenseCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 170
ERROR - 2019-05-01 17:14:42 --> Severity: Notice --> Undefined variable: expenseCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 170
ERROR - 2019-05-01 17:14:42 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 180
ERROR - 2019-05-01 17:14:42 --> Severity: Warning --> number_format() expects parameter 1 to be double, string given /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 180
ERROR - 2019-05-01 17:14:42 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 180
ERROR - 2019-05-01 17:14:43 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:14:43 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:14:46 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:14:46 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:14:56 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:14:57 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:15:55 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:15:56 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:16:01 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:16:02 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:16:06 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:16:06 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:16:11 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:16:11 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:16:15 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:16:15 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:16:19 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:16:20 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:16:29 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:16:29 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:17:44 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:17:44 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:17:56 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:17:57 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:18:02 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:18:02 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:18:06 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:18:06 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:18:15 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:19:44 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:19:45 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:20:44 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:20:44 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:20:57 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:20:57 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:21:13 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:21:14 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:21:19 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:21:19 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:21:24 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:21:25 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:21:47 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:21:47 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:21:51 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:21:52 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:22:53 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:22:53 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:23:08 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:23:08 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:23:12 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:23:13 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:30:09 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:30:10 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:30:16 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:30:16 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:30:25 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:30:26 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:30:28 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:30:29 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:30:59 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:30:59 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:31:05 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:31:05 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:33:41 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:33:57 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:34:54 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:34:58 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:35:08 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:35:31 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:35:44 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:35:59 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-05-01 17:36:00 --> 404 Page Not Found: /index
ERROR - 2019-05-01 17:38:01 --> 404 Page Not Found: /index
ERROR - 2019-05-01 19:01:07 --> 404 Page Not Found: /index
