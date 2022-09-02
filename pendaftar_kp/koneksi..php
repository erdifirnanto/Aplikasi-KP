<?php
class koneksi
{
    public $host       = "localhost";
    private $user       = "root";
    protected $pass       = "";
    var $db         = "matrikulasi";
    function __construct()
    {
        $konek    = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$konek) { //cek koneksi
            die("Tidak bisa terkoneksi ke database");
        } 
    }
}
$$koneksi = new koneksi();