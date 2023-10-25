<?php

namespace App\Libraries;

use MaxMind\Db\Reader;

class MaxMindDBLibrary
{
    protected $reader;

    public function __construct()
    {
        // Inicializa el lector MaxMind DB con la ubicación del archivo de base de datos.
        $this->reader = new Reader(FCPATH . 'uploads/maxmind-db/GeoLite2-City.mmdb'); 
    }

    /**
     * Realiza una búsqueda de información basada en una dirección IP.
     *
     * @param string $ipAddress La dirección IP para buscar información.
     * @return array|null La información encontrada o null si no se encuentra.
     */
    public function get($ipAddress)
    {
        return $this->reader->get($ipAddress);
    }

    /**
     * Cierra la conexión a la base de datos MaxMind DB.
     */
    public function close()
    {
        $this->reader->close();
    }
}
