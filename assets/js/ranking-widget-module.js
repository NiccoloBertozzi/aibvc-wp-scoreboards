
let $ = require('jquery');
let dt = require('datatables.net')();

$(document).ready(function () {
     let rankingTable = $(".ranking-widget-table");
     if (rankingTable)
     {
          let tableData = rankingTable.children("tbody").attr("aibvcs-table-data");
          rankingTable.DataTable({
               data: JSON.parse(tableData),
               lengthChange: false
          });
     }
});
