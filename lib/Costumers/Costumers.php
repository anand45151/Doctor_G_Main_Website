<?php
class Costumers
{
    public function __construct()
    {
    }

    public function __destruct()
    {
    }
    
    public function setOrderingValues()
    {
        $ordering = [
            'id' => 'ID',
            'f_name' => 'First Name',
            'l_name' => 'Last Name',
            'gender' => 'Gender',
            'phone' => 'Phone',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at'
        ];

        return $ordering;
    }
}
?>
