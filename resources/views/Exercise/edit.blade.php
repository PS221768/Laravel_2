@extends('Components.navbar')

@section('content')
<h1>Error 301. Page has permenately been moved.</h1>
<!--this page will not be needed any longer, as it will be moved to the info page.-->
<!--
<script>
function textAreaAdjust(element = document.getElementById('description')) {
    element.style.height = "1px";
    element.style.height = (25 + element.scrollHeight)+"px";
}
</script>
<form action="{{ route('exercise.edit', ['exercise' => $exercise->id]) }}" method="POST">
<input type='hidden' name='_method' value='PUT'>
<?php
    echo '
        
            <input type="hidden" name="_token" value="' . csrf_token() . '">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value=' . $exercise->name . ' required><br>

            <label for="description">Description:</label><br>
            <textarea onkeyup="textAreaAdjust(this)" cols="' . 120 . '" type="description" id="description" name="description">' . $exercise->description . '</textarea><br>

            <input type="submit" value="Edit">
        ';

?>
</form>
<script>
    textAreaAdjust();
</script>
-->
@stop