
let $ = require('jquery');
let dt = require('datatables.net')();

$(document).ready(function () {
    let tournamentTable = $(".tournament-widget-table");
    if (tournamentTable)
    {
        let tableData = tournamentTable.children("tbody").attr("aibvcs-table-data");
        tournamentTable.DataTable({
            data: JSON.parse(tableData)
        });
        console.log(tableData);
    }
});