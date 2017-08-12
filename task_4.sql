
-- 1)
SELECT * FROM `articles` a
LEFT OUTER JOIN `comments` c
on(c.article_id	=	a.id)
WHERE c.id IS NULL

-- 2)
SELECT
         `a`.id,
         `a`.title,
         `c`.comment_times
    FROM `articles` as a
    INNER JOIN (
                  SELECT
                         article_id,
                         COUNT(*) AS comment_times
                  FROM `comments`
                  GROUP BY article_id
               ) AS c
           ON `a`.id = `c`.article_id

    ORDER BY `c`.comment_times DESC

-- 3)
SELECT
 `u`.name,
 COUNT(`c`.id) AS comment_times
FROM
 `users` AS u
 INNER JOIN `comments` AS c ON `u`.id	=	`c`.user_id
GROUP BY
`u`.name
ORDER BY
 COUNT(`c`.id) DESC