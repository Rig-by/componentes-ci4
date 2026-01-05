<?php
namespace App\Libraries\Components\Base;

abstract class BaseComponent
{
    protected $id;
    protected $classes = [];
    protected $styles = [];
    protected $attributes = [];
    
    public function __construct()
    {
        $this->id = $this->generateId();
    }
    
    protected function generateId()
    {
        return strtolower(str_replace('\\', '_', get_class($this))) . '_' . uniqid();
    }
    
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function addClass(string $class)
    {
        $this->classes[] = $class;
        return $this;
    }
    
    public function addStyle(string $property, string $value)
    {
        $this->styles[$property] = $value;
        return $this;
    }
    
    public function setAttribute(string $key, string $value)
    {
        $this->attributes[$key] = $value;
        return $this;
    }
    
    protected function buildAttributes(): string
    {
        $attrs = ["id='{$this->id}'"];
        
        if (!empty($this->classes)) {
            $attrs[] = "class='" . implode(' ', $this->classes) . "'";
        }
        
        if (!empty($this->styles)) {
            $styleStr = '';
            foreach ($this->styles as $prop => $val) {
                $styleStr .= "{$prop}:{$val};";
            }
            $attrs[] = "style='{$styleStr}'";
        }
        
        foreach ($this->attributes as $key => $value) {
            $attrs[] = "{$key}='{$value}'";
        }
        
        return implode(' ', $attrs);
    }
    
    abstract public function render(): string;
}
