# php html
this is mini little php module, designed for create OOP style HTML elements in php.

```php
require_once __DIR__ . '/' . 'path/to/php-html' .'html-tags.php';

// start with the basic document structure
$html = new Html();
$head = new Head();
$body = new Body();

// create the head section of the page
$title = new Title();
$title->inner_text = 'My PHP Generated Page';
$head->children[] = $title;

$meta_charset = new Meta();
$meta_charset->charset = 'UTF-8';
$head->children[] = $meta_charset;

$link_style = new Link();
$link_style->rel = 'stylesheet';
$link_style->href = 'styles.css';
$head->children[] = $link_style;

// create the body section of the page
$main_div = new Div();
$main_div->id = 'main-container';
$main_div->class = 'content-wrapper';

$header = new Heading1();
$header->inner_text = 'Welcome to the Generated Page';
$main_div->children[] = $header;

$paragraph = new Paragraph();
$paragraph->inner_text = 'This page was built entirely using PHP classes. Below is a simple form.';
$main_div->children[] = $paragraph;

// create a form with various input types
$user_form = new Form();
$user_form->action = '/submit-data.php';
$user_form->method = 'post';

$label_name = new Label();
$label_name->for = 'name-input';
$label_name->inner_text = 'Your Name:';
$user_form->children[] = $label_name;

$input_name = new Input();
$input_name->type = 'text';
$input_name->id = 'name-input';
$input_name->name = 'name';
$input_name->placeholder = 'Enter your name';
$input_name->required = true;
$user_form->children[] = $input_name;

// add a line break for spacing
$user_form->children[] = new Br();

$label_email = new Label();
$label_email->for = 'email-input';
$label_email->inner_text = 'Your Email:';
$user_form->children[] = $label_email;

$input_email = new Input();
$input_email->type = 'email';
$input_email->id = 'email-input';
$input_email->name = 'email';
$input_email->placeholder = 'Enter your email';
$user_form->children[] = $input_email;

// add another line break
$user_form->children[] = new Br();

$submit_button = new Button();
$submit_button->type = 'submit';
$submit_button->inner_text = 'Submit';
$user_form->children[] = $submit_button;

$main_div->children[] = $user_form;

// nest the body's content inside the body tag
$body->children[] = $main_div;

// final assembly of the entire document
$html->children[] = $head;
$html->children[] = $body;

// render the final HTML
echo $html->render();
```
