<style type="text/css">
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 22px !important; border-radius: 0 !important; padding-left: 0 !important;}
    .input-group-addon .glyphicon{font-size: 12px;}

    .show{
        display : block;
        z-index: 100;
        background-image : url('../../backend/images/timeloader.gif');
        opacity : 0.6;
        background-repeat : no-repeat;
        background-position : center;
    }
    /* .tab-pane{min-height: 200px;}*/
    .commentForm .input-group {position: relative;display: block;border-collapse: separate;}
    .commentForm .input-group-addon{
        position: absolute;
        right: 26px;
        top: 0px;
        z-index: 3;
    }
    .relative{position: relative;}
    .commentForm .input-group-addon i,
    .commentForm .input-group-addon span{padding-left: 13px;}
    .commentForm .relative label.text-danger{position: absolute; bottom: 5px;}
    .addbtnright{ position: absolute;right: 0;top: -46px;}

    @media(max-width:767px){
        .timeresponsive{overflow-x: auto;     overflow-y: hidden;}
        .timeresponsive .dropdown-menu{z-index: 1060;    bottom: 0 !important; height: 250px; padding: 20px;}
        .tablewidthRS{width: 690px;}
    }
</style>
<script src="<?php echo base_url(); ?>backend/custom/jquery.validate.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-mortar-board"></i> <?php echo $this->lang->line('academics'); ?> <small><?php echo $this->lang->line('student_fees1'); ?></small></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <form action="<?php echo site_url('admin/timetable/create') ?>" method="post" accept-charset="utf-8">
                        <div class="box-body">

                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('class'); ?><small class="req"> *</small></label>
                                        <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
foreach ($classlist as $class) {
    ?>
                                                <option value="<?php echo $class['id'] ?>" <?php
if (set_value('class_id') == $class['id']) {
        echo "selected=selected";
    }
    ?>><?php echo $class['class'] ?></option>
                                                        <?php
}
?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('section'); ?><small class="req"> *</small></label>
                                        <select  id="section_id" name="section_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('') . " Grupo " . $this->lang->line(''); ?><small class="req"> *</small></label>
                                        <select  id="subject_group_id" name="subject_group_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('subject_group_id'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right btn-sm"><?php echo $this->lang->line('search'); ?></button>



                        </div>








                    </form>

                    <?php
