<?php
require_once __DIR__ . '/' . 'html-tag.php';

class Html extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'html';
    }

    private function render_top(): string {
        return '<!DOCTYPE html>';
    }
}
class Head extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'head';
    }
}
class Body extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'body';
    }
}
class Title extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'title';
    }
}
class Meta extends HtmlTag {
    public string $name = '';
    public string $content = '';
    public string $charset = '';
    public function __construct() {
        $this->closed_tag = true;
        $this->tag_name = 'meta';  
    }
    public function render_attributes(): string {
        $attrs = [];
        if (!empty($this->name)) { $attrs[] = "name=\"{$this->name}\""; }
        if (!empty($this->content)) { $attrs[] = "content=\"{$this->content}\""; }
        if (!empty($this->charset)) { $attrs[] = "charset=\"{$this->charset}\""; }
        return ' ' . implode(separator: ' ', array: $attrs);
    }
}
class Link extends HtmlTag {
    public string $rel = '';
    public string $href = '';
    public string $type = '';
    public function __construct() { 
        $this->closed_tag = true;
        $this->tag_name = 'link';
    }
    public function render_attributes(): string {
        $attrs = [];
        if (!empty($this->rel)) { $attrs[] = "rel=\"{$this->rel}\""; }
        if (!empty($this->href)) { $attrs[] = "href=\"{$this->href}\""; }
        if (!empty($this->type)) { $attrs[] = "type=\"{$this->type}\""; }
        return ' ' . implode(separator: ' ', array: $attrs);
    }
}
class Style extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'style';
    }
}
class Script extends HtmlTag {
    public string $src = '';
    public string $type = 'text/javascript';
    public function __construct() {
        $this->tag_name = 'script';
    }
    public function render_attributes(): string {
        $attrs = [];
        if (!empty($this->src)) { $attrs[] = "src=\"{$this->src}\""; }
        if (!empty($this->type)) { $attrs[] = "type=\"{$this->type}\""; }
        return ' ' . implode(separator: ' ', array: $attrs);
    }
}

class Div extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'div';
    }
}
class Header extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'header';
    }
}
class Footer extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'footer';
    }
}
class Nav extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'nav';
    }
}
class Main extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'main';
    }
}
class Article extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'article';
    }
}
class Section extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'section';
    }
}
class Aside extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'aside';
    }
}
class Paragraph extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'p';
    }
}
class Heading1 extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'h1';
    }
}
class Heading2 extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'h2';
    }
}
class Heading3 extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'h3';
    }
}
class Heading4 extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'h4';
    }
}
class Heading5 extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'h5';
    }
}
class Heading6 extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'h6';
    }
}
class UnorderedList extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'ul';
    }
}
class OrderedList extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'ol';
    }
}
class ListItem extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'li';
    }
}
class Br extends HtmlTag {
    public function __construct() {
        $this->closed_tag = true;
        $this->tag_name = 'br';  
    }
}
class HorizontalLine extends HtmlTag {
    public function __construct() {
        $this->closed_tag = true;
        $this->tag_name = 'hr';  
    }
}
class Preformatted extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'pre';
    }
}

// --- Inline s ---
class Span extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'span';
    }
}
class Anchor extends HtmlTag {
    public string $href = '';
    public string $target = '';
    public function __construct() {
        $this->tag_name = 'a';
    }
    public function render_attributes(): string {
        $attrs = [];
        if (!empty($this->href)) { $attrs[] = "href=\"{$this->href}\""; }
        if (!empty($this->target)) { $attrs[] = "target=\"{$this->target}\""; }
        return ' ' . implode(separator: ' ', array: $attrs);
    }
}
class Strong extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'strong';
    }
}
class Emphasis extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'em';
    }
}
class Bold extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'b';
    }
}
class Italic extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'i';
    }
}
class Code extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'code';
    }
}
class Image extends HtmlTag {
    public string $src = '';
    public string $alt = '';
    public int $width;
    public int $height;
    public function __construct() {
        $this->closed_tag = true;
        $this->tag_name = 'img';
    }
    public function render_attributes(): string {
        $attrs = [];
        if (!empty($this->src)) { $attrs[] = "src=\"{$this->src}\""; }
        if (!empty($this->alt)) { $attrs[] = "alt=\"{$this->alt}\""; }
        if (isset($this->width)) { $attrs[] = "width=\"{$this->width}\""; }
        if (isset($this->height)) { $attrs[] = "height=\"{$this->height}\""; }
        return ' ' . implode(separator: ' ', array: $attrs);
    }
}
class Small extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'small';
    }
}

