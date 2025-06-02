<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Boneka.class.php");
include("model/TabelBoneka.class.php");

/******************************************
 Asisten Pemrogaman 13 & 14
 ******************************************/

// Interface atau gambaran dari presenter akan seperti apa
interface KontrakPresenter
{
    public function prosesDataBoneka();
    public function prosesDataBonekaById($id);
    public function tambahDataBoneka($data);
    public function ubahDataBoneka($nim, $data);
    public function hapusDataBoneka($nim);
    public function getId($i);
    public function getNim($i);
    public function getNama($i);
    public function getTempat($i);
    public function getTl($i);
    public function getGender($i);
    public function getEmail($i);
    public function getTelp($i);
    public function getSize();
}
