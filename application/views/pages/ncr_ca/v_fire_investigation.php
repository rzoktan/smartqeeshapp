<style>
    .separator {
        display: flex;
        align-items: center;
        text-align: center;
        text-transform: uppercase;
    }

    /* .separator::before, */
    .separator::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #000;
    }

    .separator:not(:empty)::before {
        margin-right: .25em;
    }

    .separator:not(:empty)::after {
        margin-left: .25em;
    }

    .short-div {
        height: 25px;
        margin-bottom: 10px;
    }
</style>

<link rel="stylesheet" href="<?= base_url('assets/templates') ?>/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="<?= base_url('assets/templates') ?>/css/fishbone/style.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="z-index: -999 !important;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 bg-warning py-2">
                    <h1 style="color: white;"><?= $menu_header ?></h1>
                </div>
                <div class="col-sm-12 py-2 mt-2" style="background-color: rgb(66, 66, 66);">
                    <ol class="breadcrumb  float-sm-left">
                        <li class="breadcrumb-item"><a href="#"><?= $page ?></a></li>
                        <li class="breadcrumb-item text-white"><?= $subpage ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="card">
            <!--TAB-->
            <ul class="nav nav-tabs bg-secondary" id="custom-content-above-tab" role="tablist" style="margin-bottom: -1px;">
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" data-toggle="pill" href="#activity-list" role="tab" aria-controls="custom-content-above-home" aria-selected="true">INVESTIGATION FORM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary" id="custom-content-above-home-tab" data-toggle="pill" href="#tabel-data-activity" role="tab" aria-controls="custom-content-above-home" aria-selected="true">INCIDENT RECORD</a>
                </li>
            </ul>
            <!--/.TAB-->
            <!--TAB CONTENT-->
            <div class="tab-content" id="custom-content-above-tabContent">

                <!--INPUT DATA PERSONAL MCU-->
                <div class="tab-pane fade show active" id="activity-list" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                    <!-- form -->
                    <form class="form-horizontal" method="post" id="formInvestigationFire">
                        <!--card body-->
                        <div class="card-body" style="background-color: #ff000054;">
                            <div class="row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">DATE :</i> </label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>

                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">AREA :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">MACHINE :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>
                            </div>
                            <div class="row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">TIME :</i> </label>
                                <div class="col-sm-2">
                                    <input type="time" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>

                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">PLANT :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">MACHINE :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>
                            </div>

                            <!-- Incident Information -->
                            <div class="separator">Incident Information</div>
                            <div class="row">
                                <!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"> -->
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">INCIDENT DESC :</label>
                                <!-- </div> -->
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><textarea class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea></div>
                                <!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="background-color:red;">Span 2</div> -->
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div"><label for="input" class="col-form-label" style="text-align:right">FIRE LEVEL :</label></div>
                                    <div class="short-div"><label for="input" class="col-form-label" style="text-align:right">SEVERITY LEVEL :</label></div>
                                    <div class="short-div"><label for="input" class="col-form-label" style="text-align:right">RECURRENCE PROABILITY :</label></div>
                                    <div class="short-div"><label for="input" class="col-form-label" style="text-align:right">FIRE FACILITY USED :</label></div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div"><select class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                            <option>-- SELECT --</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select></div>
                                    <div class="short-div"><select class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                            <option>-- SELECT --</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select></div>
                                    <div class="short-div"><select class="form-control form-control-sm" id="incidenLevel" name="incidenLevel" placeholder="TEXT">
                                            <option>-- SELECT --</option>
                                            <option>LOW</option>
                                            <option>MEDIUM</option>
                                            <option>HIGHT</option>
                                            <!-- <option>option 4</option>
                                            <option>option 5</option> -->
                                        </select></div>
                                    <div class="short-div"><select class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                            <option>-- SELECT --</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select></div>
                                    <div class="short-div"><select class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                            <option>-- SELECT --</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">ACTION TAKEN :</label>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea></div>
                            </div>


                            <div class="separator">ROUTE COUSE ANALYSIS</div>
                            <!-- Fish bone diagram -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="feature-box">
                                            <strong class=""> MANPOWER : </strong>
                                            <select class="form-control form-control-sm multiple-checkboxes" multiple="multiple" id="input_manpower" name="input_manpower" position="top">
                                                <option value="MANPOWER_1">option 1</option>
                                                <option value="MANPOWER_2">option 2</option>
                                                <option value="MANPOWER_3">option 3</option>
                                                <option value="MANPOWER_4">option 4</option>
                                                <option value="MANPOWER_5">option 5</option>
                                            </select>
                                        </div>
                                        <div class="row" style="margin-right:-10% !important; margin-left:17% !important;">
                                            <svg>
                                                <line x1="0" y1="0" x2="200" y2="200" style="stroke:rgb(120,120,120);stroke-width:3.5" />
                                                <g id="g_input_manpower" font-size="12" transform="translate(5)">
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="feature-box">
                                            <strong class=""> METHODE : </strong>
                                            <select class="form-control form-control-sm multiple-checkboxes" multiple="multiple" id="input_method" name="input_method" position="top">
                                                <option value="METHODE_1">option 1</option>
                                                <option value="METHODE_2">option 2</option>
                                                <option value="METHODE_3">option 3</option>
                                                <option value="METHODE_4">option 4</option>
                                                <option value="METHODE_5">option 5</option>
                                            </select>
                                        </div>
                                        <div class="row" style="margin-right:-10% !important; margin-left:17% !important;">
                                            <svg>
                                                <line x1="0" y1="0" x2="200" y2="200" style="stroke:rgb(120,120,120);stroke-width:3.5" />
                                                <g id="g_input_method" font-size="12" transform="translate(5)">
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="arrow_box ">
                                            <h6 class="heading-secondaryRootCauseArrow">line</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row" style="margin-right: 10% !important; margin-left: 17% !important;">
                                            <svg>
                                                <line x1="0 " y1="150 " x2="150 " y2="0 " style="stroke:rgb(120,120,120);stroke-width:3.5 " />
                                                <g id="g_input_material" font-size="12" transform="translate(10) ">
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="feature-box-bottom">
                                            <strong>MATERIAL : </strong>
                                            <select class="form-control form-control-sm multiple-checkboxes" multiple="multiple" id="input_material" name="input_material" position="bottom">
                                                <option value="MATERIAL_1">option 1</option>
                                                <option value="MATERIAL_2">option 2</option>
                                                <option value="MATERIAL_3">option 3</option>
                                                <option value="MATERIAL_4">option 4</option>
                                                <option value="MATERIAL_5">option 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row" style="margin-right: 10% !important; margin-left: 17% !important;">
                                            <svg>
                                                <line x1="0 " y1="150 " x2="150 " y2="0 " style="stroke:rgb(120,120,120);stroke-width:3.5 " />
                                                <g id="g_input_machine" font-size="12" transform="translate(10) ">
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="feature-box-bottom ">
                                            <strong>MACHINE : </strong>
                                            <select class="form-control form-control-sm multiple-checkboxes" multiple="multiple" id="input_machine" name="input_machine" position="bottom">
                                                <option value="MACHINE_1">option 1</option>
                                                <option value="MACHINE_2">option 2</option>
                                                <option value="MACHINE_3">option 3</option>
                                                <option value="MACHINE_4">option 4</option>
                                                <option value="MACHINE_5">option 5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Eof Fish bone diagram -->
                            <div class="separator">DOMINOS EFFECT IN ACCIDENT</div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <div class="feature-box-heading">
                                        <strong>BASIC CAUSE</strong>
                                    </div>
                                    <form id="bcRadio">
                                        <input type="radio" name="input_bc" value="1" /> <strong>No or Lake Of Procedure</strong><br />
                                        <input type="radio" name="input_bc" value="2" /> <strong>No or Lake Of Tools</strong><br />
                                        <input type="radio" name="input_bc" value="3" /> <strong>No or Lake Of Awareness</strong><br />
                                        <input type="radio" name="input_bc" value="4" /> <strong>No or Lake Of Obidience</strong><br />
                                        <input type="radio" name="input_bc" value="5" /> <strong>No Of Cooperation</strong><br />
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <div class="feature-box-heading">
                                        <strong>IN DERECT CAUSE</strong>
                                    </div>
                                    <form id="idcRadio">
                                        <input type="radio" name="input_idc" value="1" /> <strong>Work </strong><br />
                                        <input type="radio" name="input_idc" value="2" /> <strong>Personal Factor</strong><br />
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <div class="feature-box-heading">
                                        <strong>DERECT CAUSE</strong>
                                    </div>
                                    <form id="dcRadio">
                                        <input type="radio" name="input_dc" value="1" /> <strong>Unsafe </strong><br />
                                        <input type="radio" name="input_dc" value="2" /> <strong>Unsafe Condition</strong><br />
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <div class="feature-box-heading">
                                        <strong>LOSES</strong>
                                    </div>
                                    <form id="losesRadio">
                                        <input type="radio" name="input_loses" value="1" /> <strong>Human</strong><br />
                                        <input type="radio" name="input_loses" value="2" /> <strong>Machine</strong><br />
                                        <input type="radio" name="input_loses" value="3" /> <strong>Material</strong><br />
                                        <input type="radio" name="input_loses" value="4" /> <strong>Environment</strong><br />
                                    </form>
                                </div>
                            </div>
                            <div class="separator">PREVENTIVE AND CORECTIVE ACTION</div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">ACTION :</label>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea></div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div"><label for="input_person_responsibility" class="col-form-label" style="text-align:right">PERSON RESPONSIBILITY :</label></div>
                                    <div class="short-div"><label for="input_time_target" class="col-form-label" style="text-align:right">TIME TARGET :</label></div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div">
                                        <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                        <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                    </div>
                                </div>
                            </div>
                            <div class="separator">UPLOAD PHOTO</div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" style="text-align:right">SELECT PHOTO :</label>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div">
                                        <input type="file" name="accident_photo" />
                                    </div>
                                </div>
                            </div>

                            <div class="separator">INVESTIGATION TEAM</div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">LEAD INVESTIGATOR :</label>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT"></div>
                            </div>
                            <div class="container-invMember">
                                <div class="form-group row rowInvMember">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">MEMBER INVESTIGATOR :</label>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT"></div>
                                    <div class="col-lg-1">
                                        <a class="btn btn-sm btn-primary btnAddInvMember"><small>Add</small></a>
                                    </div>
                                </div>
                            </div>
                            <!-- end form -->
                            <div class="separator"></div>
                            <!-- <br> -->
                        </div>
                        <!--Button-->
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary float-right btnSaveToPdf" style="margin-left: 20px;">SAVE and DOWNLOAD PDF</button>
                            <button type="button" class="btn btn-success float-right btnSaveOnly" style="margin-left: 20px;">SAVE ONLY</button>
                            <button type="button" class="btn btn-warning float-right btnResetForm">RESET</button>
                        </div>
                        <!--/.Button-->
                        <!-- /.card-body -->
                    </form>
                    <!--/.form-->
                </div>
                <!--/.INPUT DATA PERSONAL MCU-->

                <!--PERSONAL MCU RECORD-->
                <div class="tab-pane fade " id="tabel-data-activity" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                    <div class="card-body" style="background-color: #ff000054;">
                        <div class="form-grup row mb-2 col-12">
                            <label for="input" class="col-form-label col-2" style="text-align:right">MCU PERIOD :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                            </div>
                        </div>
                        <div class="form-grup row mb-2 col-12">
                            <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS NIK :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                            </div>

                            <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS DEPARTEMENT :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                            </div>
                        </div>
                        <div class="form-grup row mb-4 col-12">
                            <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS NAME :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                            </div>

                            <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS AGE :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                            </div>
                        </div>


                        <div class="card" style="background-color: white;">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered-sm ">
                                    <thead class="align-middle">
                                        <tr class="table-danger align-middle" style="text-align: center;">
                                            <th scope="col">NO.</th>
                                            <th scope="col">NAME</th>
                                            <th scope="col">DEPARTEMENT</th>
                                            <th scope="col">AGE</th>
                                            <th scope="col">ADDRESS</th>
                                            <th scope="col">HEALTH STATUS</th>
                                            <th scope="col">IDENTIFIED DISEASE</th>
                                            <th scope="col">DOCTOR NOTE</th>
                                            <th scope="col">TOOLS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                                <a class="btn btn-xs btn-secondary">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                                <a class="btn btn-xs btn-primary">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a class="btn btn-xs btn-success">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                                <a class="btn btn-xs btn-secondary">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                                <a class="btn btn-xs btn-primary">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a class="btn btn-xs btn-success">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                                <a class="btn btn-xs btn-secondary">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                                <a class="btn btn-xs btn-primary">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a class="btn btn-xs btn-success">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">??</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">??</a></li>
                                </ul>
                            </div>
                        </div>

                        <button class="btn btn-danger mr-2 col-2">DOWNLOAD TO PDF</button>

                    </div>
                </div>
                <!--/.PERSONAL MCU RECORD-->
            </div>
            <!--/.TAB CONTENT-->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="<?= base_url('assets/templates') ?>/js/bootstrap-multiselect.js"></script>
