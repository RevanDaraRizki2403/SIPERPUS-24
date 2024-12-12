<?php

namespace App;


enum IsReturn: int
{
    case BelumDikembalikan = 0; 
    case SudahDikembalikan = 1;


    public function label(): string
    {
        return match($this) {
            self::BelumDikembalikan => 'Belum Di kembalikan',
            self::SudahDikembalikan => 'Sudah Di kembalikan',
        };
    }
}
