@extends('layout')
@section('title')
    Residuos Generados

@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('css/') }}">




    <!-- CUSTOM JS -->
    <script>
        let dataTable;
        let dataTableIsInitialized = false;

        const dataTableOptions = {
            columnDefs: [
                { className: "centered", targets: [0, 1, 2, 3, 4] },
                { orderable: false, targets: [5] }
            ],
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50],
            destroy: true,
            language: {
                lengthMenu: "Mostrar MENU registros por página",
                zeroRecords: "Ningún registro encontrado",
                info: "Mostrando de START a END de un total de TOTAL registros",
                infoEmpty: "Ningún registro encontrado",
                infoFiltered: "(filtrados desde un total de MAX registros)",
                search: "Buscar:",
                loadingRecords: "Cargando...",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior",
                },
            },
        };

        const initDataTable = async () => {
            if (dataTableIsInitialized) {
                dataTable.destroy();
            }
            await listRecords();

            dataTable = $("#dataTable_records").DataTable(dataTableOptions);
            dataTableIsInitialized = true;
        };

        const listRecords = async () => {
            try {
                const response = await fetch("/api/dashBoardData.php"); // Ajusta la ruta a tu endpoint API

                const records = await response.json();

                let content = "";
                records.forEach((record, index) => {
                    content += `
                        <tr>
                            <td class="centered">${index + 1}</td>
                            <td class="centered">${record.nombre}</td>
                            <td class="centered">${record.descripcion}</td>
                            <td class="centered">${record.peligroso}</td>
                            <td class="centered">${record.codigo_residuo}</td>
                            <td>
                                <a href="/admin/edit/editAutoa/${record.id}">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    `;
                });

                document.getElementById("tableBody_records").innerHTML = content;
            } catch (error) {
                alert("Error al cargar los registros: " + error);
            }
        };

        window.addEventListener("load", async () => {
            await initDataTable();
        });
    </script>
@endsection

@section('content')
<div class="container my-4">
    
    <h1>Residuoak</h1>
    <div style="text-align: right; margin-bottom: 10px;">
        <a href="/">//TODO
            <button class="btn btn-primary">Residuo bat gehitu</button>
        </a>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table id="dataTable_records" class="table table-striped">
                <thead>
                    <tr>
                        <th class="centered">#</th>
                        <th class="centered">Nombre</th>
                        <th class="centered">Descripción</th>
                        <th class="centered">Peligroso</th>
                        <th class="centered">Codigo residuo</th>
                    </tr>
                </thead>
                <tbody id="tableBody_records">
                </tbody>
            </table>
        </div>
    </div>

    @if ($errors->any())
        <h5 class="alert">{{ implode('', $errors->all(':message')) }}</h5>
        @endif
    </div>

@endsection