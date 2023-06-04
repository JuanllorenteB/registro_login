<?php 

class clsreserva extends clsconexion {

    public $conn;
    public $data;

    public function __construct(){
        $objconexion = new clsconexion("localhost","root","","base_datos_aerolinea");
        $this->conn = $objconexion->conn;}


    public function fntmostrarreserva() {

        $query = $this->conn -> prepare ("SELECT r.id_reservas, s.vuelos_salida, d.vuelos_destinos, p.precio, r.nombre_cliente, r.vuelo_salida,r.vuelo_regreso,r.correos 
        FROM tbl_reservas AS r
        INNER JOIN tbl_vuelo AS v ON r.id_vuelo = v.id_vuelo
        INNER JOIN tbl_salida AS s ON v.id_salida = s.id_salida
        INNER JOIN tbl_destino AS d ON v.id_destino = d.id_destino
        INNER JOIN tbl_precio AS p ON v.id_precio = p.id_precio
        WHERE r.correos = :correo");
        $query->bindParam(':correo', $_SESSION['correo']);
        $query->execute();
        $this->data = $query->fetchAll();
}
}


?>