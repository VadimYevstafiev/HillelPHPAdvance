<?php

namespace Classes\TVproduct\LG;

use Contracts, Classes\TVproduct;

class LG_LCD_TV extends TVproduct\TVproduct implements Contracts\LCD_TV_Contract
{

    protected string $fabricator = 'LG';

    protected string $type = 'LCD';
}