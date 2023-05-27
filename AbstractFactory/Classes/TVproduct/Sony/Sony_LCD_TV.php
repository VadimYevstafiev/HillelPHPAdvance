<?php

namespace Classes\TVproduct\Sony;

use Contracts, Classes\TVproduct;

class Sony_LCD_TV extends TVproduct\TVproduct implements Contracts\LCD_TV_Contract
{
    protected string $fabricator = 'Sony';

    protected string $type = 'LCD';
}