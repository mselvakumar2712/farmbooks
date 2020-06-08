<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-25 04:30:12 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.counter' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `fpo_gl_trans`.`counter`, MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900103'
AND `fpo_gl_trans`.`status` = 1
GROUP BY `fpo_gl_trans`.`tran_date`
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-04-25 04:30:13 --> 404 Page Not Found: /index
ERROR - 2019-04-25 04:35:00 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 283
ERROR - 2019-04-25 04:35:00 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 295
ERROR - 2019-04-25 06:26:20 --> Severity: Notice --> Undefined offset: 1 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 283
ERROR - 2019-04-25 06:26:20 --> Severity: Notice --> Undefined offset: 2 /home/farmbooks/public_html/application/modules/fpo/views/dashboard.php 295
ERROR - 2019-04-25 06:27:20 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-04-25 06:27:20 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-04-25 06:27:20 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-04-25 06:27:20 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-04-25 06:27:20 --> Severity: Notice --> Undefined variable: ledgerBalance /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 175
ERROR - 2019-04-25 06:27:20 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 201
ERROR - 2019-04-25 06:28:38 --> Severity: Notice --> Undefined variable: incomeGLData /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 119
ERROR - 2019-04-25 06:28:38 --> Severity: Notice --> Undefined variable: closingStock /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 127
ERROR - 2019-04-25 06:28:38 --> Severity: Notice --> Undefined variable: incomeCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 144
ERROR - 2019-04-25 06:28:38 --> Severity: Notice --> Undefined variable: incomeCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 144
ERROR - 2019-04-25 06:28:38 --> Severity: Notice --> Undefined variable: openingStock /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 156
ERROR - 2019-04-25 06:28:38 --> Severity: Notice --> Undefined variable: expenseGLData /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 163
ERROR - 2019-04-25 06:28:38 --> Severity: Notice --> Undefined variable: expenseCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 182
ERROR - 2019-04-25 06:28:38 --> Severity: Notice --> Undefined variable: expenseCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 182
ERROR - 2019-04-25 06:28:38 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 192
ERROR - 2019-04-25 06:28:38 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 192
ERROR - 2019-04-25 06:34:19 --> Severity: Warning --> session_start(): Cannot send session cache limiter - headers already sent (output started at /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php:2) /home/farmbooks/public_html/system/libraries/Session/Session.php 143
ERROR - 2019-04-25 06:34:19 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php:2) /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php 31
ERROR - 2019-04-25 06:34:20 --> 404 Page Not Found: /index
ERROR - 2019-04-25 06:34:20 --> Severity: Warning --> session_start(): Cannot send session cache limiter - headers already sent (output started at /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php:2) /home/farmbooks/public_html/system/libraries/Session/Session.php 143
ERROR - 2019-04-25 06:34:20 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php:2) /home/farmbooks/public_html/system/libraries/Session/Session.php 171
ERROR - 2019-04-25 06:34:20 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php:2) /home/farmbooks/public_html/application/modules/fpo/controllers/Updatecrop.php 31
ERROR - 2019-04-25 14:38:19 --> 404 Page Not Found: /index
ERROR - 2019-04-25 14:38:20 --> 404 Page Not Found: /index
ERROR - 2019-04-25 14:38:20 --> 404 Page Not Found: /index
ERROR - 2019-04-25 14:38:21 --> 404 Page Not Found: /index
ERROR - 2019-04-25 14:38:21 --> 404 Page Not Found: /index
ERROR - 2019-04-25 14:38:22 --> 404 Page Not Found: /index
