<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\FeedbackFooterRepository")
 * @ORM\Table(name="feedback_footer")
 */
class FeedbackFooter
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @Assert\NotBlank(message="Поле Телефон не может быть пустым")
     * @Assert\Length(max=20, maxMessage="Телефон должен иметь меньше 20 символов")
     * @ORM\Column(name="phone", type="string", length=20, nullable=false)
     */
    private $phone;



    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }



}
