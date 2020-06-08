<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-11 12:06:15 --> 404 Page Not Found: /index
ERROR - 2019-01-11 12:13:41 --> Severity: Error --> Call to undefined method Finance_Model::getAccountBalance() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/controllers/Finance.php 596
ERROR - 2019-01-11 12:14:04 --> Severity: Error --> Call to undefined method Finance_Model::getAccountBalance() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/controllers/Finance.php 596
ERROR - 2019-01-11 12:14:07 --> Severity: Error --> Call to undefined method Finance_Model::getAccountBalance() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/controllers/Finance.php 596
ERROR - 2019-01-11 12:15:15 --> Severity: Error --> Call to undefined method Finance_Model::getAccountBalance() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/controllers/Finance.php 596
ERROR - 2019-01-11 12:15:31 --> Severity: Notice --> Undefined index: payment_to /home/easzapps/public_html/UAT/fpo/application/modules/fpo/models/Finance_Model.php 19
ERROR - 2019-01-11 12:15:31 --> Query error: Column 'type_no' cannot be null - Invalid query: INSERT INTO `fpo_gl_trans` (`fpo_id`, `voucher_no`, `type`, `type_no`, `tran_date`, `account`, `account_code`, `amount`, `person_type_id`, `memo`) VALUES ('32900101', 'trv_PT_6082', 1, NULL, '2019-01-11', '1', '2101', '-12000', 3, '')
ERROR - 2019-01-11 12:16:21 --> Severity: Error --> Call to undefined method Finance_Model::getAccountBalance() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/controllers/Finance.php 596
ERROR - 2019-01-11 12:16:27 --> Severity: Notice --> Undefined index: received_from /home/easzapps/public_html/UAT/fpo/application/modules/fpo/models/Finance_Model.php 39
ERROR - 2019-01-11 12:16:27 --> Query error: Column 'type_no' cannot be null - Invalid query: INSERT INTO `fpo_gl_trans` (`fpo_id`, `voucher_no`, `type`, `type_no`, `tran_date`, `account`, `account_code`, `amount`, `person_type_id`, `memo`) VALUES ('32900101', 'trv_DT_2171', 2, NULL, '2019-01-11', '1', '1101', '12000', 3, '')
ERROR - 2019-01-11 12:31:01 --> 404 Page Not Found: /index
ERROR - 2019-01-11 13:11:01 --> Severity: Error --> Call to undefined method Finance_Model::getAccountBalance() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/controllers/Finance.php 596
ERROR - 2019-01-11 13:11:03 --> 404 Page Not Found: /index
ERROR - 2019-01-11 13:11:06 --> Severity: Error --> Call to undefined method Finance_Model::getAccountBalance() /home/easzapps/public_html/UAT/fpo/application/modules/fpo/controllers/Finance.php 596
ERROR - 2019-01-11 13:39:04 --> Severity: Notice --> Undefined variable: talukInfo /home/easzapps/public_html/UAT/fpo/application/modules/api/controllers/Api.php 145
ERROR - 2019-01-11 13:39:30 --> Severity: Notice --> Undefined variable: talukInfo /home/easzapps/public_html/UAT/fpo/application/modules/api/controllers/Api.php 145
ERROR - 2019-01-11 13:45:16 --> Query error: Unknown column 'trv_taluk_master.district_id' in 'field list' - Invalid query: SELECT `trv_taluk_master`.`id`, `trv_taluk_master`.`district_id`, `trv_taluk_master`.`block_id`, `trv_taluk_master`.`name`
FROM `trv_taluk_master`
WHERE `status` = '1'
AND `trv_taluk_master`.`district_id` IN('2931')
ORDER BY `trv_taluk_master`.`id` DESC
