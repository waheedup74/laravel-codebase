<?php

namespace App\Common\DTO;

use Saleem\DataTransferObject\BaseDto;

/**
 * Class ProductDto
 *
 * This DTO class represents the data transfer object for Product.
 * It extends the BaseDto class, providing common functionality for DTOs.
 *
 * @package Saleem\DataTransferObject
 */
class ProductDto extends BaseDto
{
    // -------------------------------------------------------------------------
    // Attributes
    // -------------------------------------------------------------------------

    /**
     * @var string|null $product_id
     * Description: The unique identifier for the product.
     * Example: '123456789'
     */
    public ?string $id = null;

    /**
     * @var string|null $title
     * Description: The title of the product.
     * Example: 'iPhone 9'
     */
    public ?string $title = null;

    /**
     * @var string|null $description
     * Description: Brief description of the product.
     * Example: 'An apple mobile which is nothing like apple'
     */
    public ?string $description = null;

    /**
     * @var float|null $price
     * Description: The price of the product.
     * Example: 549.00
     */
    public ?float $price = null;

    /**
     * @var float|null $discount_percentage
     * Description: The discount percentage for the product.
     * Example: 12.96
     */
    public ?float $discountPercentage = null;

    /**
     * @var float|null $rating
     * Description: The rating of the product.
     * Example: 4.69
     */
    public ?float $rating = null;

    /**
     * @var int|null $stock
     * Description: The stock quantity of the product.
     * Example: 94
     */
    public ?int $stock = null;

    /**
     * @var string|null $brand
     * Description: The brand of the product.
     * Example: 'Apple'
     */
    public ?string $brand = null;

    /**
     * @var string|null $category
     * Description: The category of the product.
     * Example: 'smartphones'
     */
    public ?string $category = null;

    /**
     * @var string|null $thumbnail
     * Description: The URL of the product's thumbnail image.
     * Example: 'https://i.dummyjson.com/data/products/1/thumbnail.jpg'
     */
    public ?string $thumbnail = null;

    /**
     * @var array $images
     * Description: The URLs of the product's images.
     * Example: ['https://i.dummyjson.com/data/products/1/1.jpg', ...]
     */
    public array $images = [];
}
