<?php

use Knjiznica\Model\Knjige;

class KnjigeController {

    const PUTANJA_VIEW = 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\knjiznica\\src\\views\\knjige\\index.html';

    public function __construct()
    {
        $this->knjigeModel = new Knjige();
    }

    public function prikaziView()
    {
        include_once self::PUTANJA_VIEW;
    }

    public function vratiJson()
    {
        $rezultat = $this->knjigeModel->dohvatiSveKnjige();
        
        $rezultati = [];
        foreach($rezultat as $key => $item) {
            if (is_array($item)) {
                $temp = [];
                foreach($item as $val) {
                    $temp[] = utf8_encode($val);  
                }
                $rezultati[$key] = $temp;
            }
        }
        
        echo json_encode($rezultati);

        die;
    }
}
