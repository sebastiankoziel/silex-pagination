# Pagination

This service provider is based on [AmsTaFFix/silex-pagination](https://github.com/AmsTaFFix/silex-pagination), but now works on Silex 2.0.

## Requirements

- silex/silex >= 2.0
- kilte/pagination >= 1.1
- twig/twig >= 1.8
- PHP >= 5.6

## Registering

```php
$app->register(new SKoziel\Silex\Pagination\PaginationServiceProvider(), array(
    'pagination.per_page' => 30, //Number of items per page, default = 20
    'pagination.neighbours' => 5 //Number of neighboring pages, default = 4
    ));
```

##Trait

```php
use SKoziel\Silex\Pagination\PaginationTrait;

$pagination = $app->pagination($total, $current, $perPage, $neighbours);
```

## Usage

###Building pagination

```php
$pagination = $app['pagination'](100, 5);
$pages = $pagination->build();
```

###Creating pagination friendly twig

```twig
<ul>
  {% for number, position in pages %}
    {% if position == 'first' %}
      <li><a href="/{{ number }}">&laquo;</a></li>
    {% elseif position == 'less' or position == 'more' %}
      <li>...</li>
    {% elseif position == 'previous' or position == 'next' %}
      <li><a href="/{{ number }}">{{ number }}</a></li>
    {% elseif position == 'current' %}
      <li>{{ number }}</li>
    {% elseif position == 'last' %}
      <li><a href="/{{ number }}">&raquo;</a></li>
    {% endif %}
  {% endfor %}
</ul>
```

###Rendering twig with pagination

```php
$app['twig']->render('pagination.twig', array('pages' => $pages, 'current' => $pagination->currentPage()));
```