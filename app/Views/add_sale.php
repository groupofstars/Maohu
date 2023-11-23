<?=$header;?>

<form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo1/dist/apps/ecommerce/catalog/categories.html">

    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <!--begin::General options-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Sale record</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Date</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="date"  name="date_time" class="form-control mb-2" placeholder="Select date" value="" />
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Select the date of sale.</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Outlet</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="outlet_id" class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option">
                        <?php foreach ($outlets as $outlet): ?>
                            <option value="<?php echo $outlet['id'] ?>" ><?php echo $outlet['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Select a outlet of sale.</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Qty</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="Qty" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                   
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Pax</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="Pax" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                   
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Gross</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="Gross" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Discount</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="Discount" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">SST</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="SST" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">SC</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="SC" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Other charge</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="OtherCharge" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Delivery fee</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="Deliveryfee" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Rounding</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="Rounding" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Nett</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="Nett" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Cash Total</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="CASHTotal" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Credit Total</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="CREDITTotal" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Credit Card Total</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="CREDITCARDTotal" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Debit Card Total</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="DEBIT_CARDTotal" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Duitnow Total</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="DUITNOWTotal" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Feedme Total</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="FEEDMETotal" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label">MayBank Total</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="MAYBANKQRTotal" class="form-control mb-2" placeholder="Input value" value="0" />
                    <!--end::Input-->
                    
                </div>
                <!--end::Input group-->

                
            </div>
            <!--end::Card header-->
        </div>
        <!--end::General options-->
        
        
        <div class="d-flex justify-content-end">
            <!--begin::Button-->
            <a href="" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                <span class="indicator-label">Save Changes</span>
                <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Button-->
        </div>
    </div>
    <!--end::Main column-->
</form>


<?=$footer?>
<script>
$(document).ready(function(){
    (()=>{
        let e;
        const t=document.getElementById("kt_ecommerce_add_category_form"),
        o=document.getElementById("kt_ecommerce_add_category_submit");
        e=FormValidation.formValidation(t,{
            fields:{
                date_time:{
                    validators:{
                        notEmpty:{message:"Date is required"}
                    }
                },
                outlet_id:{
                    validators:{
                        notEmpty:{message:"outlet is required"}
                    }
                }
            },
            plugins:{
                trigger:new FormValidation.plugins.Trigger,
                bootstrap:new FormValidation.plugins.Bootstrap5({
                    rowSelector:".fv-row",
                    eleInvalidClass:"",
                    eleValidClass:""
                })
            }
        }),
        o.addEventListener("click",(a=>{
            a.preventDefault(),
            e&&e.validate().then((function(e){
                console.log("validated!"),
                "Valid"==e ? (
                    o.setAttribute("data-kt-indicator","on"),
                    // o.disabled=!0,
                    setTimeout((function(){
                        o.removeAttribute("data-kt-indicator");

                        var formData = new FormData(t);

                        // Convert form data to JSON
                        var jsonData = {};
                        formData.forEach(function(value, key) {
                            
                            jsonData[key] = value;
                        });
                        

                        $.ajax({
                            url: "/sale_insert",
                            method: "POST",
                            data:jsonData, // Convert ,
                            // async: false,
                            success: function(res){ 
                                console.log(res);
                                if(res=="success"){
                                    Swal.fire({
                                        text:"Data has been successfully recorded!",
                                        icon:"success",
                                        buttonsStyling:!1,
                                        confirmButtonText:"Ok, got it!",
                                        customClass:{
                                            confirmButton:"btn btn-primary"
                                        }
                                    }).then((function(e){
                                        e.isConfirmed&&(o.disabled=!1,t.reset())
                                    }))
                                }
                                else {

                                    Swal.fire({
                                        text:"There is an error with backend",
                                        icon:"error",
                                        buttonsStyling:!1,
                                        confirmButtonText:"Ok, got it!",
                                        customClass:{
                                            confirmButton:"btn btn-primary"
                                        }
                                    })
                                }
                                                
                            }, 
                            error: function(res){
                                    toastr.error("error");
                            }
                        });

                        
                    }),2e3))
                    : Swal.fire({
                        text:"Sorry, looks like there are some errors detected, please try again.",
                        icon:"error",
                        buttonsStyling:!1,
                        confirmButtonText:"Ok, got it!",
                        customClass:{confirmButton:"btn btn-primary"}
                    })
            }))
        }))
    })();
});
</script>