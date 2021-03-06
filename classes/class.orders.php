<?php
class Order
{
    public $db;
    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_errno()) {
            echo "Database connection error.";
            exit;
        }
    }

    public function getApprovedOrders($prdid){
      $sql="SELECT
            COALESCE(SUM(prd_qty),0) AS COUNT
            FROM tbl_order
            JOIN tbl_order_list ON tbl_order.order_id = tbl_order_list.order_id
            WHERE order_status = '1' AND prd_id = '$prdid'
            GROUP BY prd_id";
      $result = mysqli_query($this->db,$sql);
      $row = mysqli_fetch_assoc($result);
      $result = $row['COUNT'];
      return $result;
    }

    public function getAllPendingOrders()
    {
        $sql = "SELECT
            tbl_order_list.order_id AS ID,
            SUM(prd_qty * tbl_order_list.prd_price) AS TOTAL,
            order_datestamp AS DATE,
            order_type AS TYPE ,
            cust_id AS CUSTOMER,
            tbl_order_list.prd_qty AS QUANTITY
            FROM tbl_order_list
            INNER JOIN tbl_order ON tbl_order.order_id = tbl_order_list.order_id
            WHERE order_status = '0'
            GROUP BY tbl_order_list.order_id
            ";
        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        $result = mysqli_query($this->db, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list[] = $row;
            }
            if (empty($list)) {
                return false;
            }
            return $list;
        } else {
            return $result;
        }
    }

    public function getAllApprovedDeliveryOrders()
    {
        $sql = "SELECT
            tbl_order_list.order_id AS ID,
            SUM(prd_qty * tbl_order_list.prd_price) AS TOTAL,
            order_datestamp AS DATE,
            order_type AS TYPE ,
            tbl_customer.cust_id AS CUSTOMER_ID,
            tbl_customer.cust_firstname AS CUST_FNAME,
            tbl_customer.cust_lastname AS CUST_LNAME,
            order_status AS STATUS,
            SUM(prd_qty) AS QUANTITY
            FROM tbl_order_list
            INNER JOIN tbl_order ON tbl_order.order_id = tbl_order_list.order_id
            INNER JOIN tbl_product ON tbl_product.prd_id = tbl_order_list.prd_id
            INNER JOIN tbl_customer ON tbl_customer.cust_id = tbl_order.cust_id
            WHERE (order_status = '1' OR order_status = '200' OR order_status = '100')  AND order_type = '1' 
            GROUP BY tbl_order_list.order_id ASC
            ";
        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        $result = mysqli_query($this->db, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list[] = $row;
            }
            if (empty($list)) {
                return false;
            }
            return $list;
        } else {
            return $result;
        }
    }

        public function getAllApprovedDeliveryOrders2()
    {
        $sql = "SELECT
            tbl_order_list.order_id AS ID,
            SUM(prd_qty * tbl_order_list.prd_price) AS TOTAL,
            order_datestamp AS DATE,
            order_type AS TYPE ,
            tbl_customer.cust_id AS CUSTOMER_ID,
            tbl_customer.cust_firstname AS CUST_FNAME,
            tbl_customer.cust_lastname AS CUST_LNAME,
            order_status AS STATUS,
            SUM(prd_qty) AS QUANTITY
            FROM tbl_order_list
            INNER JOIN tbl_order ON tbl_order.order_id = tbl_order_list.order_id
            INNER JOIN tbl_product ON tbl_product.prd_id = tbl_order_list.prd_id
            INNER JOIN tbl_customer ON tbl_customer.cust_id = tbl_order.cust_id
            WHERE order_status = '1' AND order_type = '1' 
            GROUP BY tbl_order_list.order_id ASC
            ";
        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        $result = mysqli_query($this->db, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list[] = $row;
            }
            if (empty($list)) {
                return false;
            }
            return $list;
        } else {
            return $result;
        }
    }

            public function getOnGoingDelivery()
    {
        $sql = "SELECT
            tbl_order_list.order_id AS ID,
            SUM(prd_qty * tbl_order_list.prd_price) AS TOTAL,
            order_datestamp AS DATE,
            order_type AS TYPE ,
            tbl_customer.cust_id AS CUSTOMER_ID,
            tbl_customer.cust_firstname AS CUST_FNAME,
            tbl_customer.cust_lastname AS CUST_LNAME,
            order_status AS STATUS,
            SUM(prd_qty) AS QUANTITY,
            order_address AS ADDRESS
            FROM tbl_order_list
            INNER JOIN tbl_order ON tbl_order.order_id = tbl_order_list.order_id
            INNER JOIN tbl_product ON tbl_product.prd_id = tbl_order_list.prd_id
            INNER JOIN tbl_customer ON tbl_customer.cust_id = tbl_order.cust_id
            WHERE order_status = '200' AND order_type = '1'
            GROUP BY tbl_order_list.order_id ASC 
            limit 1
            ";
        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        $result = mysqli_query($this->db, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list[] = $row;
            }
            if (empty($list)) {
                return false;
            }
            return $list;
        } else {
            return $result;
        }
    }

    public function getAllWalkinOrders()
    {
        $sql = "SELECT
            tbl_order_list.order_id AS ID,
            SUM(prd_qty * tbl_order_list.prd_price) AS TOTAL,
            order_datestamp AS DATE,
            order_type AS TYPE ,
            cust_id AS CUSTOMER,
            receive_datestamp AS RECEIEVE,
            SUM(prd_qty) AS QUANTITY
            FROM tbl_order_list
            INNER JOIN tbl_order ON tbl_order.order_id = tbl_order_list.order_id
            WHERE order_status = '1' AND order_type = '0' AND receive_datestamp != '0000-00-00'
            GROUP BY tbl_order_list.order_id
            ";
        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        $result = mysqli_query($this->db, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list[] = $row;
            }
            if (empty($list)) {
                return false;
            }
            return $list;
        } else {
            return $result;
        }
    }

    public function getSpecOrderList($id){
      $sql = "SELECT
      tbl_order_list.prd_id AS ID,
      tbl_order_list.order_id AS ORDERID,
      prd_name AS NAME,
      tbl_order_list.prd_price AS PRICE,
      SUM(prd_qty) AS QTY,
      SUM(prd_qty * tbl_order_list.prd_price) AS SUBTOTAL,
      prd_level AS LEVEL,
      order_address AS ADDRESS
      FROM tbl_order_list
      INNER JOIN tbl_product ON tbl_order_list.prd_id = tbl_product.prd_id
      JOIN tbl_order ON tbl_order_list.order_id = tbl_order.order_id
      WHERE tbl_order_list.order_id = '$id'
      GROUP BY tbl_product.prd_name";

        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        $result = mysqli_query($this->db, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list[] = $row;
            }
            if (empty($list)) {
                return false;
            }
            return $list;
        } else {
            return $result;
        }
    }

    public function getSpecOrder($id)
    {
        $sql = "SELECT
    cust_id AS CUSTOMER,
    order_type AS TYPE,
    tbl_order_list.order_id AS ID,
    SUM(prd_qty * tbl_order_list.prd_price) AS TOTAL,
    order_datestamp AS DATE,
    prd_qty AS QUANTITY
    FROM tbl_order_list
    INNER JOIN tbl_order ON tbl_order.order_id = tbl_order_list.order_id
    INNER JOIN tbl_product ON tbl_product.prd_id = tbl_order_list.prd_id
    WHERE tbl_order.order_id = '$id'
    GROUP BY tbl_order_list.order_id
  ";

        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        $result = mysqli_query($this->db, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list[] = $row;
            }
            if (empty($list)) {
                return false;
            }
            return $list;
        } else {
            return $result;
        }
    }

    public function updateOrderStatus($id, $stat)
    {
        $sql = "UPDATE tbl_order SET
        order_status = '$stat'
        WHERE order_id = '$id'";
        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        return $result;
    }

    public function declineOrder($id, $msg)
    {
        $msg = mysqli_real_escape_string($this->db,$msg);
        $sql = "UPDATE tbl_order SET
        order_status = '2',
        order_note = '$msg'
        WHERE order_id = '$id'";
        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        return $result;
    }


    public function updateOrderDate($id, $date)
    {
        $sql = "UPDATE tbl_order SET
        receive_datestamp = '$date'
        WHERE order_id = '$id'";
        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        return $result;
    }

    public function getUserId($id)
    {
        $sql = "SELECT cust_id FROM tbl_order WHERE order_id = '$id'";
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_assoc($result);
        $uid = $row['cust_id'];
        return $uid;
    }

    public function completeOrder($id)
    {
        $sql = "UPDATE tbl_order SET
        order_status = '100'
        WHERE order_id = '$id'";
        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        return $result;
    }

    public function startdelivery($id)
    {
        $sql = "UPDATE tbl_order SET
        order_status = '200'
        WHERE order_id = '$id'";
        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        return $result;
    }


    public function getDeliveryCount()
    {
        $sql="SELECT
    COUNT(order_id) AS COUNT
    FROM tbl_order
    WHERE order_type = '1' AND order_status = '1'
    ";
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_assoc($result);
        $result = $row['COUNT'];
        return $result;
    }

    public function getPendingCount()
    {
        $sql="SELECT
    COUNT(order_id) AS COUNT
    FROM tbl_order
    WHERE order_status = '0'
    ";
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_assoc($result);
        $result = $row['COUNT'];
        return $result;
    }

    public function getDeliveryOrders(){
      $sql = "SELECT *
      FROM tbl_order ordr
      INNER JOIN tbl_customer cst ON cst.cust_id = ordr.cust_id
      WHERE receive_datestamp <= NOW() AND
  		ordr.order_type = '1' AND
  		ordr.order_status BETWEEN 1 AND 200
      ORDER BY ordr.order_status ASC
        ";

        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list[] = $row;
            }
            if (empty($list)) {
                return false;
            }
            return $list;
        } else {
            return $result;
        }
    }

    public function getDeliveryOrdersAdmin(){
      $sql = "SELECT *
      FROM tbl_order ordr
      INNER JOIN tbl_customer cst ON cst.cust_id = ordr.cust_id
      WHERE
      ordr.order_type = '1' AND
      ordr.order_status BETWEEN 1 AND 200
      ORDER BY ordr.order_status ASC
        ";

        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list[] = $row;
            }
            if (empty($list)) {
                return false;
            }
            return $list;
        } else {
            return $result;
        }
    }

    public function getSpecDeliveryOrders($id)
    {
        $sql = "SELECT *,COUNT(olst.prd_qty) AS TOTAL,SUM(olst.prd_qty * pd.prd_price) AS TAMOUNT
      FROM tbl_order ordr
      INNER JOIN tbl_customer cst ON cst.cust_id = ordr.cust_id
      INNER JOIN tbl_order_list olst ON ordr.order_id = olst.order_id
      INNER JOIN tbl_product pd ON pd.prd_id = olst.prd_id
      LEFT JOIN tbl_address ad ON ad.cust_id = cst.cust_id
      WHERE ordr.order_id = '$id'
      ORDER BY ordr.order_datestamp DESC
      LIMIT 1
   ";

        $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list[] = $row;
            }
            if (empty($list)) {
                return false;
            }
            return $list;
        } else {
            return $result;
        }
    }
}
