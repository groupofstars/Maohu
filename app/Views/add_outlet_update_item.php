<?= $header ?>
<form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo1/dist/apps/ecommerce/catalog/categories.html">
    <!--begin::Aside column-->
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <!--begin::Thumbnail settings-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Thumbnail</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body text-center pt-0">
                <!--begin::Image input-->
                <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="background-image: url(assets/media/svg/files/blank-image.svg)">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-150px h-150px"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <!--begin::Icon-->
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--end::Icon-->
                        <!--begin::Inputs-->
                        <input type="file" id="asdf" name="avatar" accept=".png, .jpg, .jpeg" />
                        <!-- <input type="hidden" name="avatar_remove" /> -->
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
                <!--end::Description-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Thumbnail settings-->
        <!--begin::Status-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Status</h2>
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                </div>
                <!--begin::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Select2-->
                <select name="status" class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" >
                    <option></option>
                    <option value="Published" selected="selected">Published</option>
                    <option value="Scheduled">Scheduled</option>
                    <option value="Unpublished">Unpublished</option>
                </select>
                <!--end::Select2-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Set the category status.</div>
                <!--end::Description-->
                
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Status-->
       
    </div>
    <!--end::Aside column-->
    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <!--begin::General options-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Outlet update</h2>
                </div>
            </div>
            
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Category Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="name" class="form-control mb-2" placeholder="Product name" value="" />
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">A category name is required and recommended to be unique.</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div>
                    <!--begin::Label-->
                    <label class="form-label">Description</label>
                    <!--end::Label-->
                    <!--begin::Editor-->
                    <div id="kt_ecommerce_add_category_description" name="description" class="min-h-200px mb-2"></div>
                    <!--end::Editor-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Set a description to the category for better visibility.</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card header-->
        </div>
        <!--end::General options-->
        
        
        <div class="d-flex justify-content-end">
            <!--begin::Button-->
            <a href="javascript: history.back();" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                <span class="indicator-label">Add</span>
                <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Button-->
        </div>
    </div>
    <!--end::Main column-->
</form>
<?= $footer ?>
<script>
    
    ["#kt_ecommerce_add_category_description"].forEach((e=>{
            let t=document.querySelector(e);
            t&&(t=new Quill(e,{
                modules:{
                    toolbar:[
                        [{header:[1,2,!1]}],
                        ["bold","italic","underline"],
                        ["image","code-block"]
                    ]
                },
                placeholder:"Type your text here...",
                theme:"snow"
            }))
        }));
$(document).ready(function(){
    (()=>{
        let e;
        const t=document.getElementById("kt_ecommerce_add_category_form"),
        o=document.getElementById("kt_ecommerce_add_category_submit");
        e=FormValidation.formValidation(t,{
            fields:{
                name:{
                    validators:{
                        notEmpty:{message:"Date is required"}
                    }
                },
                
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
                        formData.append("description",$(".ql-editor").html());
                        // Convert form data to JSON
                        // var jsonData = {};
                        // formData.forEach(function(value, key) {
                        //     jsonData[key] = value;
                        //     // console.log(key,value);
                        // });
                        

                        $.ajax({
                            url: "/update_item_insert",
                            type: "POST",
                            data:formData, // Convert ,
                            processData: false,
                            contentType: false,
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
                                        document.querySelector('[data-kt-image-input-action="cancel"]').click()
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