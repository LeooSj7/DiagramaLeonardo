@section('title', 'Diagram Edit')
@section('script-css')

    <link rel="stylesheet" type="text/css" href="{{ asset('lib/diagram/src/styles.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/loader-page.css') }}"> --}}
    <script defer src="{{ asset('js/prueba.js') }}" type="text/javascript"></script>


    {{-- Socket IO --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.1/socket.io.js"
        integrity="sha512-9mpsATI0KClwt+xVZfbcf2lJ8IFBAwsubJ6mI3rtULwyM3fBmQFzj0It4tGqxLOGQwGfJdk/G+fANnxfq9/cew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script type="importmap">
            {
              "imports": {
                "socket.io-client": "https://cdn.socket.io/4.4.1/socket.io.esm.min.js"
              }
            }
    </script>
    <script type="module">
        import { io } from "socket.io-client";

         const socket = io("http://127.0.0.1:3001/", {
             transports: ["websocket"]
         });

        /* const socket = io("https://soketio-diagramador-production.up.railway.app/", {
            transports: ["websocket"]
        }); */

        // const socket = io("https://diagram-socket.herokuapp.com/", {
        //     transports: ["websocket"]
        // });

        const id = document.getElementById('id_diagram').value
        const name_user = document.getElementById('name_user').value
        const email_user = document.getElementById('email_user').value
        const btn = document.querySelector('#btn-1')
        
        const btnAudio = document.getElementById('btnAudio')
        const audio = document.getElementById('audio')
        

        btnAudio.addEventListener('click', () => {
            audio.play();
        })
        

        const data_user = [name_user, email_user, id]
        socket.emit('join-room', id, data_user);

        btn.addEventListener('click', () => {
            socket.emit('diagram', document.getElementById("text-area-1").value, id);
        });

        // Escucha los movimientos del diagrama 
        socket.on('return-diagram', (data) => {
            //console.log(data);
            document.getElementById('text-area-2').value = data;
            document.querySelector('#btn-render').click();
        });

        // Indica el usuario conectado
        socket.on('new-connection-user', (users) => {
            document.getElementById('btnAudio').click()
            let Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: users[0] + ' ha entrado a la sala...'
            })
        })

        socket.on('new-desconnection-user', (user_name) => {
            let Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
            icon: 'success',
            title: user_name + ' se ha desconectado...'
            })
        })

        // Escucha de nuevos usuarios conectados
        socket.on('new-connection', (users) => {
            const divPadre = document.getElementById('collaborators')
            divPadre.innerHTML = ''

            for (var i = 0; i < users.length; i++) {
                if (users[i][2] == id) {
                    let divUser = document.createElement("div")
                    divUser.classList.add('flex', 'p-3', 'text-sm','rounded-lg', 'text-gray-700', 'bg-gray-300', 'border-gray-400', 'border-2', 'shadow-md', 'hover:shadow-lg', 'mx-3', 'mb-4')
                    
                    let imgUser = document.createElement("img")
                    imgUser.classList.add('rounded-full')
                    imgUser.src = "https://static.vecteezy.com/system/resources/previews/019/896/008/non_2x/male-user-avatar-icon-in-flat-design-style-person-signs-illustration-png.png"
                    imgUser.width = 30
                    imgUser.heigth = 30
                    divUser.appendChild(imgUser)

                    let divUserSecond = document.createElement("div")
                    divUserSecond.classList.add('block', 'ml-2')
                    
                    divUserSecond.insertAdjacentHTML("beforeend", `<p class="text-md text-gray-700">${users[i][0]}</p>`)

                    divUserSecond.insertAdjacentHTML("beforeend", `<p class="text-xs text-gray-500">${users[i][1]}</p>`)

                    divUser.appendChild(divUserSecond)

                    divPadre.appendChild(divUser)
                }
            }
        })

        function cutString(word) {
            var result_word, count_space = 0
            var index

            for (var i = 0; i < word.length; i++) {
                if (word[i] == ' ') {
                    count_space = count_space + 1
                    if (count_space == 2) {
                        index = i
                        break
                    }
                    
                }
            }

            if (!index)
                return word
            return word.substr(0, index)
        } 

        // Conexion del cliente al servidor
        // const socket = io("https://react-socket-server-tjms.herokuapp.com/", {
        //     transports: ["websocket"]
        // });
    </script>
@endsection

<x-app-layout>

    <div id="app" class="flex">
        <div class="canvas relative flex-1 bg-radial-gradient rounded-none">
          <div class="  relative top-0 left-0 pt-2 pr-3">
            
            <button id="btn-exportar" data-tipoGestorDB="" class="bg-gray-600 hover:bg-gray-600 text-black  py-2 px-4 rounded-none">Descargar codigo SQL</button>
            <select id="databaseSelect" class="block w-1/3 bg-white border border-gray-300 text-gray-600 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-700 sm:text-sm">
                <option value="postgresql">PGSQL</option>
                <option value="sqlserver">SQLServer</option>
                <option value="mysql">MySQL</option>
            </select>
            
            <button id="btn-guardar" class="bg-gray-600 hover:bg-gray-700 text-black  py-2 px-4 rounded-none">Aceptar cambios</button>
            @livewire('diagrama.diagram-mostrar-script');
        </div>
          <!-- Contenido del lienzo -->
        </div>
        
        </div>
    </div>

   
    @livewire('diagrama.diagram-update', ['diagram' => $diagram]);
     
 
       
    <script src="{{ asset('lib/diagram/dist/bundle.js') }}"></script>
</x-app-layout>
