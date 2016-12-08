# OWNumeroATexto
Pequeña librería en PHP para traducir números a texto en español (de 0 a 999,999,999) sin decimales.

## Uso

Incluye la librería en tu script e invoca el método owNumeroATexto enviando como parámetro el número que quieras traducir. El método automáticamente elimina decimales.

```php

include_once("OWNumeroATexto.php");

$ejemplo = owNumeroATexto(999837232);
echo $ejemplo;
// resultado -> novecientos noventa y nueve millones ochocientos treinta y siete mil doscientos treinta y dos


```
