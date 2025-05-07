@extends('layout')
@section('title')
    Dashboard

@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('css/') }}">




    <!-- CUSTOM JS -->
    <script>
        let dataTable;
        let dataTableIsInitialized = false;

        const dataTableOptions = {
            columnDefs: [
                { className: "centered", targets: [0, 1, 2, 3, 4, 5, 6, 7, 8] },
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
                            <td class="centered">${record.numero_activo}</td>
                            <td class="centered">${record.tipo_inventario}</td>
                            <td class="centered">${record.CE}</td>
                            <td class="centered">${record.adecuacion_RD1215_97}</td>
                            <td class="centered">${record.notas}</td>
                            <td class="centered">${record.unidad_gestion_id}</td>
                            <td class="centered">${record.espacio_id}</td>
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
    
    <h1>Makinak</h1>
    <div style="text-align: right; margin-bottom: 10px;">
        <a href="/">//TODO
            <button class="btn btn-primary">Makina bat gehitu</button>
        </a>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table id="dataTable_records" class="table table-striped">
                <thead>
                    <tr>
                        <th class="centered">#</th>
                        <th class="centered">Nombre</th>
                        <th class="centered">Numero activo</th>
                        <th class="centered">Tipo inventario</th>
                        <th class="centered">CE</th>
                        <th class="centered">Adecuacion RD1215 97</th>
                        <th class="centered">Notas</th>
                        <th class="centered">Unidad gestion id</th>
                        <th class="centered">Espacio id</th>
                        <th class="centered">Akziok</th>
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
   




