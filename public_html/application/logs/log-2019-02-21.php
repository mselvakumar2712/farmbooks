<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-21 12:13:28 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/maintenance/customers.php 331
ERROR - 2019-02-21 12:13:44 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/maintenance/customers.php 331
ERROR - 2019-02-21 12:14:11 --> Severity: Notice --> Undefined variable: gldata /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/glreports.php 77
ERROR - 2019-02-21 13:08:23 --> 404 Page Not Found: /index
ERROR - 2019-02-21 13:09:00 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-21 13:09:50 --> Severity: Notice --> Undefined variable: gldata /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/glreports.php 77
ERROR - 2019-02-21 13:12:03 --> Query error: Column 'variety_id' cannot be null - Invalid query: INSERT INTO `trv_crop` (`crop_type`, `variety_id`, `crop_id`, `category_id`, `subcategory_id`, `class_id`, `season_id`, `is_direct_seeding`, `transplant_date`, `area`, `area_uom`, `seed_qty`, `quantity_uom`, `seed_cost`, `expected_harvest_date`, `farmer_id`, `land_id`, `status`, `updated_on`, `updated_by`) VALUES ('1', NULL, NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', '', NULL, 1, '2019-02-21 13:12:03', '')
ERROR - 2019-02-21 13:14:21 --> Severity: Notice --> Undefined variable: gldata /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/glreports.php 77
ERROR - 2019-02-21 13:14:33 --> 404 Page Not Found: /index
ERROR - 2019-02-21 13:26:02 --> Query error: Unknown column 'share_applied' in 'field list' - Invalid query: INSERT INTO `trv_share_allotment` (`allotment_nature`, `resolution_number`, `resolution_date`, `member_type`, `holder_id`, `folio_number`, `share_applied`, `share_allotted`, `created_by`, `created_on`) VALUES (1, '', '', '2', '1', '0014', '10', '10', '', '2019-02-21 13:26:02')
ERROR - 2019-02-21 13:37:46 --> Severity: Notice --> Undefined variable: gldata /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/glreports.php 77
ERROR - 2019-02-21 13:38:27 --> Severity: Notice --> Undefined variable: gldata /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/glreports.php 77
ERROR - 2019-02-21 13:45:03 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 13:45:03 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 13:45:03 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 13:45:03 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 13:45:03 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 13:45:03 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 13:45:03 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 13:52:41 --> Severity: Warning --> Missing argument 1 for Finance::getAccountBalance() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/controllers/Finance.php 1268
ERROR - 2019-02-21 13:52:41 --> Severity: Notice --> Undefined variable: account_id /home/easzapps/public_html/UAT/fpo/application/modules/fpo/controllers/Finance.php 1269
ERROR - 2019-02-21 13:52:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'And fpo_gl_trans.status = 1' at line 1 - Invalid query: SELECT SUM(fpo_gl_trans.amount) As current_amount FROM `fpo_gl_trans` WHERE fpo_gl_trans.fpo_id = 32900712 And fpo_gl_trans.account_code = '40204' AND fpo_gl_trans.account =  And fpo_gl_trans.status = 1
ERROR - 2019-02-21 13:54:39 --> 404 Page Not Found: ../modules/api/controllers/Crop/croplist
ERROR - 2019-02-21 13:55:05 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/models/Customer_Model.php 924
ERROR - 2019-02-21 13:56:23 --> 404 Page Not Found: ../modules/api/controllers/Crop/croplist
ERROR - 2019-02-21 13:57:08 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/models/Supplier_Model.php 1064
ERROR - 2019-02-21 13:57:08 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/models/Supplier_Model.php 1065
ERROR - 2019-02-21 13:57:08 --> Query error: Column 'gl_code' cannot be null - Invalid query: INSERT INTO `fpo_supp_invoice_items` (`supp_trans_no`, `supp_trans_type`, `gl_code`, `grn_item_id`, `po_detail_item_id`, `stock_id`, `description`, `quantity`, `uom`, `unit_price`, `e_qty`, `e_uom`, `discount`, `memo_`) VALUES (1, 20, NULL, 1, 1, '5', 'Marquis wheat', '2', '11', '100', '1', NULL, '12', 'rrr')
ERROR - 2019-02-21 14:00:01 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/models/Supplier_Model.php 1064
ERROR - 2019-02-21 14:00:01 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/models/Supplier_Model.php 1065
ERROR - 2019-02-21 14:00:01 --> Query error: Column 'gl_code' cannot be null - Invalid query: INSERT INTO `fpo_supp_invoice_items` (`supp_trans_no`, `supp_trans_type`, `gl_code`, `grn_item_id`, `po_detail_item_id`, `stock_id`, `description`, `quantity`, `uom`, `unit_price`, `e_qty`, `e_uom`, `discount`, `memo_`) VALUES (2, 20, NULL, 2, 2, '5', 'Marquis wheat', '1000', '11', '1230', '123', NULL, '120', 'vgffvu')
ERROR - 2019-02-21 14:01:38 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-21 14:05:41 --> Severity: Notice --> Undefined variable: gldata /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/glreports.php 77
ERROR - 2019-02-21 14:05:47 --> Severity: Notice --> Undefined variable: gldata /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/glreports.php 77
ERROR - 2019-02-21 14:05:48 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 14:05:48 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 14:05:48 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 14:05:48 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 14:05:48 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 14:07:44 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 14:07:44 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 14:07:44 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 14:07:44 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 14:07:44 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 14:13:03 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-21 14:18:09 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-21 14:18:13 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-21 14:25:12 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-21 14:30:20 --> Severity: Notice --> Undefined variable: gldata /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/glreports.php 77
ERROR - 2019-02-21 14:31:42 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-21 14:39:54 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-21 14:40:01 --> Severity: Notice --> Undefined index: id /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/fig/editfig.php 285
ERROR - 2019-02-21 14:40:01 --> Severity: Notice --> Undefined index: id /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/fig/editfig.php 289
ERROR - 2019-02-21 14:40:39 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-21 14:41:22 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-21 14:42:06 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-21 14:42:31 --> Severity: Notice --> Undefined index: id /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/fig/editfig.php 285
ERROR - 2019-02-21 14:42:31 --> Severity: Notice --> Undefined index: id /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/fig/editfig.php 289
ERROR - 2019-02-21 14:43:35 --> Severity: Notice --> Undefined index: id /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/fig/editfig.php 285
ERROR - 2019-02-21 14:43:35 --> Severity: Notice --> Undefined index: id /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/fig/editfig.php 289
ERROR - 2019-02-21 14:44:45 --> Severity: Notice --> Undefined index: id /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/fig/editfig.php 285
ERROR - 2019-02-21 14:44:45 --> Severity: Notice --> Undefined index: id /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/fig/editfig.php 289
ERROR - 2019-02-21 14:44:54 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-21 14:48:11 --> Severity: Notice --> Undefined variable: ledger_type /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/transaction/sales_entry.php 154
ERROR - 2019-02-21 14:48:48 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 66
ERROR - 2019-02-21 14:48:51 --> 404 Page Not Found: /index
ERROR - 2019-02-21 14:55:23 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/models/Customer_Model.php 924
ERROR - 2019-02-21 14:55:23 --> Severity: Notice --> Undefined variable: ledger_type /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/transaction/sales_entry.php 154
ERROR - 2019-02-21 14:55:28 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/maintenance/customers.php 331
ERROR - 2019-02-21 15:03:46 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/maintenance/customers.php 331
ERROR - 2019-02-21 15:04:00 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/maintenance/customers.php 331
ERROR - 2019-02-21 15:04:03 --> Severity: Notice --> Undefined variable: ledger_type /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/transaction/sales_entry.php 154
ERROR - 2019-02-21 15:05:36 --> Severity: Notice --> Undefined variable: ledger_type /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/transaction/sales_entry.php 154
ERROR - 2019-02-21 15:11:23 --> 404 Page Not Found: ../modules/api/controllers/Crop/croplist
ERROR - 2019-02-21 15:13:11 --> 404 Page Not Found: ../modules/api/controllers/Crop/croplist
ERROR - 2019-02-21 15:13:20 --> Severity: Notice --> Undefined variable: ledger_type /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/transaction/sales_entry.php 154
ERROR - 2019-02-21 15:14:07 --> 404 Page Not Found: ../modules/api/controllers/Crop/croplist
ERROR - 2019-02-21 15:14:17 --> 404 Page Not Found: ../modules/api/controllers/Crop/croplist
ERROR - 2019-02-21 15:14:25 --> 404 Page Not Found: ../modules/api/controllers/Crop/croplist
ERROR - 2019-02-21 15:14:37 --> 404 Page Not Found: ../modules/api/controllers/Crop/croplist
ERROR - 2019-02-21 15:15:23 --> 404 Page Not Found: ../modules/api/controllers/Crop/croplist
ERROR - 2019-02-21 15:15:44 --> 404 Page Not Found: ../modules/api/controllers/Crop/croplist
ERROR - 2019-02-21 15:16:39 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 15:16:39 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 15:16:39 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 15:16:39 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 15:16:39 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 15:16:39 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 15:16:39 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 15:18:22 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 15:18:22 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 15:18:22 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 15:18:22 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 15:18:22 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 15:18:22 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 15:18:22 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 15:18:24 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 15:18:24 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 15:18:24 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 15:18:24 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 15:18:24 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 15:18:24 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 15:18:24 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 15:18:26 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 15:18:26 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 15:18:26 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 15:18:26 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 15:18:26 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 15:18:26 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 15:18:26 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 15:18:27 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 15:18:27 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 15:18:27 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 15:18:27 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 15:18:27 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 15:18:27 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 15:18:27 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 15:18:28 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 15:18:28 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 15:18:28 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 15:18:28 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 15:18:28 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 15:18:28 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 15:18:28 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 15:18:29 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 15:18:29 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 15:18:29 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 15:18:29 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 15:18:29 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 15:18:29 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 15:18:29 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 15:18:30 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 15:18:30 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 15:18:30 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 15:18:30 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 15:18:30 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 15:18:30 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 15:18:30 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 15:18:31 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 15:18:31 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 15:18:31 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 15:18:31 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 15:18:31 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 15:18:31 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 15:18:31 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 15:18:32 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 15:18:32 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 15:18:32 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 15:18:32 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 15:18:32 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 15:18:32 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 15:18:32 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 15:18:32 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 15:18:32 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 15:18:32 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 15:18:32 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 15:18:32 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 15:18:32 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 15:18:32 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 15:18:33 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 15:18:33 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 15:18:33 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 15:18:33 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 15:18:33 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 15:18:33 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 15:18:33 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 15:18:34 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 15:18:34 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 15:18:34 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 15:18:34 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 15:18:34 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 15:18:34 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 15:18:34 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 15:18:34 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 389
ERROR - 2019-02-21 15:18:34 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 391
ERROR - 2019-02-21 15:18:34 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 392
ERROR - 2019-02-21 15:18:34 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 393
ERROR - 2019-02-21 15:18:34 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 394
ERROR - 2019-02-21 15:18:34 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 395
ERROR - 2019-02-21 15:18:34 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 397
ERROR - 2019-02-21 15:25:53 --> Severity: Notice --> Undefined variable: ledger_type /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/transaction/sales_entry.php 154
ERROR - 2019-02-21 15:26:10 --> Severity: Notice --> Undefined variable: ledger_type /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/transaction/sales_entry.php 154
ERROR - 2019-02-21 17:25:21 --> Severity: Notice --> Undefined variable: ledger_type /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/transaction/sales_entry.php 154
ERROR - 2019-02-21 17:25:24 --> Severity: Notice --> Undefined variable: ledger_type /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/transaction/sales_entry.php 154
ERROR - 2019-02-21 17:37:20 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/maintenance/customers.php 331
ERROR - 2019-02-21 17:39:10 --> 404 Page Not Found: /index
ERROR - 2019-02-21 17:39:15 --> 404 Page Not Found: /index
ERROR - 2019-02-21 17:39:36 --> 404 Page Not Found: /index
ERROR - 2019-02-21 17:39:38 --> 404 Page Not Found: /index
ERROR - 2019-02-21 17:40:07 --> Severity: Notice --> Undefined variable: ledger_type /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/transaction/sales_entry.php 154
ERROR - 2019-02-21 17:40:21 --> 404 Page Not Found: /index
ERROR - 2019-02-21 17:40:21 --> Severity: Notice --> Undefined variable: sharerelease /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/share/sharesettings/share_value.php 320
ERROR - 2019-02-21 17:40:22 --> 404 Page Not Found: /index
ERROR - 2019-02-21 17:40:58 --> Severity: Notice --> Undefined variable: ledger_type /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/transaction/sales_entry.php 154
ERROR - 2019-02-21 17:41:46 --> Severity: Notice --> Undefined variable: sharerelease /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/share/sharesettings/share_value.php 320
ERROR - 2019-02-21 17:41:47 --> 404 Page Not Found: /index
ERROR - 2019-02-21 17:42:23 --> Severity: Notice --> Undefined variable: ledger_type /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/transaction/sales_entry.php 154
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 51
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 51
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:44:32 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 51
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 51
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:44:36 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:45:14 --> 404 Page Not Found: /index
ERROR - 2019-02-21 17:46:29 --> Severity: Notice --> Undefined variable: json /home/easzapps/public_html/UAT/fpo/application/modules/fpo/controllers/Finance.php 1571
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 51
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 51
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:49:20 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 51
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 51
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:49:31 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 17:49:52 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:49:52 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:49:52 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 17:49:52 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:49:52 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:51:33 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:51:33 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:51:33 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 17:51:33 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:51:33 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:53:03 --> Query error: Unknown column 'fpo_gl_trans.amount.person_id' in 'field list' - Invalid query: SELECT trv_chart_master.account_name, trv_chart_master.account_code, trv_chart_master.has_child, SUM(fpo_gl_trans.amount) As amount, fpo_gl_trans.person_type_id, fpo_gl_trans.amount.person_id from fpo_gl_trans INNER JOIN trv_chart_master on trv_chart_master.account_code = fpo_gl_trans.account_code WHERE trv_chart_master.account_code2 = '402' AND fpo_gl_trans.fpo_id='32900102' AND fpo_gl_trans.status=1 AND fpo_gl_trans.type_no=0 AND fpo_gl_trans.tran_date >= '2018-04-01' AND fpo_gl_trans.tran_date <= '2019-02-21' GROUP BY fpo_gl_trans.person_id
ERROR - 2019-02-21 17:53:11 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:53:11 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:53:11 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 17:53:11 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:53:11 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:53:13 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:53:13 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:53:13 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 17:53:13 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:53:13 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:53:28 --> Query error: Unknown column 'fpo_gl_trans.amount.person_id' in 'field list' - Invalid query: SELECT trv_chart_master.account_name, trv_chart_master.account_code, trv_chart_master.has_child, SUM(fpo_gl_trans.amount) As amount, fpo_gl_trans.person_type_id, fpo_gl_trans.amount.person_id from fpo_gl_trans INNER JOIN trv_chart_master on trv_chart_master.account_code = fpo_gl_trans.account_code WHERE trv_chart_master.account_code2 = '402' AND fpo_gl_trans.fpo_id='32900102' AND fpo_gl_trans.status=1 AND fpo_gl_trans.type_no=0 AND fpo_gl_trans.tran_date >= '2018-04-01' AND fpo_gl_trans.tran_date <= '2019-02-21' GROUP BY fpo_gl_trans.person_id
ERROR - 2019-02-21 17:54:43 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:54:43 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:54:43 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 17:54:43 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:54:43 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:56:28 --> Query error: Unknown column 'share_applied' in 'field list' - Invalid query: INSERT INTO `trv_share_allotment` (`allotment_nature`, `resolution_number`, `resolution_date`, `member_type`, `holder_id`, `folio_number`, `share_applied`, `share_allotted`, `created_by`, `created_on`) VALUES (1, '', '', '2', '9', '0015', '100', '100', '', '2019-02-21 17:56:28')
ERROR - 2019-02-21 17:59:27 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:59:27 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 17:59:27 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 17:59:27 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 17:59:27 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:02:32 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:02:32 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:02:32 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 18:02:32 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:02:32 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:03:38 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:03:38 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:03:38 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 18:03:38 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:03:38 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:03:52 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:03:52 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:03:52 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 18:03:52 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:03:52 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:04:03 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:04:03 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:04:03 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 18:04:03 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:04:03 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:04:14 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:04:14 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:04:14 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 18:04:14 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:04:14 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:12:44 --> 404 Page Not Found: /index
ERROR - 2019-02-21 18:16:58 --> Severity: Notice --> Undefined variable: supplier /home/easzapps/public_html/UAT/fpo/application/models/Supplier_Model.php 1376
ERROR - 2019-02-21 18:18:29 --> Query error: Unknown column 'trv_village_master.panchayat_id' in 'field list' - Invalid query: SELECT `trv_village_master`.`id`, `trv_village_master`.`panchayat_id`, `trv_village_master`.`name`, `trv_village_master`.`pincode`, `trv_village_master`.`status`
FROM `trv_village_master`
WHERE `pincode` = 636906
AND `status` = '1'
ORDER BY `id` DESC
ERROR - 2019-02-21 18:21:17 --> Query error: Unknown column 'trv_village_master.panchayat_id' in 'field list' - Invalid query: SELECT `trv_village_master`.`id`, `trv_village_master`.`panchayat_id`, `trv_village_master`.`name`, `trv_village_master`.`pincode`, `trv_village_master`.`status`
FROM `trv_village_master`
WHERE `pincode` = 636906
AND `status` = '1'
ORDER BY `id` DESC
ERROR - 2019-02-21 18:21:53 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 396
ERROR - 2019-02-21 18:21:53 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 398
ERROR - 2019-02-21 18:21:53 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 399
ERROR - 2019-02-21 18:21:53 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 400
ERROR - 2019-02-21 18:21:53 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 401
ERROR - 2019-02-21 18:21:53 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 402
ERROR - 2019-02-21 18:21:53 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 404
ERROR - 2019-02-21 18:25:08 --> Query error: Unknown column 'trv_village_master.panchayat_id' in 'field list' - Invalid query: SELECT `trv_village_master`.`id`, `trv_village_master`.`panchayat_id`, `trv_village_master`.`name`, `trv_village_master`.`pincode`, `trv_village_master`.`status`
FROM `trv_village_master`
WHERE `pincode` = 636906
AND `status` = '1'
ORDER BY `id` DESC
ERROR - 2019-02-21 18:25:18 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 396
ERROR - 2019-02-21 18:25:18 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 398
ERROR - 2019-02-21 18:25:18 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 399
ERROR - 2019-02-21 18:25:18 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 400
ERROR - 2019-02-21 18:25:18 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 401
ERROR - 2019-02-21 18:25:18 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 402
ERROR - 2019-02-21 18:25:18 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 404
ERROR - 2019-02-21 18:25:19 --> 404 Page Not Found: /index
ERROR - 2019-02-21 18:27:16 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:27:16 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:27:16 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 18:27:16 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:27:16 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:27:56 --> 404 Page Not Found: /index
ERROR - 2019-02-21 18:28:09 --> Query error: Unknown column 'trv_village_master.panchayat_id' in 'field list' - Invalid query: SELECT `trv_village_master`.`id`, `trv_village_master`.`panchayat_id`, `trv_village_master`.`name`, `trv_village_master`.`pincode`, `trv_village_master`.`status`
FROM `trv_village_master`
WHERE `pincode` = 636906
AND `status` = '1'
ORDER BY `id` DESC
ERROR - 2019-02-21 18:28:29 --> Severity: Notice --> Undefined variable: gldata /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/glreports.php 81
ERROR - 2019-02-21 18:28:49 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 396
ERROR - 2019-02-21 18:28:49 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 398
ERROR - 2019-02-21 18:28:49 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 399
ERROR - 2019-02-21 18:28:49 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 400
ERROR - 2019-02-21 18:28:49 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 401
ERROR - 2019-02-21 18:28:49 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 402
ERROR - 2019-02-21 18:28:49 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 404
ERROR - 2019-02-21 18:30:25 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:30:25 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:30:25 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 18:30:25 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:30:25 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:32:40 --> Query error: Unknown column 'trv_village_master.panchayat_id' in 'field list' - Invalid query: SELECT `trv_village_master`.`id`, `trv_village_master`.`panchayat_id`, `trv_village_master`.`name`, `trv_village_master`.`pincode`, `trv_village_master`.`status`
FROM `trv_village_master`
WHERE `pincode` = 636906
AND `status` = '1'
ORDER BY `id` DESC
ERROR - 2019-02-21 18:33:02 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 398
ERROR - 2019-02-21 18:33:02 --> Severity: Warning --> Illegal string offset 'land_holding_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 400
ERROR - 2019-02-21 18:33:02 --> Severity: Warning --> Illegal string offset 'farmer_id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 401
ERROR - 2019-02-21 18:33:02 --> Severity: Warning --> Illegal string offset 'land_type' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 402
ERROR - 2019-02-21 18:33:02 --> Severity: Warning --> Illegal string offset 'land_identification' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 403
ERROR - 2019-02-21 18:33:02 --> Severity: Warning --> Illegal string offset 'latlng' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 404
ERROR - 2019-02-21 18:33:02 --> Severity: Warning --> Illegal string offset 'id' /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 406
ERROR - 2019-02-21 18:33:27 --> 404 Page Not Found: ../modules/api/controllers/Crop/post_harvest_list
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 51
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 51
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:33:42 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 51
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 51
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 52
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 53
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Undefined offset: 0 /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 54
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:33:59 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 18:36:31 --> Severity: Notice --> Undefined index: id /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 398
ERROR - 2019-02-21 18:36:31 --> Severity: Notice --> Undefined index: id /home/easzapps/public_html/UAT/fpo/application/modules/api/models/API_Model.php 398
ERROR - 2019-02-21 18:39:22 --> Query error: Unknown column 'trv_village_master.panchayat_id' in 'field list' - Invalid query: SELECT `trv_village_master`.`id`, `trv_village_master`.`panchayat_id`, `trv_village_master`.`name`, `trv_village_master`.`pincode`, `trv_village_master`.`status`
FROM `trv_village_master`
WHERE `pincode` = 636906
AND `status` = '1'
ORDER BY `id` DESC
ERROR - 2019-02-21 18:39:34 --> Query error: Unknown column 'trv_village_master.panchayat_id' in 'field list' - Invalid query: SELECT `trv_village_master`.`id`, `trv_village_master`.`panchayat_id`, `trv_village_master`.`name`, `trv_village_master`.`pincode`, `trv_village_master`.`status`
FROM `trv_village_master`
WHERE `pincode` = 636701
AND `status` = '1'
ORDER BY `id` DESC
ERROR - 2019-02-21 18:39:43 --> Query error: Unknown column 'trv_village_master.panchayat_id' in 'field list' - Invalid query: SELECT `trv_village_master`.`id`, `trv_village_master`.`panchayat_id`, `trv_village_master`.`name`, `trv_village_master`.`pincode`, `trv_village_master`.`status`
FROM `trv_village_master`
WHERE `pincode` = 636701
AND `status` = '1'
ORDER BY `id` DESC
ERROR - 2019-02-21 18:40:19 --> Query error: Unknown column 'trv_village_master.panchayat_id' in 'field list' - Invalid query: SELECT `trv_village_master`.`id`, `trv_village_master`.`panchayat_id`, `trv_village_master`.`name`, `trv_village_master`.`pincode`, `trv_village_master`.`status`
FROM `trv_village_master`
WHERE `pincode` = 636701
AND `status` = '1'
ORDER BY `id` DESC
ERROR - 2019-02-21 18:40:32 --> Query error: Unknown column 'trv_village_master.panchayat_id' in 'field list' - Invalid query: SELECT `trv_village_master`.`id`, `trv_village_master`.`panchayat_id`, `trv_village_master`.`name`, `trv_village_master`.`pincode`, `trv_village_master`.`status`
FROM `trv_village_master`
WHERE `pincode` = 636701
AND `status` = '1'
ORDER BY `id` DESC
ERROR - 2019-02-21 18:41:39 --> Query error: Unknown column 'trv_village_master.panchayat_id' in 'field list' - Invalid query: SELECT `trv_village_master`.`id`, `trv_village_master`.`panchayat_id`, `trv_village_master`.`name`, `trv_village_master`.`pincode`, `trv_village_master`.`status`
FROM `trv_village_master`
WHERE `pincode` = 636701
AND `status` = '1'
ORDER BY `id` DESC
ERROR - 2019-02-21 18:49:54 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:50:09 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:50:10 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:50:22 --> Severity: Notice --> Undefined index: variety_id /home/easzapps/public_html/UAT/fpo/application/modules/api/controllers/Crop.php 54
ERROR - 2019-02-21 18:51:21 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:51:23 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:51:25 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:51:45 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:52:17 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:54:43 --> Severity: Notice --> Undefined index: variety_id /home/easzapps/public_html/UAT/fpo/application/modules/api/controllers/Crop.php 54
ERROR - 2019-02-21 18:54:45 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:55:44 --> Severity: Notice --> Undefined index: variety_id /home/easzapps/public_html/UAT/fpo/application/modules/api/controllers/Crop.php 54
ERROR - 2019-02-21 18:56:29 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:57:09 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:58:14 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:58:17 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:58:20 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:58:28 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:58:30 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:58:39 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 18:58:42 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 19:01:12 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 19:01:14 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 19:01:17 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 19:02:00 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 19:03:17 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 19:03:34 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting ',' or ';' /home/easzapps/public_html/UAT/fpo/application/models/Fpo_Model.php 140
ERROR - 2019-02-21 19:04:02 --> Severity: error --> Exception: Unable to locate the model you have specified: Fpo_Model /home/easzapps/public_html/UAT/fpo/system/core/Loader.php 348
ERROR - 2019-02-21 19:04:52 --> Severity: error --> Exception: Unable to locate the model you have specified: Fpo_Model /home/easzapps/public_html/UAT/fpo/system/core/Loader.php 348
ERROR - 2019-02-21 19:04:54 --> Severity: error --> Exception: Unable to locate the model you have specified: Fpo_Model /home/easzapps/public_html/UAT/fpo/system/core/Loader.php 348
ERROR - 2019-02-21 19:04:56 --> Severity: error --> Exception: Unable to locate the model you have specified: Fpo_Model /home/easzapps/public_html/UAT/fpo/system/core/Loader.php 348
ERROR - 2019-02-21 19:05:23 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:05:23 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:05:23 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:05:23 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:05:23 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:08:47 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:08:47 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:08:47 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:08:47 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:08:47 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:31:51 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:31:51 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:31:51 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:31:51 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:31:51 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:32:09 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:32:09 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:32:09 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:32:09 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:32:09 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:32:17 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:32:17 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:32:17 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:32:17 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:32:17 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:32:25 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:32:25 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:32:25 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:32:25 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:32:25 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:35:17 --> Severity: Notice --> Undefined variable: gldata /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/glreports.php 81
ERROR - 2019-02-21 19:40:22 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:40:22 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:40:22 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:40:22 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:40:22 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:42:17 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:42:17 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:42:17 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:42:17 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:42:17 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:42:32 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:42:32 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:42:32 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:42:32 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:42:32 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:44:01 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:44:01 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:44:01 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:44:01 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:44:01 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:44:16 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:44:16 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:44:16 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:44:16 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:44:16 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:45:17 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:45:17 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:45:17 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:45:17 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:45:17 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:45:19 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:45:19 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:45:19 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:45:19 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:45:19 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:48:18 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/models/Supplier_Model.php 1064
ERROR - 2019-02-21 19:48:18 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/models/Supplier_Model.php 1065
ERROR - 2019-02-21 19:48:18 --> Query error: Column 'gl_code' cannot be null - Invalid query: INSERT INTO `fpo_supp_invoice_items` (`supp_trans_no`, `supp_trans_type`, `gl_code`, `grn_item_id`, `po_detail_item_id`, `stock_id`, `description`, `quantity`, `uom`, `unit_price`, `e_qty`, `e_uom`, `discount`, `memo_`) VALUES (4, 20, NULL, 4, 4, '7', 'K-7', '100', '11', '25', '', NULL, '', '')
ERROR - 2019-02-21 19:49:42 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/models/Supplier_Model.php 1292
ERROR - 2019-02-21 19:49:52 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:49:52 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:49:52 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:49:52 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:49:52 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:50:08 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/maintenance/customers.php 331
ERROR - 2019-02-21 19:50:35 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/market/sales/maintenance/customers.php 331
ERROR - 2019-02-21 19:50:56 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/models/Customer_Model.php 924
ERROR - 2019-02-21 19:51:04 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:51:04 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:51:04 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:51:04 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:51:04 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:52:06 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:52:06 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 19:52:06 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 19:52:06 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 19:52:06 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 20:15:49 --> 404 Page Not Found: /index
ERROR - 2019-02-21 20:15:51 --> 404 Page Not Found: /index
ERROR - 2019-02-21 20:15:53 --> 404 Page Not Found: /index
ERROR - 2019-02-21 20:16:13 --> 404 Page Not Found: /index
ERROR - 2019-02-21 20:16:16 --> 404 Page Not Found: /index
ERROR - 2019-02-21 20:16:46 --> 404 Page Not Found: /index
ERROR - 2019-02-21 20:16:48 --> 404 Page Not Found: /index
ERROR - 2019-02-21 20:16:50 --> 404 Page Not Found: /index
ERROR - 2019-02-21 20:16:52 --> 404 Page Not Found: /index
ERROR - 2019-02-21 20:16:54 --> 404 Page Not Found: /index
ERROR - 2019-02-21 20:16:57 --> 404 Page Not Found: /index
ERROR - 2019-02-21 20:17:04 --> 404 Page Not Found: /index
ERROR - 2019-02-21 20:17:07 --> 404 Page Not Found: /index
ERROR - 2019-02-21 20:25:00 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 20:25:00 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 20:25:00 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 20:25:00 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 20:25:00 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 20:42:22 --> Severity: Parsing Error --> syntax error, unexpected ';' /home/easzapps/public_html/UAT/fpo/application/models/Finance_Model.php 589
ERROR - 2019-02-21 21:08:21 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 21:08:21 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 21:08:21 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 21:08:21 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 21:08:21 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 21:24:57 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 21:24:57 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 21:24:57 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 21:24:57 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 21:24:57 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 21:33:53 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/models/Supplier_Model.php 1292
ERROR - 2019-02-21 21:35:20 --> Severity: Notice --> Undefined variable: addfpo /home/easzapps/public_html/UAT/fpo/application/models/Share_Model.php 1270
ERROR - 2019-02-21 21:35:52 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 21:35:52 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 21:35:52 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 21:35:52 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 21:35:52 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 21:36:38 --> Severity: Notice --> Trying to get property of non-object /home/easzapps/public_html/UAT/fpo/application/models/Customer_Model.php 924
ERROR - 2019-02-21 21:39:20 --> The upload path does not appear to be valid.
ERROR - 2019-02-21 21:39:43 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 71
ERROR - 2019-02-21 21:42:21 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 21:42:21 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 21:42:21 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 21:42:21 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 21:42:21 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 21:43:51 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 71
ERROR - 2019-02-21 21:45:05 --> Query error: Column 'variety_id' cannot be null - Invalid query: INSERT INTO `trv_crop` (`crop_type`, `variety_id`, `crop_id`, `category_id`, `subcategory_id`, `class_id`, `season_id`, `is_direct_seeding`, `transplant_date`, `area`, `area_uom`, `seed_qty`, `quantity_uom`, `seed_cost`, `expected_harvest_date`, `farmer_id`, `land_id`, `status`, `updated_on`, `updated_by`) VALUES ('1', NULL, NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', '', NULL, 1, '2019-02-21 21:45:05', '')
ERROR - 2019-02-21 21:45:15 --> Severity: Notice --> Undefined variable: supplier /home/easzapps/public_html/UAT/fpo/application/models/Supplier_Model.php 1376
ERROR - 2019-02-21 21:45:39 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 71
ERROR - 2019-02-21 21:45:44 --> The upload path does not appear to be valid.
ERROR - 2019-02-21 21:45:47 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 71
ERROR - 2019-02-21 21:45:54 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 71
ERROR - 2019-02-21 21:46:01 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/viewcrop.php 63
ERROR - 2019-02-21 21:46:02 --> 404 Page Not Found: /index
ERROR - 2019-02-21 21:46:07 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/viewcrop.php 63
ERROR - 2019-02-21 21:46:08 --> 404 Page Not Found: /index
ERROR - 2019-02-21 21:48:32 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/viewcrop.php 63
ERROR - 2019-02-21 21:48:41 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/viewcrop.php 63
ERROR - 2019-02-21 21:49:01 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 71
ERROR - 2019-02-21 21:50:08 --> Severity: Notice --> Undefined variable: supplier /home/easzapps/public_html/UAT/fpo/application/models/Supplier_Model.php 1376
ERROR - 2019-02-21 21:53:21 --> The upload path does not appear to be valid.
ERROR - 2019-02-21 21:53:29 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 71
ERROR - 2019-02-21 21:53:50 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 71
ERROR - 2019-02-21 21:53:55 --> Severity: Notice --> Undefined variable: land /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/crop/editcrop.php 71
ERROR - 2019-02-21 21:53:58 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 21:53:58 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 21:53:58 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 130
ERROR - 2019-02-21 21:53:58 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 21:53:58 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 169
ERROR - 2019-02-21 21:58:36 --> 404 Page Not Found: /index
ERROR - 2019-02-21 22:06:31 --> Severity: error --> Exception: /home/easzapps/public_html/UAT/fpo/application/models/Crop_Model.php exists, but doesn't declare class Crop_Model /home/easzapps/public_html/UAT/fpo/system/core/Loader.php 340
ERROR - 2019-02-21 22:11:42 --> 404 Page Not Found: /index
ERROR - 2019-02-21 22:37:54 --> 404 Page Not Found: /index
ERROR - 2019-02-21 22:42:04 --> 404 Page Not Found: /index
ERROR - 2019-02-21 22:44:12 --> 404 Page Not Found: /index
ERROR - 2019-02-21 22:44:36 --> 404 Page Not Found: /index
ERROR - 2019-02-21 23:53:13 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 23:53:13 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 23:53:13 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 163
ERROR - 2019-02-21 23:53:13 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 163
ERROR - 2019-02-21 23:53:13 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 172
ERROR - 2019-02-21 23:58:33 --> Severity: Notice --> Undefined variable: gldata /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/glreports.php 84
ERROR - 2019-02-21 23:58:39 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 23:58:39 --> Severity: Notice --> Undefined variable: liablityCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 118
ERROR - 2019-02-21 23:58:39 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 163
ERROR - 2019-02-21 23:58:39 --> Severity: Notice --> Undefined variable: assetCost /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 163
ERROR - 2019-02-21 23:58:39 --> Severity: Notice --> Undefined variable: ledgerBalance /home/easzapps/public_html/UAT/fpo/application/modules/fpo/views/finance/banking/inquiries_reports/balance_sheet_drilldown.php 172
