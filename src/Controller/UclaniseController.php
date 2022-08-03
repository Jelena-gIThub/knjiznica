<?php

use Knjiznica\Model\Uclanise;

class UclaniseController {

    const PUTANJA_VIEW = 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\knjiznica\\src\\views\\uclani-se\\index.html';

    public function prikaziView()
    {
        include_once self::PUTANJA_VIEW;
    }

    public function vratiJson($getVrijednosti)
    {
        if ($getVrijednosti && $this->uclaniKorisnika($getVrijednosti)) {
            $status = 'uspjeh';
            $poruka = 'uspješno učlanjenje';
            $id = Uclanise::dohvatiPosljednjiID();
        } else {
            $status = 'neuspjeh';
            $poruka = 'neuspješno učlanjenje';
            $id = null;
        }

        echo json_encode([
            'status' => $status,
            'id' => $id,
            'poruka' => $poruka,
        ]);

        die;
    }

    private function uclaniKorisnika($getVrijednosti)
    {
        try {
            $uclaniKorisnika = new Uclanise();
            $uclaniKorisnika->uclaniNovogKorisnika($getVrijednosti);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
