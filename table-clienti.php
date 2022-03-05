<?php

class Table {

    public function __construct ($name){  
      $this->data = null;
    }

    public function setData($data) {
      $this->data = $data;
    }

    function getCountColumns(){
      return (int) mysqli_num_fields($this->data);
    }

    function getCountRows(){
      return (int) mysqli_num_rows($this->data);
    }

    function render(){
      $columnsCount = $this->getCountColumns();
      $tableData = $this->data;
      $fields =  mysqli_fetch_fields($tableData);
      echo "<table class='table table-hover'>";
        echo "<thead>";
          echo "<tr>";
            foreach ($fields as $field) {
              echo "<th>";
                echo $field->name ;
              echo "</th>\n";
            }
          echo "</tr>\n";
        echo "</thead>\n";
        echo "<tbody>\n";
          while ($row = mysqli_fetch_array($tableData)) {
            echo "<tr>";
            for ($x=0; $x < $columnsCount; $x++) { 
              echo "<td >" . $row[$x] . "</td>\n";
            }
            echo "</tr>\n";
          }
        echo "</tbody>";
      echo "</table>";
    }

}
?>