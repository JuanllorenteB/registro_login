<?php 

class clsticket extends clsconexion {

    public $conn;
    public $data;

    public function __construct(){
        $objconexion = new clsconexion("localhost","root","","base_datos_aerolinea");
        $this->conn = $objconexion->conn;}

 
    public function fntmostrarticket() {

        $query = $this->conn -> prepare ("SELECT r.id_reservas, s.vuelos_salida, d.vuelos_destinos, p.precio, r.nombre_cliente, r.vuelo_salida, r.vuelo_regreso, r.correos,  t.id_estado
        FROM `tbl_reservas` as r
        JOIN tbl_vuelo as v ON r.id_vuelo = v.id_vuelo
        JOIN tbl_salida as s ON v.id_salida = s.id_salida
        JOIN tbl_destino as d ON v.id_destino = d.id_destino
        JOIN tbl_precio as p ON v.id_precio = p.id_precio
        JOIN tbl_ticket as t ON t.id_reservas = r.id_reservas
        WHERE r.correos = :correo");
        $query->bindParam(':correo', $_SESSION['correo']);
        $query->execute();
        $this-> data = $query->fetchAll();

    }
}


?>