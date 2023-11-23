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
                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Product" />
            </div>
            <!--end::Search-->
        </div>
        <!--end::Card title-->
        
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
                        </div>
                    </th>
                    <th>Email</th>
                    <th >Permission</th>
                    <th >Action</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-bold text-gray-600">
                
                
            </tbody>
            <!--end::Table body-->
        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Products-->
<?= $footer ?>
<script>
   var KTAppEcommerceProducts=function(){
    var t,e,o=()=>{
        t.querySelectorAll('[data-kt-ecommerce-product-filter="delete_row"]').forEach(
            (t=>{
                t.addEventListener("click",(
                    function(t){
                        t.preventDefault();
                        const o=t.target.closest("tr"),
                        n=o.querySelector('[data-kt-ecommerce-product-filter="product_name"]').innerText;
                        Swal.fire({
                            text:"Are you sure you want to delete "+n+"?",
                            icon:"warning",
                            showCancelButton:!0,
                            buttonsStyling:!1,
                            confirmButtonText:"Yes, delete!",
                            cancelButtonText:"No, cancel",
                            customClass:{
                                confirmButton:"btn fw-bold btn-danger",
                                cancelButton:"btn fw-bold btn-active-light-primary"
                            }
                        }).then((function(t){
                            t.value?Swal.fire(
                                {
                                    text:"You have deleted "+n+"!.",
                                    icon:"success",
                                    buttonsStyling:!1,
                                    confirmButtonText:"Ok, got it!",
                                    customClass:{
                                        confirmButton:"btn fw-bold btn-primary"
                                    }}).then((
                                        function(){
                                            e.row($(o)).remove().draw()
                                        }
                                    )) : "cancel"===t.dismiss&&Swal.fire({
                                        text:n+" was not deleted.",
                                        icon:"error",
                                        buttonsStyling:!1,
                                        confirmButtonText:"Ok, got it!",
                                        customClass:{confirmButton:"btn fw-bold btn-primary"}
                                    })
                                }
                            ))
                    }
                ))
            })
        )
    };
    return{
        init:function(){
            (t=document.querySelector("#kt_ecommerce_products_table")) && 
            (
                (e=$(t).DataTable(
                    {
                        info:!1,
                        order:[],
                        pageLength:10,
                        select: {
                            style: 'multi',
                            selector: 'td:first-child input[type="checkbox"]',
                            className: 'row-selected'
                        },
                        ajax: {
                            url: "/get_users",
                            type: 'POST',
                        },
                        columnDefs:[
                            // {orderable:!1,targets:0},
                            {
                                // orderable:!1,
                                targets:3,
                                render: function(e){
                                    
                                    return '\n<button type="button" class="btn btn-danger" del_id=' + e + ' ><i class="fa fa-trash"></i></button>';
                                }
                            },
                            {
                                // orderable:!1,
                                targets:2,
                                render: function(e){
                                    if(e==="Admin") return '\n<select  class="btn " ><option value="Admin" selected >Admin</option><option value="Normal"  >Normal</option><option value="Requested"  >Requested</option></select>';
                                    if(e==="Normal") return '\n<select  class="btn " ><option value="Admin"  >Admin</option><option value="Normal" selected >Normal</option><option value="Requested"  >Requested</option></select>';
                                    if(e==="Requested") return '\n<select  class="btn " ><option value="Admin"  >Admin</option><option value="Normal"  >Normal</option><option value="Requested" selected  >Requested</option></select>';
                                }
                            }
                        ],
                        columns: [
                            // {data:'id',title:'ID'},
                            { data: 'id', title:'ID' },
                            { data: 'email', title:'Email' },
                            { data: 'permission',title:'Permission' },
                            { data: 'id', title: 'Action' }
                        ],
                    }
                )).on("draw",(function(){
                    o()
                })),
                document.querySelector('[data-kt-ecommerce-product-filter="search"]').addEventListener("keyup",(
                    function(t){
                        e.search(t.target.value).draw()
                    }
                )),
                (
                    ()=>{
                        const t=document.querySelector('[data-kt-ecommerce-product-filter="status"]');
                        $(t).on("change",(
                            t=>{
                                let o=t.target.value;
                                "all"===o&&(o=""),
                                e.column(6).search(o).draw()
                            }
                        ))
                    }
                )(),
                o()
            )
        }
    }
}();

KTUtil.onDOMContentLoaded(
    (
        function(){
            KTAppEcommerceProducts.init()
        }
    )
);
$(document).ready(function(){
    $("table").on('click','button.btn-danger',function() {
        // $(this).closest('tr').remove();
        success=false;
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, proceed',
            cancelButtonText: 'No, cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/delete_user",
                    method: "POST",
                    data: {
                        id:$(this).attr("del_id")
                    },
                    async: false,
                    success: function(res){ 
                        if(res=="success"){
                            success=true;
                            toastr.info("User deleted successfully");
                            
                        }else{
                            toastr.error("error deleting in backend");
                        }
                                    
                    }, 
                    error: function(res){
                        
                        toastr.error("error");
                    }
                });
                if(success) $(this).closest('tr').remove();
            } else {
                // User canceled the action
                // ...
            }
        });
        
    });
    $("table").on('change','select',function() {
        
        $.ajax({
            url: "/change_user_permission",
            method: "POST",
            data: {
                id:$(this).parent().parent().children('td:first').text(),
                permission:this.value,
            },
            // async: false,
            success: function(res){ 
                if(res=="success"){
                    success=true;
                    toastr.info("User role changed successfully");
                    
                }else{
                    toastr.error("error in backend");
                }
                            
            }, 
            error: function(res){
                
                toastr.error("error");
            }
        });
    });
});
</script>