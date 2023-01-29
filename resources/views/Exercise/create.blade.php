@extends('Components.navbar')

@section('content')

<script>
    /*
function textAreaAdjust(element = document.getElementById('description')) {
    element.style.height = "1px";
    element.style.height = (25 + element.scrollHeight)+"px";
}

const Create = () =>
{
    fetch("/echo/json/",
    {
        headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
        },
        method: "POST",
        body: JSON.stringify(
            {
                "name": document.getElementById("name").value,
                "description": document.getElementById("description").value
            }
        )
    })
    .then(function(res){ console.log(res) })
    .catch(function(res){ console.log(res) })
}
    */

   /* outside the script but this is easier to comment
   <form onsubmit="Create()" action="/exercise" method="GET">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>

            <label for="description">Description:</label><br>
            <textarea onkeyup="textAreaAdjust(this)" cols="' . 120 . '" type="description" id="description" name="description"></textarea><br>

            <input type="submit" value="Create">
        </form>';
        */
</script>
<h1> Error 301, Moved Permanently. </h1> 



@stop