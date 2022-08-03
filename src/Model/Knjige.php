<?php

namespace Knjiznica\Model;

class Knjige {

    public function dohvatiSveKnjige()
    {
        $konekcija = BazaPodatakaSpajanje::spajanjeNaBazuPodataka();

        if ($konekcija) {
            $sql = "
                SELECT 
                    Autori.ime, Autori.prezime, 
                    Knjige.naslov, Knjige.isbn, Knjige.godina_izdanja, 
                    Izdavaci.naziv_izdavac, 
                    Kategorije.naziv_kategorija
                FROM Knjige
                    JOIN Autori ON Autori.ID_autor = Knjige.ID_autor
                    JOIN Izdavaci ON Izdavaci.ID_izdavac = Knjige.ID_izdavac 
                    JOIN Kategorije ON Kategorije.ID_kategorija = Knjige.ID_kategorija; 
            ";
            
            return $konekcija->query($sql)->fetch_all();
        }

        return false;
    }

}