<script>
    $(document).ready(function() {

        $('.container-invMember').on('click', '.btnAddInvMember:last-child', function() {
            let copylast = $(this).parents('.rowInvMember')[0].outerHTML;
            $(this)
                .parents('.rowInvMember:last-child')
                .after(copylast);

            console.log(copylast);
        });
        $('.multiple-checkboxes').multiselect({
            includeSelectAllOption: true,
        });

        $('.multiple-checkboxes').on('change', function() {
            let elementId = $(this).attr('name');
            let position = $(this).attr('position');
            let x = ``;
            let y = ``;
            let x_range = ``;
            let y_range = ``;
            if (position == 'top') {
                x = 15;
                y = 15;
                x_range = 55;
                y_range = 55;
            } else {
                x = 15;
                y = 140;
                x_range = 55;
                y_range = 55;
            }

            const selected = document.querySelectorAll('.multiple-checkboxes#' + elementId + ' option:checked');
            const dataSelect = Array.from(selected).map(el => el.value);
            console.log(dataSelect.length);
            let html = ``;
            if (dataSelect.length > 0) {
                if (dataSelect.length > 3) {
                    x_range = x_range - 25;
                    y_range = y_range - 25;
                }
                $.each(dataSelect, function(i, value) {
                    html += `<text y="${x}px" x="${y}px" letter-spacing=".5px" text-anchor="bottom" style="font-weight: bold;">${value}</text>`;
                    if (position == 'top') {
                        x += x_range;
                        y += y_range;
                        console.log(x);
                        console.log(y);
                    } else {
                        x += x_range;
                        y -= y_range;
                    }
                });
                $('#g_' + elementId).html(html);
            } else {
                $('#g_' + elementId).html(html);
            }
        });

        $("#linesTop").fadeIn(1000);
        $("#arrow").fadeIn(1500);
        $("#linesBottom").fadeIn(2000);

        $(function() {
            $(".diradd").click(function(event) {
                event.preventDefault();
                $(this)
                    .next(".diraddform")
                    .slideToggle(500);
            });
        });


        $('.btnResetForm').click(function() {
            $(':input', '#formInvestigationFire')
                .not(':button, :submit, :reset, :hidden')
                .val('')
                .removeAttr('checked')
                .removeAttr('selected');

            document.getElementById('formInvestigationFire').reset();
            $(".multiple-checkboxes option:selected").removeAttr("selected");
        });

    });
</script>