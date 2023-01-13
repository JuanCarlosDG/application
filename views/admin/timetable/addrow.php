<style type="text/css">
    .relative label.text-danger{position: absolute; left:5px; bottom:0;}
</style>
<div class="row clearfix">
    <div class="col-md-12 column">
        <a id="add_row" class="addrow addbtnright btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> <?php echo $this->lang->line('') . "Añadir Clase" . $this->lang->line(''); ?></a>
        <form method="POST" action="<?php echo site_url('admin/timetable/savetimetable'); ?>" id="form_<?php echo $day; ?>" class="commentForm autoscroll">
            <?php
//print_r($subject);
            ?>
            <input type="hidden" name="day" name="" value="<?php echo $day; ?>">
            <input type="hidden" name="class_id" name="" value="<?php echo $class_id; ?>">
            <input type="hidden" name="section_id" name="" value="<?php echo $section_id; ?>">
            <input type="hidden" name="subject_group_id" name="" value="<?php echo $subject_group_id; ?>">
            <div class="">   
                <table class="table table-bordered table-hover order-list tablewidthRS" id="tab_logic">
                    <thead>
                        <tr>

                            <th>
                                <?php echo $this->lang->line('subject') ?>
                            </th>
                            <th>
                                <?php echo $this->lang->line('teacher'); ?>
                            </th>
                            <th>
                                 <?php echo $this->lang->line('time') . " " . $this->lang->line('from') ?><small class="astrike"> *</small>
                            </th>
                            <th>
                                <?php echo $this->lang->line('time') . " " . $this->lang->line('to') ?><small class="astrike"> *</small>
                            </th>
                            <th>
                                <?php echo $this->lang->line('') . "Salon(es)" . $this->lang->line('') ?>
                            </th>
                            <th class="text-right">
                                <?php echo $this->lang->line('action') ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($prev_record)) {
                            $counter = 1;
                            foreach ($prev_record as $prev_rec_key => $prev_rec_value) {
                                ?>
                            <input type="hidden" name="prev_array[]" value="<?php echo $prev_rec_value->id; ?>">

                            <tr id='addr0'>

                                <td>
                                    <input type="hidden" name="total_row[]" value="<?php echo $counter; ?>">
                                    <input type="hidden" name="prev_id_<?php echo $counter; ?>" value="<?php echo $prev_rec_value->id; ?>">
                                    <select class="form-control subject" id="subject_id_<?php echo $counter; ?>" name="subject_<?php echo $counter; ?>">

                                        <option value=""><?php echo$this->lang->line('select') ?></option>
                                        <?php
                                        foreach ($subject as $subject_key => $subject_value) {
                                            ?>

                                            <option value="<?php echo $subject_value->id; ?>" <?php echo set_select('subject_' . $counter, $subject_value->id, ($prev_rec_value->subject_group_subject_id == $subject_value->id ) ? TRUE : FALSE ); ?> >
                                                <?php
                                                $sub_code = ($subject_value->code != "") ? " (" . $subject_value->code . ")" : "";
                                                echo $subject_value->name . $sub_code;
                                                ?>
                                                <?php ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>


<?php //cuadro de texto de los PROFESORES?>



                                <td>
                                    <select class="form-control staff" id="staff_id_<?php echo $counter; ?>" name="staff_<?php echo $counter; ?>">
                                        <option value=""><?php echo $this->lang->line('select') ?></option>
                                        <?php
                                        foreach ($staff as $staff_key => $staff_value) {
                                            ?>

                                            <option value="<?php echo $staff_value['id']; ?>" <?php echo set_select('staff_' . $counter, $staff_value['id'], ($prev_rec_value->staff_id == $staff_value['id'] ) ? TRUE : FALSE ); ?> ><?php echo $staff_value['name'] . " " . $staff_value['surname'] . " (" . $staff_value['employee_id'] . ")"; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>





<?php //HORA DE ?>

                                <td>
 



                             <select class="form-control time_from time" id="time_from_<?php echo $counter; ?>" name="time_from_<?php echo $counter; ?>">

                                
                          

                                <option value="<?php echo $prev_rec_value->time_from; ?> "selected><?php echo $prev_rec_value->time_from; ?> </option>

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
                           
                        </select>
              

                    </td>


<?php //HORA A?>



                               
<td>
 



                             <select class="form-control time_to time" id="time_to_<?php echo $counter; ?>" name="time_to_<?php echo $counter; ?>">

                                
                          

                                <option value="<?php echo $prev_rec_value->time_to; ?> "selected><?php echo $prev_rec_value->time_to; ?> </option>

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

                           
                        </select>
              

                    </td>










<?php //cuadro de texto de los salones?>






                                <td>
 



                             <select class="form-control room_no" id="room_no_<?php echo $counter; ?>" name="room_no_<?php echo $counter; ?>">

                                
                          

                                <option value="<?php echo $prev_rec_value->room_no; ?> "selected><?php echo $prev_rec_value->room_no; ?> </option>



                                
                                
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
                                <option value="B2, LAB MICRO(2)">B2, LAB MICRO(2)</option>
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
                                <option value="B5, LAB1">B5, LAB1</option>
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
                                <option value="LAB BIOQ, B2">   LAB BIOQ, B2</option>
                                <option value="LAB BIOQ, B2(2)">   LAB BIOQ, B2(2)</option>
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
                                <option value="PUAALI, N4">PUAALI, N4</option>
                                <option value="Salon sin asignar">Salon sin asignar</option>
                                <option value="SIN ASIGNAR">SIN ASIGNAR</option>
                                <option value="SIN ASIGNAR(2)">SIN ASIGNAR(2)</option>
                                <option value="SIN ASIGNAR(3)">SIN ASIGNAR(3)</option>
                                



                           
                        </select>
              

                    </td>

                    












                                                                                                    

                                <td class="text-right"><button class="ibtnDel btn btn-danger btn-sm btn-danger"> <i class="fa fa-trash"></i></button></td>

                            </tr>

                            <?php
                            $counter ++;
                        }
                    } else {
                        ?>

                        <tr id='addr0'>

                            <td class="relative">
                                <input type="hidden" name="total_row[]" value="<?php echo $total_count; ?>">
                                <input type="hidden" name="prev_id_<?php echo $total_count; ?>" value="0">
                                <select class="form-control subject" id="subject_id_<?php echo $total_count; ?>" name="subject_<?php echo $total_count; ?>">

                                    <option value=""><?php echo $this->lang->line('select') ?></option>
                                    <?php
                                    foreach ($subject as $subject_key => $subject_value) {
                                        ?>

                                        <option value="<?php echo $subject_value->id; ?>"><?php echo $subject_value->name . " (" . $subject_value->code . ")"; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                            <td class="relative">



                                <select class="form-control staff" id="staff_id_<?php echo $total_count; ?>" name="staff_<?php echo $total_count; ?>">
                                    <option value=""><?php echo $this->lang->line('select') ?></option>
                                    <?php
                                    foreach ($staff as $staff_key => $staff_value) {
                                        ?>

                                        <option value="<?php echo $staff_value['id']; ?>"><?php echo $staff_value['name'] . " " . $staff_value['surname'] . " (" . $staff_value['employee_id'] . ")"; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>




                            </td>


<?php//Hora de?>                            
                            <td>

                          





<select class="form-control time_from time" id="time_from_<?php echo $total_count; ?>" name="time_from_<?php echo $total_count; ?>">

                                
                          

                                <option value="<?php echo $prev_rec_value->time_from; ?> "selected><?php echo $prev_rec_value->time_from; ?> </option>

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
                           
                        </select>



  </td>







<?php//Hora a ?>

                            <td>

                            


                             <select class="form-control time_to time" id="time_to_<?php echo $total_count; ?>" name="time_to_<?php echo $total_count; ?>">

                                
                          

                                <option value="<?php echo $prev_rec_value->time_to; ?> "selected><?php echo $prev_rec_value->time_to; ?> </option>

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

                           
                        </select>

</td>



                            <td>


<?php//este es el cuadro de texto para salones?>



                          



<select class="form-control room_no" id="room_no_<?php echo $total_count; ?>" name="room_no_<?php echo $total_count; ?>">

                             
                          

                                <option value="<?php echo $prev_rec_value->room_no; ?> "selected><?php echo $prev_rec_value->room_no; ?> </option>
                                
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
                                <option value="B2, LAB MICRO(2)">B2, LAB MICRO(2)</option>
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
                                <option value="B5, LAB1">B5, LAB1</option>
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
                                <option value="PUAALI, N4">PUAALI, N4</option>
                                <option value="Salon sin asignar">Salon sin asignar</option>
                                <option value="SIN ASIGNAR">SIN ASIGNAR</option>
                                <option value="SIN ASIGNAR(2)">SIN ASIGNAR(2)</option>
                                <option value="SIN ASIGNAR(3)">SIN ASIGNAR(3)</option>
                                
                           
                        </select>
              







                            </td>













                            <td class="text-right"><button class="ibtnDel btn btn-danger btn-sm btn-danger"> <i class="fa fa-trash"></i> <?php echo $this->lang->line('').'Eliminar'; ?></button></td>

                        </tr>
                        <?php
                    }
                    ?>


                    </tbody>
                </table>
            </div>
            <?php if ($this->rbac->hasPrivilege('class_timetable', 'can_edit')) {
                ?>
                <button class="btn btn-primary btn-sm pull-right" type="submit"><i class="fa fa-save"></i> <?php echo $this->lang->line('').'Guardar'; ?></button>
            <?php }
            ?>


        </form>
    </div>
</div>
</div>

<script type="text/javascript">
    var form_id = "<?php echo $day ?>";
    $(function () {


        $('form#form_' + form_id).on('submit', function (event) {

            // adding rules for inputs with class 'comment'
            $('select[id^="subject_id_"]').each(function () {
                $(this).rules('add', {
                    required: true,
                    messages: {
                        required: "Required"
                    }
                });

            });           // adding rules for inputs with class 'comment'
            $('select[id^="staff_id_"]').each(function () {
                $(this).rules('add', {
                    required: true,
                    messages: {
                        required: "Required"
                    }
                });

            });


            $('input[id^="time_from_"]').each(function () {
                $(this).rules('add', {
                    required: true,
                    messages: {
                        required: "Required"
                    }
                });
            });


            $('input[id^="time_to_"]').each(function () {
                $(this).rules('add', {
                    required: true,
                    messages: {
                        required: "Required"
                    }
                });
            });

            $('select[id^="room_no_"]').each(function () {
                $(this).rules('add', {
                    required: true,
                    messages: {
                        required: "Required"
                    }
                });
            });




            // prevent default submit action         
            event.preventDefault();

            // test if form is valid 
            if ($('form#form_' + form_id).validate().form()) {
                var target = $('.nav-tabs .active a').attr("href");
                var target_id = $('.nav-tabs .active a').attr("id");
                var ajax_data = $('.nav-tabs .active a').data();

                $.ajax({
                    type: 'POST',
                    url: base_url + "admin/timetable/savegroup",
                    data: $('#form_' + form_id).serialize(),
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (data) {


                        $(target).html(data.html);
                        if (data.status == 1) {

                            successMsg(data.message);
                            $(target).html("");
                            getGroupdata(target, target_id, ajax_data);

                        } else {
                            var list = $('<ul/>');
                            $.each(data.error, function (key, value) {

                                if (value != "") {
                                    list.append(value);
                                }
                            });
                            errorMsg(list);
                        }
                    },
                    error: function (xhr) { // if error occured

                    },
                    complete: function () {

                    }
                });

            } else {
                console.log("does not validate");
            }
        });


        // initialize the validator
        $('form#form_' + form_id).validate({
            errorClass: 'text-danger'
        });




    });

</script>

