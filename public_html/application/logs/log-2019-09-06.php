<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-09-06 01:40:01 --> 404 Page Not Found: /index
ERROR - 2019-09-06 04:17:06 --> 404 Page Not Found: /index
ERROR - 2019-09-06 04:17:07 --> 404 Page Not Found: /index
ERROR - 2019-09-06 04:17:09 --> 404 Page Not Found: /index
ERROR - 2019-09-06 05:09:21 --> 404 Page Not Found: /index
ERROR - 2019-09-06 05:32:18 --> 404 Page Not Found: /index
ERROR - 2019-09-06 05:33:08 --> Severity: Notice --> Undefined variable: uom /home/farmbooks/public_html/application/modules/fpo/views/masterdata/godown/viewgodown.php 92
ERROR - 2019-09-06 05:33:32 --> Severity: Notice --> Undefined variable: uom /home/farmbooks/public_html/application/modules/fpo/views/masterdata/godown/editgodown.php 93
ERROR - 2019-09-06 05:35:55 --> Query error: Unknown column 'ref.id' in 'field list' - Invalid query: SELECT `ref`.`id`, DATE_FORMAT(ref.payment_date, "%d/%m/%Y") payment_date, `ref`.`labour`, round(ref.wages, 0) wages, round(ref.advance_adjustment, 0) advance_adjustment, round(ref.payment, 0) payment, round(ref.balance, 0) balance
FROM `fpo_labour_payment` as `ref1`
WHERE `ref`.`farmer_id` IS NULL
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` ASC
ERROR - 2019-09-06 05:35:55 --> 404 Page Not Found: /index
ERROR - 2019-09-06 05:37:27 --> Query error: Unknown column 'ref.id' in 'field list' - Invalid query: SELECT `ref`.`id`, DATE_FORMAT(ref.payment_date, "%d/%m/%Y") payment_date, `ref`.`labour`, round(ref.wages, 0) wages, round(ref.advance_adjustment, 0) advance_adjustment, round(ref.payment, 0) payment, round(ref.balance, 0) balance
FROM `fpo_labour_payment` as `ref1`
WHERE `ref`.`farmer_id` = 2063
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` ASC
ERROR - 2019-09-06 05:42:29 --> Query error: Unknown column 'ref.id' in 'field list' - Invalid query: SELECT `ref`.`id`, DATE_FORMAT(ref.payment_date, "%d/%m/%Y") payment_date, `ref`.`labour`, `le`.`name` `labour_name`, round(ref.wages, 0) wages, round(ref.advance_adjustment, 0) advance_adjustment, round(ref.payment, 0) payment, round(ref.balance, 0) balance
FROM `fpo_labour_payment` as `ref1`
JOIN `fpo_labour_enrolment` as `le` ON `le`.`id` = `ref`.`labour`
WHERE `ref`.`farmer_id` = 2063
AND `ref`.`status` = '1'
ORDER BY `ref`.`id` ASC
ERROR - 2019-09-06 05:48:34 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-09-06 05:48:46 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-09-06 05:48:50 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-09-06 05:49:58 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-09-06 05:50:35 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/farmbooks/public_html/application/modules/fpo/views/templates/operation-side-bar.php 40
ERROR - 2019-09-06 05:54:13 --> Severity: Notice --> Undefined variable: seed_cost /home/farmbooks/public_html/application/models/Crop_Model.php 90
ERROR - 2019-09-06 05:54:13 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/helpers/url_helper.php 564
ERROR - 2019-09-06 05:54:13 --> 404 Page Not Found: /index
ERROR - 2019-09-06 06:58:04 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/popi/views/fpo/editfpo.php 127
ERROR - 2019-09-06 06:58:49 --> Severity: Notice --> Undefined index: taluk /home/farmbooks/public_html/application/modules/popi/views/fpo/editfpo.php 127
ERROR - 2019-09-06 07:28:28 --> 404 Page Not Found: ../modules/fpo/controllers/Farmer/getProductList
ERROR - 2019-09-06 07:29:16 --> 404 Page Not Found: ../modules/fpo/controllers/Farmer/getProductList
ERROR - 2019-09-06 07:49:02 --> Severity: Notice --> Undefined variable: uom /home/farmbooks/public_html/application/modules/fpo/views/masterdata/godown/editgodown.php 93
ERROR - 2019-09-06 08:06:26 --> Severity: Warning --> Missing argument 1 for Login::getvillages() /home/farmbooks/public_html/application/modules/administrator/controllers/Login.php 272
ERROR - 2019-09-06 08:06:26 --> Severity: Notice --> Undefined variable: panchayat_id /home/farmbooks/public_html/application/modules/administrator/controllers/Login.php 273
ERROR - 2019-09-06 08:38:07 --> Severity: Notice --> Undefined variable: seed_cost /home/farmbooks/public_html/application/models/Crop_Model.php 90
ERROR - 2019-09-06 08:38:07 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/helpers/url_helper.php 564
ERROR - 2019-09-06 08:40:40 --> Severity: Notice --> Undefined variable: seed_cost /home/farmbooks/public_html/application/models/Crop_Model.php 90
ERROR - 2019-09-06 08:40:40 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/helpers/url_helper.php 564
ERROR - 2019-09-06 08:42:05 --> Severity: Notice --> Undefined variable: seed_cost /home/farmbooks/public_html/application/models/Crop_Model.php 90
ERROR - 2019-09-06 08:42:05 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/helpers/url_helper.php 564
ERROR - 2019-09-06 08:42:54 --> Severity: Warning --> Missing argument 2 for Crop::cropbyname() /home/farmbooks/public_html/application/modules/fpo/controllers/Crop.php 173
ERROR - 2019-09-06 08:42:54 --> Severity: Notice --> Undefined variable: name_id /home/farmbooks/public_html/application/modules/fpo/controllers/Crop.php 174
ERROR - 2019-09-06 08:42:54 --> Severity: Notice --> Trying to get property of non-object /home/farmbooks/public_html/application/modules/fpo/controllers/Crop.php 174
ERROR - 2019-09-06 08:43:17 --> Severity: Notice --> Undefined variable: seed_cost /home/farmbooks/public_html/application/models/Crop_Model.php 90
ERROR - 2019-09-06 08:43:17 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/farmbooks/public_html/system/core/Exceptions.php:271) /home/farmbooks/public_html/system/helpers/url_helper.php 564
ERROR - 2019-09-06 09:07:32 --> Severity: Notice --> Undefined variable: supplier /home/farmbooks/public_html/application/modules/fpo/views/inventory/purchase/inquires_reports/stock_report.php 74
ERROR - 2019-09-06 09:07:32 --> Severity: Notice --> Undefined variable: location /home/farmbooks/public_html/application/modules/fpo/views/inventory/purchase/inquires_reports/stock_report.php 96
ERROR - 2019-09-06 09:12:31 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-09-06 09:12:31 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-09-06 09:12:31 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-09-06 09:12:31 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-09-06 09:12:31 --> Severity: Notice --> Undefined variable: ledgerBalance /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 175
ERROR - 2019-09-06 09:12:31 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 201
ERROR - 2019-09-06 09:12:59 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-09-06 09:12:59 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-09-06 09:12:59 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-09-06 09:12:59 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-09-06 09:12:59 --> Severity: Notice --> Undefined variable: ledgerBalance /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 175
ERROR - 2019-09-06 09:12:59 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 201
ERROR - 2019-09-06 09:13:02 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 190
ERROR - 2019-09-06 09:13:02 --> Severity: Warning --> number_format() expects parameter 1 to be double, string given /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 190
ERROR - 2019-09-06 09:17:48 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-09-06 09:17:48 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-09-06 09:17:48 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-09-06 09:17:48 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-09-06 09:17:48 --> Severity: Notice --> Undefined variable: ledgerBalance /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 175
ERROR - 2019-09-06 09:17:48 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 201
ERROR - 2019-09-06 09:17:56 --> Severity: Notice --> Undefined variable: netExpense /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 190
ERROR - 2019-09-06 09:17:56 --> Severity: Warning --> number_format() expects parameter 1 to be double, string given /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/profit_loss_drilldown.php 190
ERROR - 2019-09-06 10:08:13 --> Severity: Notice --> Undefined variable: uom /home/farmbooks/public_html/application/modules/fpo/views/masterdata/godown/viewgodown.php 92
ERROR - 2019-09-06 10:25:45 --> 404 Page Not Found: /index
ERROR - 2019-09-06 10:35:46 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-09-06 10:35:46 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-09-06 10:35:46 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-09-06 10:35:46 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-09-06 10:35:46 --> Severity: Notice --> Undefined variable: ledgerBalance /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 175
ERROR - 2019-09-06 10:35:46 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 201
ERROR - 2019-09-06 10:36:49 --> Severity: Warning --> Missing argument 1 for Market::getbanklist() /home/farmbooks/public_html/application/modules/fpo/controllers/Market.php 405
ERROR - 2019-09-06 10:36:49 --> Severity: Notice --> Undefined variable: state_id /home/farmbooks/public_html/application/modules/fpo/controllers/Market.php 407
ERROR - 2019-09-06 10:37:36 --> Severity: Warning --> Missing argument 1 for Market::getbanklist() /home/farmbooks/public_html/application/modules/fpo/controllers/Market.php 405
ERROR - 2019-09-06 10:37:36 --> Severity: Notice --> Undefined variable: state_id /home/farmbooks/public_html/application/modules/fpo/controllers/Market.php 407
ERROR - 2019-09-06 10:39:35 --> Severity: Warning --> Missing argument 1 for Inventory::getsellingPrice() /home/farmbooks/public_html/application/modules/fpo/controllers/Inventory.php 902
ERROR - 2019-09-06 10:39:35 --> Severity: Notice --> Undefined variable: price_id /home/farmbooks/public_html/application/modules/fpo/controllers/Inventory.php 903
ERROR - 2019-09-06 10:40:35 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-09-06 10:40:35 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 131
ERROR - 2019-09-06 10:40:35 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-09-06 10:40:35 --> Severity: Notice --> Undefined variable: assetCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 167
ERROR - 2019-09-06 10:40:35 --> Severity: Notice --> Undefined variable: ledgerBalance /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 175
ERROR - 2019-09-06 10:40:35 --> Severity: Notice --> Undefined variable: liablityCost /home/farmbooks/public_html/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 201
ERROR - 2019-09-06 10:49:06 --> Severity: Notice --> Undefined variable: land /home/farmbooks/public_html/application/modules/fpo/views/crop/editcrop.php 80
ERROR - 2019-09-06 15:28:49 --> 404 Page Not Found: /index
ERROR - 2019-09-06 15:30:18 --> 404 Page Not Found: /index
ERROR - 2019-09-06 16:00:50 --> 404 Page Not Found: /index
ERROR - 2019-09-06 18:29:46 --> 404 Page Not Found: /index
ERROR - 2019-09-06 18:37:57 --> 404 Page Not Found: /index