if (isset($getDaysnameList)) {
    ?>
                                <SCRIPT Language="JavaScript">
                                alert("AGREGAR UNA CLASE A LA VEZ PARA EVITAR ERRORES!!!");
                                document.write('<IMG SRC=""/>');
                            </SCRIPT>
                        <div class="box-header ptbnull"></div>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" id="myTabs">
                                <?php
$count = 1;

    foreach ($getDaysnameList as $days_key => $days_value) {
        $cls = "";
        if ($count == 1) {
        }
        ?>
                                    <li <?php echo $cls; ?>><a href="#tab_<?php echo $count; ?>" data-c="<?php echo set_value('class_id'); ?>" data-days="<?php echo $days_value; ?>" data-s="<?php echo set_value('section_id'); ?>" data-group="<?php echo set_value('subject_group_id'); ?>" data-day="<?php echo $days_key; ?>" data-toggle="tab" aria-expanded="true"><?php echo $days_value; ?></a></li>

                                    <?php
$count++;
    }
    ?>
                            </ul>
                            <div class="tab-content">
                                <?php
$count = 1;
    foreach ($getDaysnameList as $days_key => $days_value) {
        $cls = "class='tab-pane'";
        if ($count == 1) {

        }
        ?>
                                    <div <?php echo $cls; ?> id="tab_<?php echo $count; ?>">
                                    </div>

                                    <?php
$count++;
    }
    ?>

                            </div>
                        </div>
                    </div>
                    <?php
}
?>
                </section>
            </div>
            <script type="text/javascript">
                $(document).on('focus', '.time', function () {
                    var $this = $(this);
                    $this.datetimepicker({
                        format: 'LT'
                    });
                });
                var tot_count = 0;
                var class_id = $('#class_id').val();
                var section_id = '<?php echo set_value('section_id') ?>';
                var subject_group_id = '<?php echo set_value('subject_group_id') ?>';
                $(document).ready(function () {

                    $('#myTabs a:first').tab('show') // Select first tab
                    getSectionByClass(class_id, section_id);
                    getGroupByClassandSection(class_id, section_id, subject_group_id);

                    $(document).on('change', '#class_id', function (e) {
                        $('#section_id').html("");
                        var class_id = $(this).val();
                        var base_url = '<?php echo base_url() ?>';
                        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

                        $.ajax({
                            type: "GET",
                            url: base_url + "sections/getByClass",
                            data: {'class_id': class_id},
                            dataType: "json",
                            success: function (data) {
                                $.each(data, function (i, obj)
                                {
                                    div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
                                });

                                $('#section_id').append(div_data);
                            }
                        });
                    });

                    $(document).on('change', '#section_id', function (e) {
                        $('#subject_group_id').html("");
                        var section_id = $(this).val();
                        var class_id = $('#class_id').val();
                        var base_url = '<?php echo base_url() ?>';
                        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
                        $.ajax({
                            type: "POST",
                            url: base_url + "admin/subjectgroup/getGroupByClassandSection",
                            data: {'class_id': class_id, 'section_id': section_id},
                            dataType: "json",
                            success: function (data) {
                                $.each(data, function (i, obj)
                                {
                                    div_data += "<option value=" + obj.subject_group_id + ">" + obj.name + "</option>";
                                });

                                $('#subject_group_id').append(div_data);
                            }
                        });
                    });
                });

                function getSectionByClass(class_id, section_id) {
                    if (class_id != "" && section_id != "") {
                        $('#section_id').html("");
                        var base_url = '<?php echo base_url() ?>';
                        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

                        $.ajax({
                            type: "GET",
                            url: base_url + "sections/getByClass",
                            data: {'class_id': class_id},
                            dataType: "json",
                            success: function (data) {
                                $.each(data, function (i, obj)
                                {
                                    var sel = "";
                                    if (section_id == obj.section_id) {
                                        sel = "selected";
                                    }
                                    div_data += "<option value=" + obj.section_id + " " + sel + ">" + obj.section + "</option>";
                                });
                                $('#section_id').append(div_data);
                            }
                        });
                    }
                }


                function getGroupByClassandSection(class_id, section_id, subject_group_id) {
                    if (class_id != "" && section_id != "" && subject_group_id != "") {
                        $('#subject_group_id').html("");

                        var base_url = '<?php echo base_url() ?>';
                        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
                        $.ajax({
                            type: "POST",
                            url: base_url + "admin/subjectgroup/getGroupByClassandSection",
                            data: {'class_id': class_id, 'section_id': section_id},
                            dataType: "json",
                            success: function (data) {
                                console.log(subject_group_id);
                                $.each(data, function (i, obj)
                                {
                                    var sel = "";
                                    if (subject_group_id == obj.subject_group_id) {
                                        sel = "selected";
                                    }
                                    div_data += "<option value=" + obj.subject_group_id + " " + sel + ">" + obj.name + "</option>";
                                });

                                $('#subject_group_id').append(div_data);
                            }
                        });
                    }
                }

                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

                    var target = $(e.target).attr("href"); // activated tab
                    var target_id = $(e.target).attr("id"); // activated tab
                    var ajax_data = $(e.target).data(); // activated tab
                    $(target).html("");
                    getGroupdata(target, target_id, ajax_data);
                })

                function getGroupdata(target, target_id, ajax_data) {

                    $.ajax({
                        type: 'POST',
                        url: base_url + "admin/timetable/getBydategroupclasssection",
                        data: {'day': ajax_data.day, 'class_id': ajax_data.c, 'section_id': ajax_data.s, 'subject_group_id': ajax_data.group},
                        dataType: 'json',
                        beforeSend: function () {
                            $(target).addClass('show');
                        },
                        success: function (data) {
                            $(target).html(data.html);

                            $('.staff', target).select2({
                                dropdownAutoWidth: true,
                                width: '100%'
                            });
                            $('.subject', target).select2({
                                dropdownAutoWidth: true,
                                width: '100%'
                            });
                            tot_count = data.total_count + 1;
                        },
                        error: function (xhr) { // if error occured

                        },
                        complete: function () {
                            $(target).removeClass('show');
                        }
                    });
                }


                $(document).ready(function () {
                    var counter = 0;

                    $(document).on("click", ".addrow", function () {

                        var newRow = $("<tr>");
                        var cols = "";
                        cols += '<td class="relative"><input type="hidden" name="total_row[]" value="' + tot_count + '"><input type="hidden" name="prev_id_' + tot_count + '" value="0"><select class="form-control subject" id="subject_id_' + tot_count + '" name="subject_' + tot_count + '">' + $("#subject_dropdown").text() + '</select></td>';



                        cols += '<td class="relative"><select class="form-control staff" id="staff_id_' + tot_count + '" name="staff_' + tot_count + '">' + $("#staff_dropdown").text() + '</select></td>';

                       

                        cols += '<td class="relative"><select class="form-control time_from time" id="time_from_' + tot_count + '" name="time_from_' + tot_count + '">' + $("#timefrom_dropdown").text() + '</select></td>';

                


                         cols += '<td class="relative"><select class="form-control time_to time" id="time_to_' + tot_count + '" name="time_to_' + tot_count + '">' + $("#timeto_dropdown").text() + '</select></td>';



                         cols += '<td class="relative"><select class="form-control room_no" id="room_no_' + tot_count + '" name="room_no_' + tot_count + '">' + $("#room_dropdown").text() + '</select></td>';








                        cols += '<td class="text-right"><button type="button" class="ibtnDel btn btn-danger btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>';
                        newRow.append(cols);

                        $("table.order-list").append(newRow);


                        $('.staff', newRow).select2({
                            dropdownAutoWidth: true,
                            width: '100%'
                        });

                        $('.subject', newRow).select2({
                            dropdownAutoWidth: true,
                            width: '100%'
                        });
                        tot_count++;
                    });

                    $(document).on("click", ".ibtnDel", function (event) {
                          if($(this).closest('tr').prev('input').val()){
                          if (confirm('<?php echo $this->lang->line("are_you_sure_you_want_to_delete"); ?>')) {
                          $(this).closest("tr").remove();
                            counter -= 1
                             }
                    return false;

                }else{
                      $(this).closest("tr").remove();
                            counter -= 1
                }
                    });

                    $(document).on('click', '.submit_subject_group', function () {
                        var form_id = $(this).closest("form").attr('id');
                        var target = $('.nav-tabs .active a').attr("href"); // activated tab
                        var target_id = $('.nav-tabs .active a').attr("id"); // activated tab
                        var ajax_data = $('.nav-tabs .active a').data(); // activated tab

                    });
                });
            </script>





