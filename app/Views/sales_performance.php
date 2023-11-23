<?= $header ?>

<!--begin::Products-->
<div class="card card-flush">
    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Order" />
            </div>
            <!--end::Search-->
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <!--begin::Flatpickr-->
            <div class="input-group w-250px">
                <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
                <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor" />
                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
            </div>
            <!--end::Flatpickr-->
            <div class="w-100 mw-150px">
                <!--begin::Select2-->
                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Outlet" data-kt-ecommerce-order-filter="status">
                    <option></option>
                    <option value="all">All</option>
                    
                    <?php foreach($outlets as $item): ?>
                        <option value="<?=$item['name']?>"><?=$item['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <!--end::Select2-->
            </div>
            <!--begin::Add product-->
            <?php if ($user['permission'] == 'Admin'): ?>
                <a href="/add_sale" class="btn btn-primary">Add Sale record</a>
            <?php endif; ?>
            <!--end::Add product-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
        <tfoot>
            <tr class="fw-bolder fs-6">
                <th colspan="6" class="text-nowrap align-end">Total:</th>
                <th colspan="3"  class="text-danger fs-3"></th>
            </tr>
        </tfoot>
        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Products-->
<br>
    <div class="col-12">
        <div class="card card-bordered">
            <div class="card-body">
                <div id="kt_amcharts_2" style="height: 500px;"></div>
            </div>
        </div>
    </div>





<?= $footer ?>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<!-- <!-- <script src="https://cdn.amcharts.com/lib/5/radar.js"></script> -->
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<script>
    var outlets_name=[];
    $.ajax({
        url: "/get_outlets",
        method: "POST",
        data: {
        },
        async: false,
        success: function(res){ 
            var respond=JSON.parse(res);
            respond.forEach((fruit) => {
               // console.log(fruit.date_time);
                
               outlets_name[fruit.id]=fruit.name;
            });
                            
        }, 
        error: function(res){
                toastr.error("error");
        }
    });
am5.ready(function () {
    var data = [];
    var price0 = 1000,
        price1 = 1200;
    const currentDate = new Date();
    
    $.ajax({
        url: "/get_sales_by_year",
        method: "POST",
        data: {
            year: currentDate.getFullYear()
            // password: $('#kt_free_trial_form input[name="password"]').val(),
            // password_confirmation: $('#kt_free_trial_form input[name="confirm-password"]').val()
        },
        async: false,
        success: function(res){ 
            
            var respond=JSON.parse(res);
            respond.forEach((fruit) => {
               // console.log(fruit.date_time);
                price0 =Number(fruit.Gross);
                data.push({ date0: (new Date(fruit.date_time)).getTime(), price0: price0 });
            });
                            
        }, 
        error: function(res){
                toastr.error("error");
        }
    });
    $.ajax({
        url: "/get_sales_by_year",
        method: "POST",
        data: {
            year: currentDate.getFullYear()-1
            // password: $('#kt_free_trial_form input[name="password"]').val(),
            // password_confirmation: $('#kt_free_trial_form input[name="confirm-password"]').val()
        },
        async: false,
        success: function(res){ 
            
            var respond=JSON.parse(res);
            respond.forEach((fruit) => {
               // console.log(fruit.Gross);
                price1 =Number(fruit.Gross);
                data.push({ date1: (new Date(fruit.date_time)).getTime(), price1: price1 });
            });
                            
        }, 
        error: function(res){
                toastr.error("error");
        }
    });
    
   

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("kt_amcharts_2");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
        am5themes_Animated.new(root)
    ]);

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX"
        })
    );

    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
        behavior: "none"
    }));
    cursor.lineY.set("visible", true);

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis0 = chart.xAxes.push(
        am5xy.DateAxis.new(root, {
            baseInterval: { timeUnit: "day", count: 1 },
            renderer: am5xy.AxisRendererX.new(root, {}),
            tooltip: am5.Tooltip.new(root, {}),
            tooltipDateFormat: "yyyy-MM-dd"
        })
    );

    var xAxis1 = chart.xAxes.push(
        am5xy.DateAxis.new(root, {
            marginTop: 10,
            baseInterval: { timeUnit: "day", count: 1 },
            renderer: am5xy.AxisRendererX.new(root, {}),
            tooltip: am5.Tooltip.new(root, {}),
            tooltipDateFormat: "yyyy-MM-dd"
        })
    );

    var yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            maxDeviation: 1,
            renderer: am5xy.AxisRendererY.new(root, { pan: "zoom" })
        })
    );

    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series0 = chart.series.push(
        am5xy.LineSeries.new(root, {
            name: "Series",
            xAxis: xAxis0,
            yAxis: yAxis,
            valueYField: "price0",
            valueXField: "date0",
            fill: am5.color(0xff52ff),
            stroke: am5.color(0xff5256),
            strokeWidth: 300,
            strokeDasharray: [10,5],
            fillOpacity: 0.9,
            tooltip: am5.Tooltip.new(root, {
                labelText: "{valueY}"
            })
        })
    );

    var series1 = chart.series.push(
        am5xy.LineSeries.new(root, {
            name: "Series",
            xAxis: xAxis1,
            yAxis: yAxis,
            valueYField: "price1",
            valueXField: "date1",
            fill: am5.color(0x040945),
            stroke: am5.color(0x040945),
            tooltip: am5.Tooltip.new(root, {
                labelText: "{valueY}"
            })
        })
    );
    // series1.set("fill", am5.color(0xff0000));
    // series1.set("colors", [
    //     am5.color(0xff5256),
    //     am5.color(0x087f8c),
    //     am5.color(0x5aaa95),
    //     am5.color(0x86a873),
    //     am5.color(0xbb9f06)
    // ]);
    // Add scrollbar
    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
    var scrollbar = chart.set("scrollbarX", am5xy.XYChartScrollbar.new(root, {
        orientation: "horizontal",
        height: 60
    }));

    var sbDateAxis = scrollbar.chart.xAxes.push(
        am5xy.DateAxis.new(root, {
            baseInterval: {
                timeUnit: "day",
                count: 1
            },
            renderer: am5xy.AxisRendererX.new(root, {})
        })
    );

    var sbValueAxis = scrollbar.chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {})
        })
    );

    var sbSeries = scrollbar.chart.series.push(
        am5xy.LineSeries.new(root, {
            valueYField: "price0",
            valueXField: "date0",
            xAxis: sbDateAxis,
            yAxis: sbValueAxis
        })
    );

    series0.data.setAll(data);
    series1.data.setAll(data);
    sbSeries.data.setAll(data);

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series0.appear(10000);
    series1.appear(10000);
    chart.appear(10000, 1000);

}); // end am5.ready()

