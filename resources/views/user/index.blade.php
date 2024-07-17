<!-- resources/views/user/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto mt-5">
        <h2 class="text-2xl mb-4">User List</h2>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Botão para acionar a função create -->
        <a href="{{ route('user.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Create New User</a>
        <a href="{{ url('Welcome-User') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Back to Welcome-User</a>  
        <a href="{{ url('dashboardUser') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Back to Welcome-User</a>  

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">ID</th>
                    <th class="py-2">Name</th>
                    <th class="py-2">Email</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="py-2">{{ $user->id }}</td>
                        <td class="py-2">{{ $user->name }}</td>
                        <td class="py-2">{{ $user->email }}</td>
                        <td class="py-2">
                            <!-- Formulário para excluir usuário -->
                            <form id="formExcluir{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                @csrf
                                <button><a href="{{ route('user.show',['id'=> $user->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Show</a></button>
                                <button><a href="{{ route('user.edit',['id'=> $user->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Edit</a></button>
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                        onclick="confirmarExclusao(event,{{ $user->id }})">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        //Receber o seletor do campo valor
        let inputvalor = document.getElementById('valor');
        //Aguardar o usuário digitar o valor no campo
        inputvalor.addEventListener('input',function(){
            // Obter  o valor atual removendo qualquer caracter que não seja número
            let valueValor = this.value.replace(/[^\d]/g, '');
            // Adicionar os separadores de milhares
            var formatedValor = (valueValor.slice(0,-2).replace(/\B(?=(\d{3})+(?!\d))/g,'.')) + '' + valueValor.slice(-2); 
            // Adicionar a virgula e até dois digitos se houver centavos
            formatedValor = formatedValor.slice(0,-2) + ',' + formatedValor.slice(-2);
            // atualizar o valor do campo
            this.value = formatedValor;            
        });

        function confirmarExclusao(event, contaId){
            event.preventDefault();

            Swal.fire({
                title: "<strong>Tem <u>certeza</u></strong>",
                text: "Você não poderá reverter esta ação.",
                icon: "warning",
                showCancelButton: true,
                cancelButtonColor: '#0d6efd',
                cancelButtonText: 'Cancelar',

                //focusConfirm: false,
                confirmButtonText: 'Confirma Exclusão ?',
                confirmButtonColor: '#dc3545', 
                //confirmButtonAriaLabel: "Thumbs up, great!",
                //cancelButtonAriaLabel: "Thumbs down"
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    //Swal.fire("Saved!", "", "success");
                    document.getElementById(`formExcluir${contaId}`).submit();
                }
            })
        }
    </script>
</body>
</html>
