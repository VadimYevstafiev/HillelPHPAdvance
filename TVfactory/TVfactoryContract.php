<?php

namespace TVfactory;

//use TVproduct\{LCD_TV, LED_TV};
use TVproduct;

interface TVfactoryContract
{
    public function CreateLCD_TV(): TVproduct\LCD_TV;

    public function CreateLED_TV(): TVproduct\LED_TV;

}