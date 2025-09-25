<?php
class Form {
    var $fields = array();
    var $action;
    var $submit = "";
    var $jumField = 0;

    function __construct($action, $submit){
        $this->action = $action;
        $this->submit = $submit;
    }

    function displayForm(){
        echo "<form action='".$this->action."' method='post'>";
        echo "<table width='100%' cellpadding='5' cellspacing='0' border='0'>";
        for($i=0;$i<$this->jumField;$i++)
        {
            echo "<tr>
                    <td align='right' valign='top'>".$this->fields[$i]['label']."</td>
                    <td>".$this->fields[$i]['field']."</td>
                  </tr>";
        }
        echo "<tr><td></td>
                <td><input type='submit' name='tombol' value='".$this->submit."' class='btn'></td>
              </tr>";
        echo "</table>";
        echo "</form>";
    }

    function addText($name, $label){
        $field = "<input type='text' name='".$name."' required>";
        $this->addField($name, $label, $field);
    }

    function addRadio($name, $label, $options = array()){
        $field = "";
        foreach($options as $value => $caption){
            $field .= "<label><input type='radio' name='".$name."' value='".$value."'> ".$caption."</label> ";
        }
        $this->addField($name, $label, $field);
    }

    function addCheckbox($name, $label, $options = array()){
        $field = "";
        foreach($options as $value => $caption){
            $field .= "<label><input type='checkbox' name='".$name."[]' value='".$value."'> ".$caption."</label> ";
        }
        $this->addField($name, $label, $field);
    }

    function addSelect($name, $label, $options = array()){
        $field = "<select name='".$name."'>";
        foreach($options as $value => $caption){
            $field .= "<option value='".$value."'>".$caption."</option>";
        }
        $field .= "</select>";
        $this->addField($name, $label, $field);
    }

    function addTextarea($name, $label, $rows = 4, $cols = 30){
        $field = "<textarea name='".$name."' rows='".$rows."' cols='".$cols."'></textarea>";
        $this->addField($name, $label, $field);
    }

    private function addField($name, $label, $field){
        $this->fields[$this->jumField]['name']  = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['field'] = $field;
        $this->jumField++;
    }
}
?>