<?php//estaff dropdown igual pero para los rooms?>

            <script type="text/template" id="staff_dropdown">
                <option value=""><?php echo $this->lang->line('select') ?></option>
                <?php
foreach ($staff as $staff_key => $staff_value) {
    ?>
                    <option value="<?php echo $staff_value['id']; ?>"><?php echo $staff_value['name'] . " " . $staff_value['surname'] . " (" . $staff_value['employee_id'] . ")"; ?></option>
                    <?php
}
?>
            </script>


            <script type="text/template" id="room_dropdown">
                <option value=""><?php echo $this->lang->line('select') ?></option>
                <?php
 {
    ?>
                                
                                <option value="B1">B1   </option>
                                <option value="B1(2)">B1(2)</option>
                                <option value="B1(3)">B1(3)</option>
                                <option value="B1, L BIOTEC">B1, L BIOTEC</option>
                                <option value="B1, L BIOTEC(2)">B1, L BIOTEC(2)</option>
                                <option value="B1, L BIOTEC(3)">B1, L BIOTEC(3)</option>
                                <option value="B1, L CAT">B1, L CAT</option>
                                <option value="B1, L CER">B1, L CER</option>
                                <option value="B1, L INFI">B1, L INFI</option>
                                <option value="B1, LAB ALIM">B1, LAB ALIM</option>
                                <option value="B1, LAB ALIM(2)">B1, LAB ALIM(2)</option>
                                <option value="B1, LAB ALIM(3)">B1, LAB ALIM(3)</option>
                                <option value="B1, LFIS">B1, LFIS</option>
                                <option value="B1, LFIS(2)">B1, LFIS(2)</option>
                                <option value="B1, LFIS(3)">B1, LFIS(3)</option>
                                <option value="B2">B2   </option>
                                
                                <option value="B2(2)">B2(2)</option>
                                <option value="B2(3)">B2(3)</option>
                                <option value="B2, LAB MET">B2, LAB MET</option>
                                <option value="B2, LAB MICRO">B2, LAB MICRO</option>
                                <option value="B2, LALIM">B2, LALIM</option>
                                <option value="B2, LPG">B2, LPG</option>
                                
                                <option value="B3">B3</option>
                                <option value="B3(2)">B3(2)</option>
                                <option value="B3(3)">B3(3)</option>
                                <option value="B3(4)">B3(4)</option>
                                 <option value="B3 L BIOTEC">B3 L BIOTEC</option>
                                <option value="B3, L BIOTEC">B3, L BIOTEC</option>
                                <option value="B3, L CER">B3, L CER</option>
                                <option value="B3, L FIS">B3, L FIS</option>
                                <option value="B3, LAB ALIM">B3, LAB ALIM</option>
                                <option value="B3, LAB INF">B3, LAB INF</option>
                                <option value="B3, LAB INF(2)">B3, LAB INF(2)</option>
                                <option value="B3, LAB INF(3)">B3, LAB INF(3)</option>
                                <option value="B3, LAB MET">B3, LAB MET</option>
                                <option value="B3, LAB MICRO">B3, LAB MICRO</option>
                                <option value="B3, LAB MICRO(2)">B3, LAB MICRO(2)</option>
                                <option value="B3, LAB MICRO(3)">B3, LAB MICRO(3)</option>
                                <option value="B3, LALIM">B3, LALIM</option>
                                <option value="B3, LBIOTEC">B3, LBIOTEC</option>
                                <option value="B3, LFIS">B3, LFIS</option>
                                <option value="B4">B4</option>
                                <option value="B4(2)">B4(2)</option>
                                <option value="B4(3)">B4(3)</option>
                                <option value="B4, L BIOTEC">B4, L BIOTEC</option>
                                <option value="B4, L BIOTEC(2)">B4, L BIOTEC(2)</option>
                                <option value="B4, LAB FIS">B4, LAB FIS</option>
                                <option value="B5">B5   </option>
                                <option value="B5(2)">B5(2)</option>
                                <option value="B5(3)">B5(3)</option>
                                <option value="B5, LAB 1">B5, LAB 1</option>
                                <option value="B5, LAB 1(2)">B5, LAB 1(2)</option>
                                <option value="B5, LAB 1(3)">B5, LAB 1(3)</option>
                                <option value="B5, LINF">B5, LINF</option>
                                <option value="B5, LMICRO">B5, LMICRO</option>
                                <option value="B5, LPMEC">B5, LPMEC</option>
                                <option value="G1">G1</option>
                                <option value="G1(2)">G1(2)</option>
                                <option value="G1(3)">G1(3)</option>
                                <option value="G1, CER">G1, CER</option>
                                <option value="G1, LAB BIOQ">G1, LAB BIOQ</option>
                                <option value="G1, LAB BLIOQ">G1, LAB BLIOQ</option>
                                <option value="G1, LAB BQ">G1, LAB BQ</option>
                                <option value="G1, LPG">G1, LPG</option>
                                <option value="G2">G2</option>
                                <option value="G2(2)">G2(2)</option>
                                <option value="G2(3)">G2(3)</option>
                                <option value="G2, L CER">G2, L CER</option>
                                <option value="G2, L MET">G2, L MET</option>
                                <option value="G2, LAB INF">G2, LAB INF</option>
                                <option value="G2, LAB MET">G2, LAB MET</option>
                                <option value="G2, LBIOTEC">G2, LBIOTEC</option>
                                <option value="G2, LBIOTEC(2)">G2, LBIOTEC(2)</option>
                                <option value="G2, LBIOTEC(3)">G2, LBIOTEC(3)</option>
                                <option value="G2, LPMEC">G2, LPMEC</option>
                                <option value="J1">J1</option>
                                <option value="J1, L BIOTEC">J1, L BIOTEC</option>
                                <option value="J1, L FIS">J1, L FIS</option>
                                <option value="J1, LAB INF">J1, LAB INF</option>
                                <option value="J1, LPG">J1, LPG</option>
                                <option value="J2">J2</option>
                                <option value="J2(2)">J2(2)</option>
                                <option value="J2(3)">J2(3)</option>
                                <option value="J2(4)">J2(4)</option>
                                <option value="J2, L BIOTEC">J2, L BIOTEC</option>
                                <option value="J2, LABI ">J2, LABI</option>
                                <option value="J2., L BIOTEC">J2., L BIOTEC</option>
                                <option value="J3">J3</option>
                                <option value="L CER, B3">L CER, B3</option>
                                <option value="L CER, G1">L CER, G1</option>
                                <option value="L CAT">L CAT</option>
                                <option value="L CAT, M3">L CAT, M3</option>
                                <option value="L CAT, B1">L CAT, B1</option>
                                <option value="L FIS, J1">L FIS, J1</option>
                                <option value="L FIS, N1">L FIS, N1</option>
                                <option value="L FIS, N1(2)">L FIS, N1(2)</option>
                                <option value="L FIS, J3">L FIS, J3</option>
                                <option value="L INF">L INF</option>
                                <option value="L INF(2)">L INF(2)</option>
                                <option value="L INF, B2">L INF, B2</option>
                                <option value="L INF, J1">L INF, J1</option>
                                <option value="L INF, J3">L INF, J3</option>
                                <option value="L INF, M2">L INF, M2</option>
                                <option value="LAB INF">LAB INF   </option>
                                <option value="LAB INF(2)">LAB INF(2)   </option>
                                <option value="LAB ALIM">LAB ALIM</option>
                                <option value="LAB ALIM, B4">   LAB ALIM, B4</option>
                                <option value="LAB ALIM, M2">LAB ALIM, M2   </option>
                                <option value="LAB ALIM, M3">LAB ALIM, M3   </option>
                                <option value="LAB ALIM, M5">LAB ALIM, M5</option>
                                <option value="LAB ALIM, N3">LAB ALIM, N3</option>
                                <option value="LAB ALIM, N4">LAB ALIM, N4</option>
                                <option value="LAB BIOQ, B1">   LAB BIOQ, B1</option>
                                <option value="LAB BIOQ, B2(2)">   LAB BIOQ, B2(2)</option>
                                <option value="LAB BIOQ, B2">   LAB BIOQ, B2</option>
                                <option value="LAB BIOQ, G2">LAB BIOQ, G2</option>
                                <option value="LAB BIOQ, G2(2)">LAB BIOQ, G2(2)</option>
                                <option value="LAB BIOQ, J2">   LAB BIOQ, J2</option>
                                <option value="LAB BIOQ, M1">LAB BIOQ, M1</option>
                                <option value="LAB BIOQ, M2">LAB BIOQ, M2</option>
                                <option value="LAB BIOQ, M4">LAB BIOQ, M4</option>
                                <option value="LAB BIOQ, M6">LAB BIOQ, M6</option>
                                <option value="LAB BIOQ, N1">LAB BIOQ, N1</option>
                                <option value="LAB BIOQ, N1(2)">LAB BIOQ, N1(2)</option>
                                <option value="LAB BIOQ, N3">LAB BIOQ, N3</option>
                                <option value="LAB BIOTEC, B1">LAB BIOTEC, B1</option>
                                <option value="LAB BIOTEC, G1">LAB BIOTEC, G1</option>
                                <option value="LAB BIOTEC, G1(2)">LAB BIOTEC, G1(2)</option>
                                <option value="LAB BIOTEC, G1(3)">LAB BIOTEC, G1(3)</option>
                                <option value="LAB BIOTEC, G2">LAB BIOTEC, G2</option>
                                <option value="LAB BIOTEC, N2">LAB BIOTEC, N2</option>
                                <option value="LAB FIS">LAB FIS</option>
                                <option value="LAB FIS, N4">LAB FIS, N4</option>
                                <option value="LAB FIS, M2">LAB FIS, M2</option>
                                <option value="LAB LPG, M1">    LAB LPG, M1</option>
                                <option value="LAB MICRO">LAB MICRO</option>
                                <option value="LAB MICRO, B4">LAB MICRO, B4</option>
                                <option value="LAB MICRO, M1">LAB MICRO, M1</option>
                                <option value="LAB MICRO, M1(2)">LAB MICRO, M1(2)</option>
                                <option value="LAB MICRO, M3">LAB MICRO, M3</option>
                                <option value="LAB MICRO, M5">LAB MICRO, M5</option>
                                <option value="LAB MICRO, M5(2)">LAB MICRO, M5(2)</option>
                                <option value="LAB MICRO1, M4">LAB MICRO1, M4</option>
                                <option value="LAB PG, B5">LAB PG, B5</option>
                                <option value="LAB PG, B5(2)">LAB PG, B5(2)</option>
                                <option value="LAB, BIOQ">LAB, BIOQ </option>
                                <option value="LALIM, M3">LALIM, M3</option>
                                <option value="LBIOQ, M7">LBIOQ, M7</option>
                                <option value="LMET">LMET</option>
                                <option value="LMET 2">LMET 2</option>
                                <option value="LMICRO, B5">LMICRO, B5</option>
                                <option value="LMICRO, G2"> LMICRO, G2</option>
                                <option value="LMICRO, N3"> LMICRO, N3</option>
                                <option value="LMICRO, N3(2)"> LMICRO, N3(2)</option>
                                <option value="LMICRO, N3(3)"> LMICRO, N3(3)</option>
                                <option value="LPG">LPG</option>
                                <option value="LPG, G1">LPG, G1</option>
                                <option value="LPG, J1">LPG, J1</option>
                                <option value="LPG, J2">LPG, J2</option>
                                <option value="LPG, J3">LPG, J3</option>
                                <option value="LPG, M3">LPG, M3</option>
                                <option value="LPG, N2">LPG, N2</option>+
                                <option value="M1">M1</option>
                                <option value="M1(2)">M1(2)</option>
                                <option value="M1(3)">M1(3)</option>
                                <option value="M1, L FIS">M1, L FIS</option>
                                <option value="M1, L.FIS">M1, L.FIS</option>
                                <option value="M1, LAB BLOQ">M1, LAB BLOQ</option>
                                <option value="M1, LAB INF">    M1, LAB INF</option>
                                <option value="M1, LAB MICRO">M1, LAB MICRO</option>
                                <option value="M1, LAB MICRO(2)">M1, LAB MICRO(2)</option>
                                <option value="M1, LAB MICRO(3)">M1, LAB MICRO(3)</option>
                                <option value="M2">M2</option>
                                <option value="M2, LAB BIOQ">M2, LAB BIOQ</option>
                                <option value="M2, LAB INF">    M2, LAB INF</option>
                                <option value="M2, LMICRO"> M2, LMICRO</option>
                                <option value="M3">M3</option>
                                <option value="M3(2)">M3(2)</option>
                                <option value="M3(3)">M3(3)</option>
                                <option value="M3, L BIOTEC">M3, L BIOTEC</option>
                                <option value="M3, L BIOTEC(2)">M3, L BIOTEC(2)</option>
                                <option value="M3, L BIOTEC(3)">M3, L BIOTEC(3)</option>
                                <option value="M3, LCER">M3, LCER</option>
                                <option value="M3, LPG">M3, LPG</option>
                                <option value="M4">M4</option>
                                <option value="M4(2)">M4(2)</option>
                                <option value="M4(3)">M4(3)</option>
                                <option value="M4, L FIS">M4, L FIS</option>
                                <option value="M4, LAB ALIM">M4, LAB ALIM   </option>
                                <option value="M4, LAB FIS">M4, LAB FIS</option>
                                <option value="M4, LI">M4, LI   </option>
                                <option value="M5">M5</option>
                                <option value="M5, LAB INF">M5, LAB INF</option>
                                <option value="M5, LCER">M5, LCER</option>
                                <option value="M5, LFIS">M5, LFIS</option>
                                <option value="M6">M6</option>
                                <option value="M6, L BIOTEC">M6, L BIOTEC</option>
                                <option value="M6, L BIOTEC(2)">M6, L BIOTEC(2)</option>
                                <option value="M6, L BIOTEC(3)">M6, L BIOTEC(3)</option>
                                <option value="M6, PMEC">M6, PMEC   </option>
                                <option value="M7">M7</option>
                                <option value="M7, L.INF">M7, L.INF</option>
                                <option value="M7, LAB INF">M7, LAB INF</option>
                                <option value="M7, LMET">M7, LMET</option>
                                <option value="N1">N1</option>
                                <option value="N1(2)">N1(2)</option>
                                <option value="N1(3)">N1(3)</option>
                                <option value="N1, L CAT">N1, L CAT</option>

                                <option value="N1, LPG">N1, LPG</option>
                                <option value="N2">N2</option>
                                <option value="N2(2)">N2(2)</option>
                                <option value="N2(3)">N2(3)</option>
                                <option value="N2, L BIOTEC">N2, L BIOTEC</option>
                                <option value="N2, LAB BLOQ">N2, LAB BLOQ</option>
                                <option value="N2, LAB MICRO">N2, LAB MICRO</option>
                                <option value="N2, LBIOQ">N2, LBIOQ</option>
                                <option value="N2, LMEC">N2, LMEC</option>
                                <option value="N3">N3</option>
                                <option value="N3(2)">N3(2)</option>
                                <option value="N3(3)">N3(3)</option>
                                <option value="N3, L CAT">N3, L CAT</option>
                                <option value="N3, LAB BIOQ">N3, LAB BIOQ</option>
                                <option value="N3, LAB BIOQ(2)">N3, LAB BIOQ(2)</option>
                                <option value="N3, LBIOQ">N3, LBIOQ</option>
                                <option value="N4">N4</option>
                                <option value="N4, L CAT">N4, L CAT</option>
                                <option value="N4, LAB ALIM">N4, LAB ALIM</option>
                                <option value="N4, LAB MICRO">N4, LAB MICRO</option>
                                <option value="N4, L BIOTEC">N4, L BIOTEC</option>
                                <option value="N4, L BIOTEC(2)">N4, L BIOTEC(2)</option>
                                <option value="N4, L BIOTEC(3)">N4, L BIOTEC(3)</option>
                                <option value="P CAMPO, J1">    P CAMPO, J1</option>
                                <option value="P CAMPO, M2">P CAMPO, M2</option>
                                <option value="PMEC, M6">PMEC, M6</option>
                                <option value="PUAALI, J3">PUAALI, J3</option>
                                <option value="PUAALI, J1">PUAALI, J1</option>
                                <option value="PUAALI, M1">PUAALI M1</option>
                                <option value="PUAALI, N4">PUAALI N4</option>
                                <option value="Salon sin asignar">Salon sin asignar</option>
                                <option value="SIN ASIGNAR">SIN ASIGNAR</option>
                                <option value="SIN ASIGNAR(2)">SIN ASIGNAR(2)</option>
                                <option value="SIN ASIGNAR(3)">SIN ASIGNAR(3)</option>
                                

                    <?php
}
?>
            </script>


