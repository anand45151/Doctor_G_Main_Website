<?php
class Doctors
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
            'Doctor_id' => 'ID',
            'Doctor_Name' => 'Name',
            'Doctor_Specialty' => 'Specialty',
            'Doctor_Location' => 'Location',
        ];

        return $ordering;
    }
}
?>