// --- Form s ---
class Form extends HtmlTag {
    public string $action = '';
    public string $method = 'get';
    public function __construct() {
        $this->tag_name = 'form';
    }
    public function render_attributes(): string {
        $attrs = [];
        if (!empty($this->action)) { $attrs[] = "action=\"{$this->action}\""; }
        if (!empty($this->method)) { $attrs[] = "method=\"{$this->method}\""; }
        return ' ' . implode(separator: ' ', array: $attrs);
    }
}
class Input extends HtmlTag {
    public string $type = 'text';
    public string $name = '';
    public string $value = '';
    public string $placeholder = '';
    public bool $required = false;
    public bool $disabled = false;
    public function __construct() {
        $this->closed_tag = true;
        $this->tag_name = 'input'; 
    }
    public function render_attributes(): string {
        $attrs = [];
        if (!empty($this->type)) { $attrs[] = "type=\"{$this->type}\""; }
        if (!empty($this->name)) { $attrs[] = "name=\"{$this->name}\""; }
        if (!empty($this->value)) { $attrs[] = "value=\"{$this->value}\""; }
        if (!empty($this->placeholder)) { $attrs[] = "placeholder=\"{$this->placeholder}\""; }
        if ($this->required) { $attrs[] = 'required'; }
        if ($this->disabled) { $attrs[] = 'disabled'; }
        return ' ' . implode(separator: ' ', array: $attrs);
    }
}
class Button extends HtmlTag {
    public string $type = 'submit';
    public string $name = '';
    public string $value = '';
    public bool $disabled = false;
    public function __construct() {
        $this->tag_name = 'button';
    }
    public function render_attributes(): string {
        $attrs = [];
        if (!empty($this->type)) { $attrs[] = "type=\"{$this->type}\""; }
        if (!empty($this->name)) { $attrs[] = "name=\"{$this->name}\""; }
        if (!empty($this->value)) { $attrs[] = "value=\"{$this->value}\""; }
        if ($this->disabled) { $attrs[] = 'disabled'; }
        return ' ' . implode(separator: ' ', array: $attrs);
    }
}
class Label extends HtmlTag {
    public string $for = '';
    public function __construct() {
        $this->tag_name = 'label';
    }
    public function render_attributes(): string {
        $attrs = [];
        if (!empty($this->for)) { $attrs[] = "for=\"{$this->for}\""; }
        return ' ' . implode(separator: ' ', array: $attrs);
    }
}
class Textarea extends HtmlTag {
    public string $name = '';
    public int $rows = 5;
    public int $cols = 30;
    public function __construct() {
        $this->tag_name = 'textarea';
    }
    public function render_attributes(): string {
        $attrs = [];
        if (!empty($this->name)) { $attrs[] = "name=\"{$this->name}\""; }
        if (!empty($this->rows)) { $attrs[] = "rows=\"{$this->rows}\""; }
        if (!empty($this->cols)) { $attrs[] = "cols=\"{$this->cols}\""; }
        return ' ' . implode(separator: ' ', array: $attrs);
    }
}

// --- Table s ---
class Table extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'table';
    }
}
class TableHead extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'thead';
    }
}
class TableBody extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'tbody';
    }
}
class TableRow extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'tr';
    }
}
class TableHeading extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'th';
    }
}
class TableDivision extends HtmlTag {
    public function __construct() {
        $this->tag_name = 'td';
    }
}
