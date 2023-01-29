<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Users</title>

    <script>
    const Post_request = async (url = '', data = {}) =>
    {

            let Token = {"_token": "{{csrf_token()}}"};
            let T_data = Object.assign(data, Token)

            const response = await fetch(url, {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(T_data)
            });
            
            return response.json();
    }

    const login = () =>
    {
        // first one is for testing, seccond one for live
        const baseURL = "http://localhost:8000/api/"
        //    const baseURL = "https://basbobby.nl/SummaMove/public/api/";
        let email = document.getElementById("email").value ?? false;
        let password = document.getElementById("password").value ?? false;

        console.log(email + "\n" + password)
        rightdata = email != false ? password != false ? "" : "password or email is not filled in" : "password or email is not filled in"
        if (rightdata == "")
        {
            Post_request(`${baseURL}login`, { email: email, password: password })
            .then((data) => {
                document.cookie = `token=${data.access_token}`
                console.log(data)
            });
        }
        else
        {
            alert(rightdata)
        }

    }
    </script>

    <style>
.dropbtn {
  background-color: #757171;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #656161;}
</style>
</head>
<body class="h-screen bg-gradient-to-b from-gray-500 to-gray-600">

    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <div>
                <ul class="flex flex-row md:space-x-4 md:mt-0 md:text-sm md:font-medium">
                    <li class="">
                        <a href="/" class="flex items-center">
                            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Summa Move</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn">Users</button>
                            <div class="dropdown-content">
                                <a href="/user">Users</a>
                                <a href="/user/create">Create New User</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn">Exercise</button>
                            <div class="dropdown-content">
                                <a href="/exercise">Exercise</a>
                                <a href="/exercise/create">Create New Exercise</a>
                            </div>
                        </div>
                    </li>
                    <li>
                            <div class="dropdown">
                            <button class="dropbtn">Login</button>
                            <form class="dropdown-content">
                                <label for="email">E-mail:</label><br>
                                <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                                <label for="password">Password:</label><br>
                                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                                <button type="Button" onclick="login()">Login</button>
                                </form>
                            </div>
                            

                    </li>
                </ul>
            </div>
            </div>
        </div>
    </nav>
    <div class="container flex flex-wrap justify-between items-center mx-auto px-8 py-8">
        @yield('content')
    </div>
</body>