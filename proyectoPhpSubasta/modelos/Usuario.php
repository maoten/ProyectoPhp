<?php

namespace Milo\SaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="nickname", type="string", length=30, nullable=false)
     */
    private $nickname;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=30, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmacion", type="string", length=30, nullable=false)
     */
    private $confirmacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="genero", type="boolean", nullable=true)
     */
    private $genero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaNacimiento", type="date", nullable=true)
     */
    private $fechanacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="pais", type="string", length=20, nullable=false)
     */
    private $pais;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=50, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="pujas", type="integer", nullable=false)
     */
    private $pujas = '10';



    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     *
     * @return Usuario
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set confirmacion
     *
     * @param string $confirmacion
     *
     * @return Usuario
     */
    public function setConfirmacion($confirmacion)
    {
        $this->confirmacion = $confirmacion;

        return $this;
    }

    /**
     * Get confirmacion
     *
     * @return string
     */
    public function getConfirmacion()
    {
        return $this->confirmacion;
    }

    /**
     * Set genero
     *
     * @param boolean $genero
     *
     * @return Usuario
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return boolean
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set fechanacimiento
     *
     * @param \DateTime $fechanacimiento
     *
     * @return Usuario
     */
    public function setFechanacimiento($fechanacimiento)
    {
        $this->fechanacimiento = $fechanacimiento;

        return $this;
    }

    /**
     * Get fechanacimiento
     *
     * @return \DateTime
     */
    public function getFechanacimiento()
    {
        return $this->fechanacimiento;
    }

    /**
     * Set pais
     *
     * @param string $pais
     *
     * @return Usuario
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Usuario
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set pujas
     *
     * @param integer $pujas
     *
     * @return Usuario
     */
    public function setPujas($pujas)
    {
        $this->pujas = $pujas;

        return $this;
    }

    /**
     * Get pujas
     *
     * @return integer
     */
    public function getPujas()
    {
        return $this->pujas;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
