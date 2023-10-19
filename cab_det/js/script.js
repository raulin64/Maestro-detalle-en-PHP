const $btnExportar = document.querySelector("#btnExportar"),
    $myTable = document.querySelector("#myTable");

$btnExportar.addEventListener("click", function() {
    let tableExport = new TableExport($myTable, {
        exportButtons: false, // No queremos botones
        filename: "Mi tabla de Excel", //Nombre del archivo de Excel
        sheetname: "Mi tabla de Excel", //Título de la hoja
    });
    let datos = tableExport.getExportData();
    let preferenciasDocumento = datos.myTable.xlsx;
    tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
});