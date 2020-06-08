<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-08-27 04:04:19 --> 404 Page Not Found: /index
ERROR - 2019-08-27 04:54:12 --> 404 Page Not Found: /index
ERROR - 2019-08-27 06:48:21 --> Query error: Expression #1 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.fpo_gl_trans.tran_date' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT MONTHNAME(fpo_gl_trans.tran_date) as month
FROM `fpo_gl_trans`
WHERE `fpo_gl_trans`.`fpo_id` = '32900004'
AND `fpo_gl_trans`.`status` = 1
GROUP BY MONTHNAME(fpo_gl_trans.tran_date)
ORDER BY month(fpo_gl_trans.tran_date) ASC
ERROR - 2019-08-27 06:48:21 --> 404 Page Not Found: /index
ERROR - 2019-08-27 06:50:28 --> 404 Page Not Found: /index
ERROR - 2019-08-27 06:55:30 --> 404 Page Not Found: /index
ERROR - 2019-08-27 07:23:45 --> 404 Page Not Found: /index
