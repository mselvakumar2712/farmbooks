<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-31 04:25:25 --> 404 Page Not Found: /index
ERROR - 2019-07-31 05:51:32 --> 404 Page Not Found: /index
ERROR - 2019-07-31 06:33:45 --> 404 Page Not Found: /index
ERROR - 2019-07-31 06:38:05 --> Query error: Table 'farmbook_prod.fpo_farmer_bank_accounts1' doesn't exist - Invalid query: SELECT `ref`.`id`, `ref`.`farmer_id`, `ref`.`bank_id`, `ref`.`branch_id`, `ref`.`account_number`, `ref`.`ifsc_code`, `ref`.`mobile_no`
FROM `fpo_farmer_bank_accounts1` as `ref`
WHERE `ref`.`mobile_no` = '9898989898'
AND `ref`.`status` = '1'
ERROR - 2019-07-31 06:43:52 --> Query error: Table 'farmbook_prod.fpo_farmer_bank_accounts1' doesn't exist - Invalid query: SELECT `ref`.`id`, `ref`.`farmer_id`, `ref`.`bank_id`, `tbnm`.`name` `bank_name`, `ref`.`branch_id`, `tbm`.`branch_name`, `ref`.`account_number`, `ref`.`ifsc_code`, `ref`.`mobile_no`
FROM `fpo_farmer_bank_accounts1` as `ref`
JOIN `trv_bank_name_master` `tbnm` ON `tbnm`.`id` = `ref`.`bank_id`
JOIN `trv_bank_master` `tbm` ON `tbm`.`id` = `ref`.`branch_id`
WHERE `ref`.`mobile_no` = '9898989898'
AND `ref`.`status` = '1'
ERROR - 2019-07-31 07:12:35 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-31 07:12:35 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-31 07:12:35 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-31 07:12:35 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-31 07:12:35 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-31 07:12:38 --> Severity: Notice --> Undefined variable: farmer_id /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 116
ERROR - 2019-07-31 07:12:38 --> Severity: Notice --> Undefined variable: data /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 121
ERROR - 2019-07-31 07:12:38 --> Severity: Notice --> Undefined variable: query /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-31 07:12:38 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/core/Common.php 564
ERROR - 2019-07-31 07:12:38 --> Severity: Error --> Call to a member function num_rows() on null /home/farmbooks/public_html/application/modules/api/controllers/DataCollection.php 124
ERROR - 2019-07-31 07:51:02 --> 404 Page Not Found: /index
ERROR - 2019-07-31 09:05:56 --> Severity: Notice --> Undefined index: token_key /home/farmbooks/public_html/application/modules/api/models/Login_Model.php 247
ERROR - 2019-07-31 09:13:13 --> 404 Page Not Found: /index
ERROR - 2019-07-31 13:33:15 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 190
ERROR - 2019-07-31 13:33:15 --> Severity: Warning --> number_format() expects parameter 1 to be double, string given /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 190
ERROR - 2019-07-31 13:34:05 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 190
ERROR - 2019-07-31 13:34:05 --> Severity: Warning --> number_format() expects parameter 1 to be double, string given /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 190
ERROR - 2019-07-31 13:34:08 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-07-31 13:34:08 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-07-31 13:34:08 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-07-31 13:34:08 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-07-31 13:34:08 --> Severity: Notice --> Undefined variable: ledgerBalance /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 175
ERROR - 2019-07-31 13:34:08 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 201
ERROR - 2019-07-31 13:38:42 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 190
ERROR - 2019-07-31 13:38:42 --> Severity: Warning --> number_format() expects parameter 1 to be double, string given /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 190
ERROR - 2019-07-31 14:41:37 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/api/models/API_Model.php 666
ERROR - 2019-07-31 20:41:42 --> 404 Page Not Found: /index
ERROR - 2019-07-31 20:41:42 --> 404 Page Not Found: /index
ERROR - 2019-07-31 20:41:42 --> 404 Page Not Found: /index
ERROR - 2019-07-31 20:41:43 --> 404 Page Not Found: /index
ERROR - 2019-07-31 20:41:43 --> 404 Page Not Found: /index
ERROR - 2019-07-31 20:41:43 --> 404 Page Not Found: /index
ERROR - 2019-07-31 21:54:04 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/api/models/API_Model.php 666