$(document).ready(function() {

    // $("#kt_datatable_example_5").DataTable({
    //     responsive: true,
    //     select:true,
    //     "scrollX": true,
    //     // select: {
    //     //     style: 'multi',
    //     //     selector: 'td:first-child input[type="checkbox"]',
    //     //     className: 'row-selected'
    //     // },
    //     // searchDelay: 500,
    //     // processing: true,
    //     // order: [[5, 'desc']],
    //     // stateSave: true,
    //     // "language": {
    //     //     "lengthMenu": "Show _MENU_",
    //     // },
    //     // "pageLength": 50,
    //     columns: [
    //         // {data:'id',title:'ID'},
    //         { data: 'date_time', title:'Date' },
    //         { data: 'Gross',title:'Gross' },
    //         { data: 'Discount',title:'Discount' },
    //         { data: 'CASHTotal',title:'Discount' },
    //         { data: 'CREDITTotal',title:'Discount' },
    //         { data: 'DEBIT_CARDTotal',title:'Discount' },
    //         { data: 'DUITNOWTotal',title:'Discount' },
    //         { data: 'MAYBANKQRTotal',title:'Discount' },
    //         { data: 'FEEDMETotal',title:'Discount' },
    //     ],
    //     // columnDefs: [
    //     //     {
    //     //         targets: 0,
    //     //         orderable: false,
    //     //         render: function (data) {
    //     //             return `
    //     //                 <div class="form-check form-check-sm form-check-custom form-check-solid">
    //     //                     <input class="form-check-input" type="checkbox" value="${data}" />
    //     //                 </div>`;
    //     //         }
    //     //     },
    //     // ],
    //     // serverSide: true,
    //     ajax: {
    //         url: '/get_sales',
    //         type: 'POST'
    //     },
    //     // data:{url:"/get_sales"},
    //     "dom":
    //         "<'row'" +
    //         "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
    //         "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
    //         ">" +

    //         "<'table-responsive'tr>" +

    //         "<'row'" +
    //         "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
    //         "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
    //         ">"
            
    //         ,
    //     "footerCallback": function(row, data, start, end, display) {
    //         var api = this.api(),
    //             data;

    //         // Remove the formatting to get integer data for summation
    //         var intVal = function(i) {
    //             return typeof i === "string" ?
    //                 i.replace(/[\$,]/g, "") * 1 :
    //                 typeof i === "number" ?
    //                 i : 0;
    //         };

    //         // Total over all pages
    //         var total = api
    //             .column(4)
    //             .data()
    //             .reduce(function(a, b) {
    //                 return intVal(a) + intVal(b);
    //             }, 0);

    //         // Total over this page
    //         var pageTotal = api
    //             .column(8, {
    //                 page: "current"
    //             })
    //             .data()
    //             .reduce(function(a, b) {
    //                 return intVal(a) + intVal(b);
    //             }, 0);

    //         // Update footer
    //         $(api.column(8).footer()).html(
    //             "$" + pageTotal + " ( $" + total + " total)"
    //         );
    //     }   
    // });
    

    var e,t,n,r,o,a=(e,n,a)=>{
        r=e[0] ? new Date(e[0])  :  null,
        o=e[1] ? new Date(e[1])  :  null,
        $.fn.dataTable.ext.search.push((function(e,t,n){
            var a=r,c=o,l=new Date(moment(t[0],"YYYY-MM-DD")),
            u=new Date(moment(t[0],"YYYY-MM-DD"));
            return null===a && null===c || null===a && c>=u||a<=l&&null===c||a<=l&&c>=u
        })),
        t.draw()
    };
    c=()=>{e.querySelectorAll('[data-kt-ecommerce-order-filter="delete_row"]').forEach((e=>{
        e.addEventListener("click",(function(e){
            e.preventDefault();
            const n=e.target.closest("tr"),
            r=n.querySelector('[data-kt-ecommerce-order-filter="order_id"]').innerText;
            Swal.fire({
                text:"Are you sure you want to delete order: "+r+"?",
                icon:"warning",
                showCancelButton:!0,
                buttonsStyling:!1,
                confirmButtonText:"Yes, delete!",
                cancelButtonText:"No, cancel",
                customClass:{
                    confirmButton:"btn fw-bold btn-danger",
                    cancelButton:"btn fw-bold btn-active-light-primary"
                }
            }).then((function(e){
                e.value ? Swal.fire({
                    text:"You have deleted "+r+"!.",
                    icon:"success",
                    buttonsStyling:!1,
                    confirmButtonText:"Ok, got it!",
                    customClass:{
                        confirmButton:"btn fw-bold btn-primary"
                    }
                }).then((function(){
                    t.row($(n)).remove().draw()
                })) : "cancel"===e.dismiss&&Swal.fire({
                    text:r+" was not deleted.",
                    icon:"error",
                    buttonsStyling:!1,
                    confirmButtonText:"Ok, got it!",
                    customClass:{
                        confirmButton:"btn fw-bold btn-primary"
                    }
                })
            }))
        }))
    }))};
    // console.log(outlets_name);
    (e=document.querySelector("#kt_ecommerce_sales_table"))
    &&
    (
        (t=$(e).DataTable({
            info:!1,
            order:[],
            pageLength:10,
            columnDefs:[
                {
                    // orderable:!1,
                    targets:1,
                    render:function(e){
                        
                    return "\n"+outlets_name[e];
                    }
                },
                // {orderable:!1,targets:7}
            ],
            ajax: {
                url: '/get_sales',
                type: 'POST'
            },
            columns: [
                // {data:'id',title:'ID'},
                { data: 'date_time', title:'Date' },
                { data: 'outlet_id', title:'Outlet' },
                { data: 'Gross',title:'Gross' },
                { data: 'Discount',title:'Discount' },
                { data: 'CASHTotal',title:'Cash' },
                { data: 'CREDITTotal',title:'Credit' },
                { data: 'DEBIT_CARDTotal',title:'Debit' },
                { data: 'DUITNOWTotal',title:'Duitnow' },
                { data: 'MAYBANKQRTotal',title:'MayBankQR' },
                { data: 'FEEDMETotal',title:'FeedMe' },
            ],
            
            "footerCallback": function(row, data, start, end, display) {
            var api = this.api(),
                data;

            // Remove the formatting to get integer data for summation
            var intVal = function(i) {
                return typeof i === "string" ?
                    i.replace(/[\$,]/g, "") * 1 :
                    typeof i === "number" ?
                    i : 0;
            };

            // Total over all pages
            var total = api
                .column(4)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            var pageTotal = api
                .column(8, {
                    page: "current"
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(8).footer()).html(
                "$" + pageTotal + " ( $" + total + " total)"
            );
        }   

        })).on("draw",(function(){
            c()
        })),
        (()=>{
            const e=document.querySelector("#kt_ecommerce_sales_flatpickr");
            n=$(e).flatpickr({
                altInput:!0,
                altFormat:"d/m/Y",
                dateFormat:"Y-m-d",
                mode:"range",
                onChange:function(e,t,n){
                    // alert(e);
                    // alert(e[0]);
                    // alert(e[1]);
                    a(e,t,n)
                }
            })
        })(),
        document.querySelector('[data-kt-ecommerce-order-filter="search"]').addEventListener("keyup",(function(e){t.search(e.target.value).draw()})),  //search
        (()=>{
            const e=document.querySelector('[data-kt-ecommerce-order-filter="status"]');                        //fiter
            $(e).on("change",(e=>{
                let n=e.target.value;
                "all"===n&&(n=""),
                t.column(1).search(n).draw()
            }))
        })(),
        c(),
        document.querySelector("#kt_ecommerce_sales_flatpickr_clear").addEventListener("click",(e=>{n.clear()}))
    )


});
</script>