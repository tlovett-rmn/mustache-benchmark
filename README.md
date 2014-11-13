## Description

Compare performances of native code, mustache, and mustache with cache.

## Usage

```bash
cd path/to/repo
./run.bash
```

## Bechmark Result

Two code formats are considered to be tested, simple and loop.

Simple code is:

```html
<div class="test">
    <h2>This is a test of {{ name }}</h2>
    <p>The homepage is <a href="{{ url }}">{{ url }}</a>.</p>
    <p>The sources is: {{ source }}</p>
</div>
```

Loop code is:

```html
<div class="comments">
    <h3>{{ header }}</h3>
    <ul>
        {{# comments }}
        <li class="comment">
            <h5>{{ name }}</h5>
            <p>{{ body }}</p>
        </li>
        {{/ comments }}
    </ul>
</div>
```

Enviroments:

- GNU/Linux 3.2.0-34-virtual
- Php 5.3.10
- Mustache.php 2.70
- LightnCandy 0.16
- Twig 1.16.21
- Smarty 3.1.21

Under the condition of 10000 times tests with 10 times repeat to achieve more accuracy, the benchmark results are:

```
=== Native PHP ===
Simple Test: 433.46125488281ms, 249.6byte PHP, 0byte System
Loop Test: 397.63986816406ms, 232.8byte PHP, 0byte System


=== Mustache.php ===
Simple Test: 3634.5178222656ms, 13053.6byte PHP, 26214.4byte System
Loop Test: 9453.0949707031ms, 3756byte PHP, 0byte System


=== LightnCandy ===
Simple Test: 1379.8023681641ms, 7284byte PHP, 26214.4byte System
Loop Test: 3476.5112060547ms, 541164.8byte PHP, 707788.8byte System


=== Twig ===
Simple Test: 2651.5919921875ms, 210796.8byte PHP, 209715.2byte System
Loop Test: 7742.2057617188ms, 21094.4byte PHP, 26214.4byte System


=== Smarty ===
Simple Test: 1988.1653808594ms, 338788byte PHP, 340787.2byte System
Loop Test: 2171.2811523437ms, 10644byte PHP, 0byte System



```