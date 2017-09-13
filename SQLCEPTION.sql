SET @row_number = 0;

SELECT *
	FROM(
		SELECT
		(@row_number:=@row_number + 1) AS ROW_NUM,
		prd_id AS ID,
		prd_name AS NAME,
		prd_desc AS PDESC,
		prd_level AS LMAX,
		cat_name AS CATEGORY
		FROM tbl_product 
		INNER JOIN tbl_category ON tbl_product.cat_id = tbl_category.cat_id

	) 
tb_page
ORDER BY ROW_NUM
LIMIT 5 OFFSET 0
