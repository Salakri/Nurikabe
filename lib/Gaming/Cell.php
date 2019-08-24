<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/10
 * Time: 15:04
 */

namespace Gaming;


class Cell
{
    const BLANK = -1;
    const SEA = -2;
    const ISLAND = -3;
    const REDISLAND = -4;
    const REDSEA = -5;



    public function __construct(){
    }

    const table_3x3 = [
        [1, Cell::SEA, 1],
        [Cell::SEA, Cell::SEA, Cell::SEA],
        [2, Cell::ISLAND, Cell::SEA]
    ];


    const table_8x8 = [
        [Cell::SEA, Cell::SEA, 2, Cell::ISLAND, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA],
        [Cell::SEA, 1, Cell::SEA, Cell::SEA, Cell::SEA, 4, Cell::ISLAND, Cell::SEA],
        [Cell::SEA, Cell::SEA, Cell::SEA, Cell::ISLAND, 2, Cell::SEA, Cell::ISLAND, Cell::SEA],
        [Cell::SEA, 2, Cell::ISLAND, Cell::SEA, Cell::SEA, Cell::SEA, Cell::ISLAND, Cell::SEA],
        [4, Cell::SEA, Cell::SEA, Cell::SEA, Cell::ISLAND, 2, Cell::SEA, Cell::SEA],
        [Cell::ISLAND, Cell::SEA, Cell::ISLAND, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA, Cell::ISLAND],
        [Cell::ISLAND, Cell::SEA, Cell::ISLAND, 3, Cell::SEA, Cell::ISLAND, Cell::SEA, 3],
        [Cell::ISLAND, Cell::SEA, Cell::SEA, Cell::SEA, Cell::ISLAND, 3, Cell::SEA, Cell::ISLAND]
    ];

    const table_10x10 = [
        [4, Cell::ISLAND, Cell::ISLAND, Cell::ISLAND, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA, 1],
        [Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA, Cell::ISLAND, Cell::ISLAND, Cell::SEA, Cell::SEA, 1],
        [Cell::SEA, Cell::ISLAND, Cell::SEA, Cell::ISLAND, Cell::ISLAND, Cell::SEA, 3, Cell::SEA, 3, Cell::SEA],
        [Cell::SEA, 2, Cell::SEA, 3, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA, Cell::ISLAND, Cell::SEA],
        [1, Cell::SEA, Cell::SEA, Cell::SEA, 4, Cell::ISLAND, Cell::SEA, 3, Cell::SEA, Cell::SEA],
        [Cell::SEA, Cell::SEA, 2, Cell::ISLAND, Cell::SEA, Cell::ISLAND, Cell::SEA, Cell::ISLAND, Cell::SEA, 5],
        [Cell::SEA, Cell::ISLAND, Cell::SEA, Cell::SEA, Cell::SEA, Cell::ISLAND, Cell::SEA, Cell::ISLAND, Cell::SEA, Cell::ISLAND],
        [Cell::SEA, Cell::ISLAND, Cell::SEA, 1, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA, Cell::ISLAND],
        [Cell::SEA, Cell::ISLAND, 4, Cell::SEA, Cell::SEA, 3, Cell::ISLAND, Cell::ISLAND, Cell::SEA, Cell::ISLAND],
        [Cell::SEA, Cell::SEA, Cell::SEA, Cell::ISLAND, 2, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA, Cell::ISLAND]

    ];

    const table_8x8_m = [
        [Cell::ISLAND, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA],
        [2, Cell::SEA, Cell::ISLAND, Cell::ISLAND, Cell::SEA, Cell::ISLAND, Cell::ISLAND, Cell::ISLAND],
        [Cell::SEA, 4, Cell::ISLAND, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA, Cell::ISLAND],
        [Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA, 2, Cell::ISLAND, Cell::SEA, 6],
        [Cell::SEA, Cell::ISLAND, Cell::SEA, 2, Cell::SEA, Cell::SEA, Cell::SEA, Cell::ISLAND],
        [Cell::SEA, 2, Cell::SEA, Cell::ISLAND, Cell::SEA, Cell::ISLAND, Cell::SEA, Cell::SEA],
        [5, Cell::SEA, Cell::SEA, Cell::SEA, 4, Cell::ISLAND, Cell::ISLAND, Cell::SEA],
        [Cell::ISLAND, Cell::ISLAND, Cell::ISLAND, Cell::ISLAND, Cell::SEA, Cell::SEA, Cell::SEA, Cell::SEA]
    ];

}