<script type="text/template" id="timeto_dropdown">
                <option value=""><?php echo $this->lang->line('select') ?></option>
                <?php
 {
    ?>
                                                                
                              
                                <option value="7:00 AM">7:00 AM</option>
                                <option value="8:00 AM">8:00 AM</option>
                                <option value="9:00 AM">9:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="12:00 PM">12:00 PM</option>
                                <option value="1:00 PM">1:00 PM</option>
                                <option value="2:00 PM">2:00 PM</option>
                                <option value="3:00 PM">3:00 PM</option>
                                <option value="4:00 PM">4:00 PM</option>
                                <option value="5:00 PM">5:00 PM</option>
                                <option value="6:00 PM">6:00 PM</option>
                                <option value="7:00 PM">7:00 PM</option>
                                <option value="8:00 PM">8:00 PM</option>
                                <option value="9:00 PM">9:00 PM</option>
                                <option value="10:00 PM">10:00 PM</option>
                                <option value="11:00 PM">11:00 PM</option>


                    <?php
}
?>
            </script>
<script type="text/template" id="timefrom_dropdown">
                <option value=""><?php echo $this->lang->line('select') ?></option>
                <?php
 {
    ?>
                                                                  
                                <option value="7:00 AM">7:00 AM</option>
                                <option value="8:00 AM">8:00 AM</option>
                                <option value="9:00 AM">9:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="12:00 PM">12:00 PM</option>
                                <option value="1:00 PM">1:00 PM</option>
                                <option value="2:00 PM">2:00 PM</option>
                                <option value="3:00 PM">3:00 PM</option>
                                <option value="4:00 PM">4:00 PM</option>
                                <option value="5:00 PM">5:00 PM</option>
                                <option value="6:00 PM">6:00 PM</option>
                                <option value="7:00 PM">7:00 PM</option>
                                <option value="8:00 PM">8:00 PM</option>
                                <option value="9:00 PM">9:00 PM</option>
                                <option value="10:00 PM">10:00 PM</option>
                                <option value="11:00 PM">11:00 PM</option>


                    <?php
}
?>
            </script>

            <script type="text/template" id="subject_dropdown">
                <option value=""><?php echo $this->lang->line('select') ?></option>
                <?php
foreach ($subject as $subject_key => $subject_value) {
    if ($subject_value->code !== '') {
        $sub_name = $subject_value->name . " (" . $subject_value->code . ")";
    } else {
        $sub_name = $subject_value->name;
    }
    ?>
                    <option value="<?php echo $subject_value->id; ?>" ><?php echo $sub_name; ?></option>
                    <?php
}
?>
            </script>