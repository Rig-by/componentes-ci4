<?php

namespace App\Libraries\Components\Base;

/**
 * BaseComponent
 * 
 * Clase padre de todos los componentes del sistema.
 * Proporciona funcionalidad común como manejo de ID, clases CSS,
 * estilos inline y atributos HTML personalizados.
 * 
 * @author Rigoberto
 * @package App\Libraries\Components\Base
 */
abstract class BaseComponent
{
    /**
     * ID único del componente
     * @var string
     */
    protected $id;

    /**
     * Clases CSS del componente
     * @var array
     */
    protected $classes = [];

    /**
     * Estilos inline del componente
     * @var array
     */
    protected $styles = [];

    /**
     * Atributos HTML adicionales
     * @var array
     */
    protected $attributes = [];

    /**
     * Constructor
     * Genera un ID único automáticamente
     */
    public function __construct()
    {
        $this->id = $this->generateId();
    }

    /**
     * Genera un ID único basado en el nombre de la clase
     * 
     * @return string
     */
    protected function generateId(): string
    {
        $className = strtolower(class_basename($this));
        return $className . '_' . uniqid();
    }

    /**
     * Establece un ID personalizado
     * 
     * @param string $id
     * @return $this
     */
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Obtiene el ID del componente
     * 
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Agrega una clase CSS al componente
     * 
     * @param string $class
     * @return $this
     */
    public function addClass(string $class)
    {
        if (!in_array($class, $this->classes)) {
            $this->classes[] = $class;
        }
        return $this;
    }

    /**
     * Agrega múltiples clases CSS
     * 
     * @param array $classes
     * @return $this
     */
    public function addClasses(array $classes)
    {
        foreach ($classes as $class) {
            $this->addClass($class);
        }
        return $this;
    }

    /**
     * Elimina una clase CSS
     * 
     * @param string $class
     * @return $this
     */
    public function removeClass(string $class)
    {
        $key = array_search($class, $this->classes);
        if ($key !== false) {
            unset($this->classes[$key]);
        }
        return $this;
    }

    /**
     * Agrega un estilo CSS inline
     * 
     * @param string $property Propiedad CSS (ej: 'width')
     * @param string $value Valor CSS (ej: '100px')
     * @return $this
     */
    public function addStyle(string $property, string $value)
    {
        $this->styles[$property] = $value;
        return $this;
    }

    /**
     * Agrega múltiples estilos CSS
     * 
     * @param array $styles Array asociativo ['propiedad' => 'valor']
     * @return $this
     */
    public function addStyles(array $styles)
    {
        foreach ($styles as $property => $value) {
            $this->addStyle($property, $value);
        }
        return $this;
    }

    /**
     * Agrega un atributo HTML personalizado
     * 
     * @param string $key Nombre del atributo
     * @param string $value Valor del atributo
     * @return $this
     */
    public function setAttribute(string $key, string $value)
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    /**
     * Agrega múltiples atributos HTML
     * 
     * @param array $attributes Array asociativo ['atributo' => 'valor']
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }
        return $this;
    }

    /**
     * Construye la cadena de atributos HTML para el elemento
     * 
     * @return string Atributos HTML formateados
     */
    protected function buildAttributes(): string
    {
        $attrs = [];

        // ID
        $attrs[] = "id='{$this->id}'";

        // Clases CSS
        if (!empty($this->classes)) {
            $classString = implode(' ', array_unique($this->classes));
            $attrs[] = "class='{$classString}'";
        }

        // Estilos inline
        if (!empty($this->styles)) {
            $styleString = '';
            foreach ($this->styles as $property => $value) {
                $styleString .= "{$property}:{$value};";
            }
            $attrs[] = "style='{$styleString}'";
        }

        // Atributos adicionales
        foreach ($this->attributes as $key => $value) {
            $attrs[] = "{$key}='{$value}'";
        }

        return implode(' ', $attrs);
    }

    /**
     * Escapa caracteres HTML especiales
     * 
     * @param string $text
     * @return string
     */
    protected function escape(string $text): string
    {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Formatea un número con separadores de miles
     * 
     * @param float $number
     * @param int $decimals
     * @return string
     */
    protected function formatNumber(float $number, int $decimals = 0): string
    {
        return number_format($number, $decimals, '.', ',');
    }

    /**
     * Renderiza el componente y retorna el HTML
     * Debe ser implementado por cada componente hijo
     * 
     * @return string HTML del componente
     */
    abstract public function render(): string;

    /**
     * Convierte el objeto a string llamando a render()
     * 
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
