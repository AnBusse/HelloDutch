<?php
/**
 * Created by PhpStorm.
 * User: andrea
 * Date: 5-7-18
 * Time: 21:46
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="recipe")
 */
class Recipe
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Province", inversedBy="id")
     */
    private $recipe;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $category_id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="string")
     */
    protected $prep_time;

    /**
     * @ORM\Column(type="text")
     */
    protected $wait_time;

    /**
     * @ORM\Column(type="text")
     */
    protected $servings;

    /**
     * @return mixed
     */
    public function getRecipe()
    {
        return $this->recipe;
    }

    /**
     * @param mixed $recipe
     */
    public function setRecipe($recipe): void
    {
        $this->recipe = $recipe;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrepTime()
    {
        return $this->prep_time;
    }

    /**
     * @param mixed $prep_time
     */
    public function setPrepTime($prep_time): void
    {
        $this->prep_time = $prep_time;
    }

    /**
     * @return mixed
     */
    public function getWaitTime()
    {
        return $this->wait_time;
    }

    /**
     * @param mixed $wait_time
     */
    public function setWaitTime($wait_time): void
    {
        $this->wait_time = $wait_time;
    }

    /**
     * @return mixed
     */
    public function getServings()
    {
        return $this->servings;
    }

    /**
     * @param mixed $servings
     */
    public function setServings($servings): void
    {
        $this->servings = $servings;
    }

}