<h1>
<i>Home Page with itallic!
    <?php
    echo $name;
    ?>

</i>
</h1>
<ul>
    <?php foreach($colors as $color): ?>
    <li>
    <?php echo $color; ?> 
    </li>
    <?php endforeach;
    ?>
</ul>

<ul>
    @foreach($colors as $color)
    <li>
{{$color}}
    </li>
    @endforeach
    
</ul>
@for ($i= 0;$i <5; $i++)
{{$i}}
@endfor

