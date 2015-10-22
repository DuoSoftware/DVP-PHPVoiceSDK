<?php

/**
 * @author achintha
 * @copyright 2014
 */


$object = new MyClass();
//$aaa=$object->ID('hfhfhfhfhfffhfhfhhf');
//$object->setID('foooo');
//$aaa=$object->getValue();
//print($aaa);




class MyClass {

     private $ID1='assasas';

public function ID( $value)

{

    if( empty( $value ) )

        return $this->ID1;

    else

       $result= $this->ID1 = $value;
        return $result;

}

function getValue()
{
  $aaa=$this->ID('');
  return $aaa  ;
}
}

?>