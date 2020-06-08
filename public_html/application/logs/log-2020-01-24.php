<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-01-24 04:27:35 --> 404 Page Not Found: /index
ERROR - 2020-01-24 04:27:38 --> 404 Page Not Found: /index
ERROR - 2020-01-24 04:27:40 --> 404 Page Not Found: /index
ERROR - 2020-01-24 04:27:41 --> 404 Page Not Found: /index
ERROR - 2020-01-24 05:08:43 --> Query error: Expression #2 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2019-03-01'
AND `trv_farmer`.`created_on` <= '2020-24-01'
GROUP BY YEAR(trv_farmer.created_on), MONTHNAME(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2020-01-24 05:08:43 --> 404 Page Not Found: /index
ERROR - 2020-01-24 06:04:17 --> 404 Page Not Found: /index
ERROR - 2020-01-24 06:13:36 --> Query error: Expression #2 of ORDER BY clause is not in GROUP BY clause and contains nonaggregated column 'farmbook_prod.trv_farmer.created_on' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT YEAR(trv_farmer.created_on) as year, MONTHNAME(trv_farmer.created_on) as month, SUM(trv_farmer.status) as month_count
FROM `trv_farmer`
WHERE `trv_farmer`.`status` = '1'
AND `trv_farmer`.`created_on` >= '2019-03-01'
AND `trv_farmer`.`created_on` <= '2020-24-01'
GROUP BY YEAR(trv_farmer.created_on), MONTHNAME(trv_farmer.created_on)
ORDER BY YEAR(trv_farmer.created_on) ASC, month(trv_farmer.created_on) ASC
ERROR - 2020-01-24 08:15:19 --> 404 Page Not Found: /index
ERROR - 2020-01-24 08:15:28 --> 404 Page Not Found: /index
ERROR - 2020-01-24 11:00:17 --> 404 Page Not Found: /index
ERROR - 2020-01-24 12:00:03 --> 404 Page Not Found: /index
ERROR - 2020-01-24 15:46:13 --> 404 Page Not Found: /index
ERROR - 2020-01-24 16:10:11 --> 404 Page Not Found: /index
ERROR - 2020-01-24 16:10:12 --> 404 Page Not Found: /index
ERROR - 2020-01-24 16:49:04 --> 404 Page Not Found: /index
ERROR - 2020-01-24 17:34:17 --> 404 Page Not Found: /index
ERROR - 2020-01-24 17:34:19 --> 404 Page Not Found: /index
ERROR - 2020-01-24 19:26:15 --> 404 Page Not Found: /index
ERROR - 2020-01-24 19:26:16 --> 404 Page Not Found: /index
