<?php

namespace App\Common\DTO;

use Saleem\DataTransferObject\BaseDto;

/**
 * Class ProductResponseDto
 *
 * This DTO class represents the data transfer object for ProductResponse.
 * It extends the BaseDto class, providing common functionality for DTOs.
 *
 * @package Saleem\DataTransferObject
 */
class ProductResponseDto extends BaseDto
{
    // -------------------------------------------------------------------------
    // Attributes
    // -------------------------------------------------------------------------

    public array $products = [];

    protected static array $arrayCasts=[
        'products' => ProductDto::class
    ];
}
