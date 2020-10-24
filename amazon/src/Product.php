<?php
namespace Amazon;

class Product
{
    private $weight;
    private $width;
    private $height;
    private $depth;
    private $amazonPrice;

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width): void
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height): void
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @param mixed $depth
     */
    public function setDepth($depth): void
    {
        $this->depth = $depth;
    }

    /**
     * @return mixed
     */
    public function getAmazonPrice()
    {
        return $this->amazonPrice;
    }

    /**
     * @param mixed $amazonPrice
     */
    public function setAmazonPrice($amazonPrice): void
    {
        $this->amazonPrice = $amazonPrice;
    }
}