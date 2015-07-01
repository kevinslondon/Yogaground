@foreach ($errors->all() as $error)
    <p class="red">{{ $error }}</p>
@endforeach


<?php if(!$isFormCorrect ) : ?>
<h1>Form for <?php echo $workshop['name'] ?> </h1>
<form id="form1" name="form1" method="post" action=""><fieldset><legend>About You</legend>
        <table border="0" cellspacing="0" cellpadding="5">
            <tr>
                <td valign="top" <?php echo ContentClass::e($f,'name')?> >Name</td>
                <td><input name="name" type="text" size="80" value="<?php echo ContentClass::f('name')?>" /></td>
            </tr>
            <tr>
                <td valign="top" <?php echo ContentClass::e($f,'email')?> >Email</td>
                <td><input name="email" type="text" size="80" value="<?php echo ContentClass::f('email')?>" /></td>
            </tr>
            <tr>
                <td valign="top" <?php echo ContentClass::e($f,'address')?> >Address</td>
                <td><textarea name="address" cols="65" rows="3"><?php echo ContentClass::f('address')?></textarea></td>
            </tr>
            <tr>
                <td valign="top" <?php echo ContentClass::e($f,'phone')?>>Phone</td>
                <td><input name="phone" type="text" size="30" value="<?php echo ContentClass::f('phone')?>" /></td>
            </tr>
            <tr>
                <td valign="top" <?php echo ContentClass::e($f,'age')?> >Age</td>
                <td><label>
                        <input type="text" name="age" value="<?php echo ContentClass::f('age')?>" />
                    </label></td>
            </tr>
        </table>

    </fieldset>
    <br />

    <fieldset>
        <legend>Medical</legend>
        <table border="0" cellspacing="0" cellpadding="5">
            <tr>
                <td width="300" valign="top" <?php echo ContentClass::e($f,'medical_yes_no')?> >Do you have any medical conditions?</td>
                <td width="80" valign="top">
                    <label>
                        <input type="radio" name="medical_yes_no" value="yes" <?php echo ContentClass::c('medical_yes_no', 'yes')?>>
                        Yes</label>
                    <label> <br />
                        <input type="radio" name="medical_yes_no" value="no" <?php echo ContentClass::c('medical_yes_no', 'no')?>>
                        No</label>
                    <br>
                    <label></label></td>
                <td valign="top"><textarea name="medical_details" cols="30" rows="4" id="medical_details"><?php echo ContentClass::f('medical_details')?></textarea></td>
            </tr>
            <tr>
                <td valign="top" <?php echo ContentClass::e($f,'surgery_yes_no')?>>Have you recently had surgery?</td>
                <td valign="top">
                    <label>
                        <input type="radio" name="surgery_yes_no" value="yes" <?php echo ContentClass::c('surgery_yes_no', 'yes')?>>
                        Yes</label>
                    <label> <br />
                        <input type="radio" name="surgery_yes_no" value="no" <?php echo ContentClass::c('surgery_yes_no', 'no')?>>
                        No</label>
                    <br>
                    <label></label></td>
                <td valign="top"><textarea name="surgery_details" cols="30" rows="4" id="surgery_details"><?php echo ContentClass::f('medical_details')?></textarea></td>
            </tr>
            <tr>
                <td valign="top" <?php echo ContentClass::e($f,'injury_yes_no')?>> Do you have any injuries?</td>
                <td valign="top">
                    <label>
                        <input type="radio" name="injury_yes_no" value="yes" <?php echo ContentClass::c('injury_yes_no', 'yes')?>>
                        Yes</label>
                    <label> <br />
                        <input type="radio" name="injury_yes_no" value="no" <?php echo ContentClass::c('injury_yes_no', 'no')?> >
                        No</label>
                    <br>
                    <label></label></td>
                <td valign="top"><textarea name="injury_details" cols="30" rows="4" id="injury_details"><?php echo ContentClass::f('medical_details')?></textarea></td>
            </tr>
            <tr>
                <td valign="top">Have you practised yoga before?</td>
                <td valign="top">
                    <label>
                        <input type="radio" name="practiced_yes_no" value="yes" <?php echo ContentClass::c('practiced_yes_no', 'yes')?>>
                        Yes</label>
                    <label> <br />
                        <input type="radio" name="practiced_yes_no" value="no" <?php echo ContentClass::c('practiced_yes_no', 'no')?>>
                        No</label>
                    <br>
                    <label></label></td>
                <td valign="top"><textarea name="practiced_details" cols="30" rows="4" id="practiced_details"><?php echo ContentClass::f('practiced_details')?></textarea></td>
            </tr>
            <tr>
                <td valign="top" <?php echo ContentClass::e($f,'adjust_yes_no')?> >During the yoga class I may come round  and gently adjust you to a better yoga position, do you have any  objection to being touched by me?</td>
                <td valign="top">
                    <label>
                        <input type="radio" name="adjust_yes_no" value="yes" <?php echo ContentClass::c('adjust_yes_no', 'yes')?>>
                        Yes</label>
                    <label> <br />
                        <input type="radio" name="adjust_yes_no" value="no" <?php echo ContentClass::c('adjust_yes_no', 'no')?>>
                        No</label>
                    <br>
                    <label></label></td>
                <td valign="top"><textarea name="adjust_details" cols="30" rows="4" id="adjust_details"><?php echo ContentClass::f('adjust_details')?></textarea></td>
            </tr>
            <tr>
                <td valign="top">Is there anything else I should know,  that may affect your yoga practice?</td>
                <td valign="top">
                    <label>
                        <input type="radio" name="anything_else_yes_no" value="yes" <?php echo ContentClass::c('anything_else_yes_no', 'yes')?>>
                        Yes</label>
                    <label> <br />
                        <input type="radio" name="anything_else_yes_no" value="no" <?php echo ContentClass::c('anything_else_yes_no', 'no')?>>
                        No</label>
                    <br>
                    <label></label></td>
                <td valign="top"><textarea name="anything_else_details" cols="30" rows="4" id="anything_else_details"><?php echo ContentClass::f('anything_else_details')?></textarea></td>
            </tr>
        </table>
    </fieldset>
    <br />
    <fieldset>
        <legend>What do you want to gain from the class ?</legend>
        <table border="0" cellspacing="0" cellpadding="5">
            <tr>
                <td valign="top">Tick all that apply </td>
                <td><label>
                        <input name="Strength" type="checkbox" id="Strength" value="Strength" <?php echo ContentClass::c('Strength', 'Strength')?> />
                    </label>
                    Strength<br />
                    <label>
                        <input type="checkbox" name="Flexiblity" value="Flexiblity" <?php echo ContentClass::c('Flexiblity', 'Flexiblity')?> />
                        Flexiblity </label>
                    <br />
                    <label>
                        <input type="checkbox" name="Relaxation" value="Relaxation" <?php echo ContentClass::c('Relaxation', 'Relaxation')?> />
                        Relaxation           </label>
                    <br />
                    <label>
                        <input type="checkbox" name="Philosophy" value="Philosophy" <?php echo ContentClass::c('Philosophy', 'Philosophy')?> />
                        Philosophy of yoga </label>
                    <br />
                    <label>
                        <input type="checkbox" name="Mediation" value="Mediation" <?php echo ContentClass::c('Mediation', 'Mediation')?> />
                        Meditation</label>
                    <br>
                    <label>
                        <input type="checkbox" name="Concentration" value="Concentration" <?php echo ContentClass::c('Concentration', 'Concentration')?> />
                        Improved Concentration</label>
                    <br>
                    <label>
                        <input type="checkbox" name="vitality" value="vitality" <?php echo ContentClass::c('vitality', 'vitality')?> />
                        Better vitality<br>
                        <input type="checkbox" name="Other_reason" value="Other_reason" <?php echo ContentClass::c('Other_reason', 'Other_reason')?> />
                        Other (please give details down below)</label>
                    <label>         </label>
                    <br />
                    <label></label></td>
            </tr>
            <tr>
                <td valign="top">&nbsp;</td>
                <td><label>
                        <textarea name="other_reason_details" cols="55" rows="5"></textarea>
                    </label></td>
            </tr>
            <tr>
                <td valign="top">&nbsp;</td>
                <td><input type="submit" name="Submit" value="Submit" /></td>
            </tr>
        </table>
    </fieldset>
    <br />
</form>
<?php endif; ?>