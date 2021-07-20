<?php 

namespace App\Http\Procedures;
//Nombre de la clase
class DepartamentoProcedure {
//Metodo que llamará a mi procedimiento
    public function getDuplicate($idrecibido)
    {
        return \DB::select('CALL duplicateop($idrecibido)');
    }
}



 ?>