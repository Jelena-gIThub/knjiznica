<?php

class NaslovnaController {

    const PUTANJA_VIEW = 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\knjiznica\\src\\views\\naslovna\\index.html';

    public function prikaziView()
    {
        include_once self::PUTANJA_VIEW;
    }
}
