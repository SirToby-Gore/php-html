<?php

class HtmlTag {
    public string $inner_text = '';

    /// e.g. 'p', 'img', 'div'
    /// set this in a child class
    public string $tag_name = 'unassigned';

    /// set this to true or false in a child class
    public bool $closed_tag = false;

    /// an array of Tags 
    public array $children = [];

    /// change here in the parent class for a different separator
    public string $html_separator = "\n";

    // #region attributes
    public bool $hidden = false;
    public string $id;
    public string $class;
    public string $style;
    public array $data = [];
    public string $lang;
    public string $title;
    // #endregion attributes

    public function __construct() {}

    public function render(): string {
        if ($this->closed_tag) {
            return $this->render_opening_tag();
        }
        
        return implode(
            separator: $this->html_separator,
            array: [
                $this->render_top(),
                $this->render_opening_tag(),
                $this->inner_text,
                $this->render_children(),
                $this->render_closing_tag(),
            ]
        );
    }

    private function render_top(): string {
        return '';
    }

    private function render_opening_tag(): string {
        $html = "<{$this->tag_name}";

        $html .= $this->render_base_attributes();

        $html .= $this->render_attributes();

        if ($this->closed_tag) {
            $html .= ' />';
        } else {
            $html .= '>';
        }

        return $html;
    }

    private function render_children(): string {
        $html = [];
        
        if ($this->children) {
            foreach ($this->children as $child) {
                $html[] = $child->render();
            }
        }

        return implode(separator: $this->html_separator, array: $html);
    }

    private function render_base_attributes(): string {
        $attrs = [];

        if ($this->hidden) {
            $attrs[] = 'hidden';
        }

        if (isset($this->id)) {
            $attrs[] = "id=\"{$this->id}\"";
        }

        if (isset($this->class)) {
            $attrs[] = "class=\"{$this->class}\"";
        }

        if (isset($this->style)) {
            $attrs[] = "style=\"{$this->style}\"";
        }

        if (isset($this->lang)) {
            $attrs[] = "lang=\"{$this->lang}\"";
        }
        
        if (isset($this->title)) {
            $attrs[] = "title=\"{$this->title}\"";
        }

        foreach ($this->data as $key => $value) {
            $attrs[] = "data-{$key}=\"{$value}\"";
        }
        
        if (empty($attrs)) {
            return '';
        }

        return ' ' . implode(separator: ' ', array: $attrs);
    }


    /// all the attrs not found in the parent class are to be put in this function
    public function render_attributes(): string {
        return '';
    }

    private function render_closing_tag(): string {
        if ($this->closed_tag) {
            print "<hr><br><b> A closed tag with name `{$this->tag_name}` has called `render_closing_tag` and needs to be fixed </b><br>";
            exit(1);
        }
        
        return "</{$this->tag_name}>";
    }
}

