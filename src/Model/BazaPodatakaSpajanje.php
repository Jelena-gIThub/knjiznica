<?php

namespace Knjiznica\Model;

class BazaPodatakaSpajanje {

    const SERVER_ADRESA = 'localhost';
    const BAZA_KORISNICKO_IME = 'root';
    const BAZA_LOZINKA = '';
    const BAZA_IME = 'knjiznica';

    public static function spajanjeNaBazuPodataka()
    {
        $konekcija = mysqli_connect(
            self::SERVER_ADRESA,
            self::BAZA_KORISNICKO_IME,
            self::BAZA_LOZINKA,
            self::BAZA_IME
        )
        or die("Nije uspjelo spajanje na bazu podataka.");
        
        return $konekcija;
    }
}
