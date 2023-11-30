<?php

namespace Froes\Autosignature;

use Dotenv\Dotenv;

class AutoSignature{
    private string $name;
    private string $work;
    private string $email;
    private string $phone;
    private string $pass;
    public function __construct($name, $work, $email, $phone, $pass){
        $this->name = $name;
        $this->work = $work;
        $this->email = $email;
        $this->phone = $phone;
        $this->pass = $pass;
    }

    /**
    * @return array|string
    */
    public function genSignature(): array|string
    {
        //CRIAR FOTO COM FUNDO BRANCO
        $gd = imagecreate(423, 139);
        $colorWhite = imagecolorallocate($gd, 255, 255, 255);
        $colorRed = imagecolorallocate($gd, 255, 0, 0);
        imagefilledrectangle($gd, 0, 0, 423, 139, $colorWhite);

        //CARREGA FONTES
        $font = './fonts/ubuntu.ttf';
        $fontBold = './fonts/ubuntubold.ttf';

        //ESCREVE NA IMAGEM
        imagettftext($gd, 14, 0, 12, 35, $colorRed, $fontBold, $this->name);
        imagettftext($gd, 11, 0, 12, 55, $colorRed, $font, $this->work);
        imagettftext($gd, 11, 0, 12, 90, $colorRed, $font, $this->email);
        imagettftext($gd, 11, 0, 12, 112, $colorRed, $font, $this->phone);
        imagettftext($gd, 11, 0, 12, 133, $colorRed, $font, 'www.clubedeferias.com');
        imageline($gd, 12, 66, 390, 66, $colorRed);

        //SALVA IMAGEM
        $fileName = str_replace(' ', '_', $this->name) . '_' . date('YmdHis') . '_' . rand(1000, 9999);
        if (!file_exists('./images/')) {
            mkdir('./images/', 0777, true);
        }
        imagejpeg($gd, './images/'.$fileName.'.jpeg', 100);
        imagedestroy($gd);

        return $fileName;
    }
}
