SELECT (a.totalTat/a.count)
FROM (SELECT COUNT( * ) AS count, MONTH( date_receive ) AS mnth, SUM( tat ) AS totalTat
	FROM disbursement_tbl
	GROUP BY mnth
) AS a
WHERE mnth='4'

SELECT AVG(a.count) AS avg 
FROM ( SELECT count(*) AS count, MONTH(date_receive) as mnth
       FROM disbursement_tbl
       GROUP BY mnth) AS a