<?php

namespace Knjiznica\Model;

class Uclanise {

    public function uclaniNovogKorisnika($getVrijednosti)
    {
        $konekcija = BazaPodatakaSpajanje::spajanjeNaBazuPodataka();

        if ($konekcija) {
            $datumObjekt = new \DateTime();
            $datum = $datumObjekt->format('Y-m-d');

            $sql = "
                INSERT INTO Clanovi (ime, prezime, adresa, email, broj_telefona, datum_uclanjenja)
                VALUES ('" . $getVrijednosti['ime'] . "','" . $getVrijednosti['prezime'] . "','" .
                $getVrijednosti['adresa'] . "','" . $getVrijednosti['email'] . "','" .
                $getVrijednosti['broj_telefona'] . "','" . $datum . "')
            ";

            if ($konekcija->query($sql) !== true) {
                return false;
            }
        }

        return true;
    }

    public static function dohvatiPosljednjiID()
    {
        $konekcija = BazaPodatakaSpajanje::spajanjeNaBazuPodataka();

        if ($konekcija) {
            $sql = "SELECT ID_clan FROM Clanovi ORDER BY ID_clan DESC LIMIT 1";

            $rezultat = $konekcija->query($sql)->fetch_row();

            return $rezultat[0];
        }
    }
}