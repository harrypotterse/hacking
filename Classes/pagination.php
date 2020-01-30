<?php

class paginate_ {

    private $db;

    function __construct($conn) {
        $this->db = $conn;
    }

    public function dataview($query) {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();

        if ($stmt->rowCount($row) > 0) {
            return $row;
        } else {
            
        }
    }

  public  function Number_of_records($Keywords) {

        $Query = "SELECT count(id) AS id FROM job  where Title LIKE ?"
                . "UNION "
                . " SELECT count(id) AS id FROM job  where Company LIKE ?"
                . " UNION"
                . " SELECT count(id) AS id FROM job  where Country LIKE ?"
                . " UNION"
                . " SELECT count(id) AS id FROM job  where City LIKE ?"
                . " UNION "
                . "SELECT count(id) AS id FROM job  where specialty LIKE ?"
                . " UNION"
                . " SELECT count(id) AS id FROM job  where Minimum LIKE ?"
                . " UNION"
                . " SELECT count(id) AS id FROM job  where Maximum LIKE ?"
                . " UNION"
                . " SELECT count(id) AS id FROM job  where Keywords LIKE ?";
        $sth = $this->db->prepare($query);
        $sth->bindValue(1, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(2, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(3, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(4, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(5, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(6, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(7, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(8, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->execute();
        $xssa = $sth->fetchAll();
        $count = array();
        if (count($xssa) > 0) :
            foreach ($xssa as $value):
                $count[] = (int) $id = $value['id'];
            endforeach;
            return $count;
        endif;
    }

    public function paging($query, $data_per_Page, $Keywords) {

        $starting_position = 0;
        $array = array();
        if (isset($_GET["page_no"])) {
            $starting_position = ($_GET["page_no"] - 1) * $data_per_Page;
        }
        $array['SQL'] = $query2 = $query . " limit $starting_position,$data_per_Page";
        $array['Data'] = $all = $this->sql_feth($this->db, $query2, $Keywords);
        return $array;
    }

    public function sql_feth($Data_communication, $query, $Keywords) {
        if (empty($Keywords)):
            $Keywords = " ";
            $sth = $Data_communication->prepare($query);
            $sth->bindValue(1, '%' . $Keywords . '%', PDO::PARAM_STR);
            $sth->bindValue(2, '%' . $Keywords . '%', PDO::PARAM_STR);
            $sth->bindValue(3, '%' . $Keywords . '%', PDO::PARAM_STR);
            $sth->bindValue(4, '%' . $Keywords . '%', PDO::PARAM_STR);
            $sth->bindValue(5, '%' . $Keywords . '%', PDO::PARAM_STR);
            $sth->bindValue(6, '%' . $Keywords . '%', PDO::PARAM_STR);
            $sth->bindValue(7, '%' . $Keywords . '%', PDO::PARAM_STR);
            $sth->bindValue(8, '%' . $Keywords . '%', PDO::PARAM_STR);
            $sth->execute();
            $xssa = $sth->fetchAll();
        endif;
        $sth = $Data_communication->prepare($query);
        $sth->bindValue(1, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(2, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(3, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(4, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(5, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(6, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(7, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(8, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->execute();
        $xssa = $sth->fetchAll();
        return $xssa;
    }

    public function paginglink($query, $data_per_Page, $Keywords) {
        echo ' <ul class="pagination">';
        $self = $_SERVER['PHP_SELF'];
        $query = $this->paging($query, $data_per_Page, $Keywords)['SQL'];
        $sth = $this->db->prepare($query);
        $sth->bindValue(1, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(2, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(3, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(4, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(5, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(6, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(7, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->bindValue(8, '%' . $Keywords . '%', PDO::PARAM_STR);
        $sth->execute();

        $total_no_of_records = $sth->rowCount();

        if ($total_no_of_records > 0) {
?><?php

            echo $whole_count_Of_Pages = ceil($total_no_of_records / $data_per_Page);
            $current_page = 1;
            if (isset($_GET["page_no"])) {
                $current_page = $_GET["page_no"];
            }
//=======================Prev ===First =====  Previous ===================================================
            if ($current_page != 1) {
                $previous = $current_page - 1;
                echo " <li class='active'><a href='" . $self . "?page_no=1'>First</a></li>&nbsp;&nbsp;";
                echo "  <li class='previous'><a href='" . $self . "?page_no=" . $previous . "'><i class='ti-arrow-left'></i>Previous</a></li>&nbsp;&nbsp;";
            }
//======================= === =====  (1 - 2 - 3- 4- 5- 6) ===============================================
            for ($i = 1; $i <= $whole_count_Of_Pages; $i++) {
                if ($i == $current_page) {
                    echo "  <li><a href='" . $self . "?page_no=" . $i . "' >" . $i . "</a></li>&nbsp;&nbsp;";
                } else {
                    echo "<li><a href='" . $self . "?page_no=" . $i . "'>" . $i . "</a></li>&nbsp;&nbsp;";
                }
            }
            //=======================Next=======Last ======================================================
            if ($current_page != $whole_count_Of_Pages) {
                $next = $current_page + 1;
                echo "   <li class='next'><a  href='" . $self . "?page_no=" . $next . "'>Next</a>&nbsp;&nbsp;";
                echo "<li class='next'> <a href='" . $self . "?page_no=" . $whole_count_Of_Pages . "'>Last</a>&nbsp;&nbsp;";
            }
//===========================================================================================
?><?php

        }
        echo ' </ul>';
    }

}
