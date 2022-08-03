<?php

class KontaktController {

    const PUTANJA_VIEW = 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\knjiznica\\src\\views\\kontakt\\index.html';

    public function prikaziView()
    {
        include_once self::PUTANJA_VIEW;
    }

    public function vratiJson($getVrijednosti)
    {
        $poruka = 'E-mail pošiljatelja: ' . $getVrijednosti['email'] . '. Poruka: ' . $getVrijednosti['poruka'];
        $naslovPoruke = 'Poruka od: ' . $getVrijednosti['ime'] . ' ' . $getVrijednosti['prezime'];
        // $adresa = 'jelena.pecikozic@gmail.com';
        $adresa = 'nbatinic@veleri.hr';

        try {
            mail(
                $adresa,
                $naslovPoruke,
                $poruka
            );

            $status = 'uspješno';
            $poruka = 'poruka uspješno poslana';
        } catch (\Exception $e) {
            $status = 'neuspješno';
            $poruka = 'poruka nije poslana';
        }

        echo json_encode([
            'status' => $status,
            'poruka' => $poruka
        ]);

        die;
    }
}
