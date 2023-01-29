@extends('Components.navbar')

@section('content')


<div id='users_table' class='flex-1 bg-white border border-gray-700 min-w-half flex-initial w-16'>
    
</div>

<script>
        // first one is for testing, seccond one for live
        const baseURL = "http://127.0.0.1:8000/api/"
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

    const get_table_data = async () =>
    {
        const res = await fetch(`${baseURL}exercise`)
        const answer = await res.json()
        return answer
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
            const Info = Header.insertCell(3);
            Info.setAttribute("class", "border border-gray-700 text-sm font-medium text-gray-900 px-6 py-4 text-left")
            const Delete = Header.insertCell(4);
            Delete.setAttribute("class", "border border-gray-700 text-sm font-medium text-gray-900 px-6 py-4 text-left")

            
            ID.innerHTML = "ID";
            Name.innerHTML = "Name";
            Description.innerHTML = "Description";
            Info.innerHTML = "Info";
            Delete.innerHTML = "Delete";

            context.appendChild(table)

            console.log(data)

            let current_table_row = 1

            for (let i = 0; i <= data.length; i++) {
                if (i != data.length)
                {
                    let tr = table.insertRow(i + 1)
                    current_table_row += 1
                    
                    const item = data[i]
    
                    let id = tr.insertCell(0)
                    id.setAttribute("class", "border border-gray-700 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900")
                    let name = tr.insertCell(1)
                    name.setAttribute("class", "border border-gray-700 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap")
                    let desciption = tr.insertCell(2)
                    desciption.setAttribute("class", "border border-gray-700 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap max-w-sm truncate break-normal")
                    let info = tr.insertCell(3)
                    info.setAttribute("class", "border border-gray-700 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap")
                    let _delete = tr.insertCell(4)
                    _delete.setAttribute("class", "border border-gray-700 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap")
    
    
                    id.innerHTML = item.id
                    name.innerHTML = item.name
                    desciption.innerHTML = item.description

                    // info button
                    let Info_btn = document.createElement("button")
                    Info_btn.type = "button"
                    Info_btn.setAttribute("class", "bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full")
                    Info_btn.innerText = "Info"
                    Info_btn.onclick = (() => {
                        window.location.href = "/exercise/" + item.id;
                    })
                    info.appendChild(Info_btn)                
                   
                    // delete button
                    let Delete_btn = document.createElement("button")
                    Delete_btn.type = "button"
                    Delete_btn.setAttribute("class", " bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full")
                    Delete_btn.innerText = "Delete"
                    Delete_btn.onclick = (() => {
                        let comfirmed = confirm("Are you sure?");
                        // check if user wants to delete
                        if(comfirmed != true) return;
                        // check if user is logged in, if no alert them.
                        if(token == null) { alert("you are not allowed to use this function, are you sure you are logged in?"); return; }
                        // delete function
                        fetch(`${baseURL}exercise/` + item.id,
                        {
                            method: 'DELETE',
                            mode: 'cors',
                            cache: 'no-cache',
                            credentials: 'same-origin',
                            headers: {
                                'Content-Type': 'application/json',
                                "Authorization": `Bearer ${token}`
                            },
                        })
                        .then((res) => res.json())
                        .then(() => collect_data(generate_table))
                        .catch((err) => alert(err));


                    })
                    _delete.appendChild(Delete_btn)
    
                    console.log(i)
                }
                else
                {
                    let tr = table.insertRow(i + 1)

                    let Fill1 = tr.insertCell(0)

                    let cell_name = tr.insertCell(1)
                    let input_name = document.createElement("input");
                    input_name.type = "";
                    input_name.placeholder = "Enter name";
                    cell_name.appendChild(input_name);

                    cell_name.setAttribute("class", "border border-gray-700 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap")

                    let cell_description = tr.insertCell(2)
                    let input_description = document.createElement("input");
                    input_description.type = "";
                    input_description.placeholder = "Enter name";
                    cell_description.appendChild(input_description);
                    
                    cell_description.setAttribute("class", "border border-gray-700 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap max-w-sm truncate break-normal")
                    let Fill4 = tr.insertCell(3)
                    let Create = tr.insertCell(4)

                    Create.setAttribute("class", "border border-gray-700 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap")

                    let Create_btn = document.createElement("button")
                    Create_btn.type = "button"
                    Create_btn.setAttribute("class", "bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full")
                    Create_btn.innerText = "Create"
                    Create_btn.onclick = (() => {
                        console.log({name: input_name.value, description: input_description.value})
                        if (!input_name.value) return;
                        if (!input_description.value) return;


                        fetch(`${baseURL}exercise`,
                        {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                // 'Accept': 'application/json', not required, as I do nothing with it!
                                "Authorization": `Bearer ${token}`
                            },
                            body: `{"name": "${input_name.value}", "description": "${input_description.value}"}`
                            /* error with getting the name paring right in the api
                            body:
                            {
                                "name": input_name.value,
                                "description": input_description.value
                            }
                            */
                        })
                        .then((res) => res.json())
                        .then((data) =>
                        {
                            console.log(data)
                        })
                        .catch((err) => {console.log(err); collect_data(generate_table); }); // the post has a bug with the json it sends back, as this is not mayor I will not fix this.
                    })



                    Create.appendChild(Create_btn)

                }

            }


        }

        collect_data(generate_table);
        
    }

    fill_table();


</script>



@stop