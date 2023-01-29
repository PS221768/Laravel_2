@extends('Components.navbar')

@section('content')

<div id='users_table' class='flex-1 bg-white border border-gray-700 min-w-half flex-initial w-16'>
    
</div>

<script>    
    // first one is for testing, seccond one for live
          const baseURL = "http://localhost:8000/api/"
    //    const baseURL = "https://basbobby.nl/SummaMove/public/api/";
    let token = null

    const get_Token = () =>
    {
        cookies = document.cookie.split(";");
        for (let i = 0; i < cookies.length; i++)
        {
            if (cookies[i].trim().startsWith("token="))
            {
                token = cookies[i].substr(6);
                console.log(token)
            }
        }
    }

    get_Token();

    const url = window.location.href
    const id = url.split('/')[url.split('/').length -1]
    console.log(id)

    const get_table_data = async () =>
    {
        try
        {
            const res = await fetch(`${baseURL}exercise/${id}`)
            const answer = await res.json()
            return answer
        }
        catch(error)
        {
            alert("An item with this id does not exist, you will be redirected to the homepage in 2 sec.")
            const delay = ms => new Promise(res => setTimeout(res, ms));
            await delay(2000)
            window.location.replace("/");
        }
    }

    const fill_table = async () =>
    {
        const collect_data = (_callback) =>
        {
            get_table_data().then((response) => {
                console.log("collected data!")
                _callback(response)
            })
        }

        const generate_table = (data) =>
        {
            let context = document.getElementById("users_table");
            context.replaceChildren();
            // create the table and add the css classes
            let table = document.createElement("table");
            table.setAttribute("class", "flex-1 bg-white border border-gray-700 min-w-half flex-initial w-16");
            
            // creates a table title and fills it
            table.createCaption();
            table.innerHTML = "<b>Exercises:</b>"
            
            // created the header
            let Header = table.insertRow(0);

            // creating cells and add style to each one
            const ID = Header.insertCell(0);
            ID.setAttribute("class", "border border-gray-700 text-sm font-medium text-gray-900 px-6 py-4 text-left")
            const Name = Header.insertCell(1);
            Name.setAttribute("class", "border border-gray-700 text-sm font-medium text-gray-900 px-6 py-4 text-left")
            const Description = Header.insertCell(2);
            Description.setAttribute("class", "border border-gray-700 text-sm font-medium text-gray-900 px-6 py-4 text-left")
            const Edit = Header.insertCell(3);
            Edit.setAttribute("class", "border border-gray-700 text-sm font-medium text-gray-900 px-6 py-4 text-left")

            
            ID.innerHTML = "ID";
            Name.innerHTML = "Name";
            Description.innerHTML = "Description";
            Edit.innerHTML = "Edit";


            
            context.appendChild(table)
            
            console.log(data)
            
            let current_table_row = 1
            
            
            let tr = table.insertRow(1)
            
            const item = data

            let id = tr.insertCell(0)
            id.setAttribute("class", "border border-gray-700 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900")
            let name = tr.insertCell(1)
            name.setAttribute("class", "border border-gray-700 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap")
            let description = tr.insertCell(2)
            description.setAttribute("class", "border border-gray-700 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap max-w-sm break-normal")
            let edit = tr.insertCell(3)
            edit.setAttribute("class", "border border-gray-700 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap")            
            
            const name_input = document.createElement("input");
            name_input.value = item.name;
            name_input.id = "name";
            name_input.type = "text";
            name_input.className = "css-class-name";
            name.appendChild(name_input);

            const desc_input = document.createElement("input");
            desc_input.value = item.description;
            desc_input.id = "description";
            desc_input.type = "text";
            desc_input.className = "css-class-name";
            description.appendChild(desc_input);
            
            id.innerHTML = item.id

            // edit button
            let Edit_btn = document.createElement("button")
            Edit_btn.type = "button"
            Edit_btn.setAttribute("class", "bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full")
            Edit_btn.innerText = "Save changes"
            Edit_btn.onclick = (() => {
                        let comfirmed = confirm("Are you sure?");
                        // check if user wants to delete
                        if(comfirmed != true) return;
                        // check if user is logged in, if no alert them.
                        if(token == null) { alert("you are not allowed to use this function, are you sure you are logged in?"); return; }
                        // delete function
                        fetch(`${baseURL}exercise/` + item.id,
                        {
                            method: 'PUT',
                            mode: 'cors',
                            cache: 'no-cache',
                            credentials: 'same-origin',
                            headers: {
                                'Content-Type': 'application/json',
                                "Authorization": `Bearer ${token}`
                            },
                            body: {
                                description: document.getElementById("description").value,
                                name: document.getElementById("name").value
                            }
                        })
                        .then((res) => res.json())
                        .then((data) => console.log(data))
                        .catch((err) => alert(err));

                    })
            edit.appendChild(Edit_btn)
        }

        collect_data(generate_table);
        
    }

    fill_table();


</script>



@stop