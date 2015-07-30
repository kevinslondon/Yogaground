@extends('layouts.master')


@section('content')
    <p class="red">
    @foreach ($errors->all() as $error)
        {{ $error }} <br />
    @endforeach
    </p>


    <h1>Apply for {{$page_workshop->name}} </h1>
    <form id="form1" name="form1" method="post" action="">
        <fieldset class="apply_form" >
            <legend>About You</legend>
            <table border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td valign="top" {!!error_class(
                    'name', $errors) !!} >Name</td>
                    <td><input name="name" type="text" size="70" value="{{old('name')}}"/></td>
                </tr>
                <tr>
                    <td valign="top" {!!error_class(
                    'email', $errors) !!} >Email</td>
                    <td><input name="email" type="text" size="70" value="{{old('email')}}"/></td>
                </tr>
                <tr>
                    <td valign="top" {!!error_class(
                    'address', $errors) !!} >Address</td>
                    <td><textarea name="address" cols="65" rows="3">{{old('address')}}</textarea></td>
                </tr>
                <tr>
                    <td valign="top" {!!error_class(
                    'phone', $errors) !!}>Phone</td>
                    <td><input name="phone" type="text" size="30" value="{{old('phone')}}"/></td>
                </tr>
                <tr>
                    <td valign="top" {!!error_class(
                    'age', $errors) !!} >Age</td>
                    <td><label>
                            <input type="text" name="age" value="{{old('age')}}"/>
                        </label></td>
                </tr>
            </table>

        </fieldset>
        <br/>

        <fieldset class="apply_form">
            <legend>Medical</legend>
            <table border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td width="300" valign="top" {!!error_class(
                    'medical_yes_no', $errors) !!} >Do you have any medical conditions?</td>
                    <td width="80" valign="top">
                        <label>
                            <input type="radio" name="medical_yes_no" value="yes" {!!ticked('medical_yes_no', 'yes')!!}>
                            Yes</label>
                        <label> <br/>
                            <input type="radio" name="medical_yes_no" value="no" {!!ticked('medical_yes_no', 'no')!!}>
                            No</label>
                        <br>
                        <label></label></td>
                    <td valign="top"><textarea name="medical_details" cols="30" rows="4"
                                               id="medical_details">{{old('medical_details')}}</textarea></td>
                </tr>
                <tr>
                    <td valign="top" {!!error_class(
                    'surgery_yes_no', $errors) !!}>Have you recently had surgery?</td>
                    <td valign="top">
                        <label>
                            <input type="radio" name="surgery_yes_no" value="yes" {!!ticked('surgery_yes_no', 'yes')!!}>
                            Yes</label>
                        <label> <br/>
                            <input type="radio" name="surgery_yes_no" value="no" {!!ticked('surgery_yes_no', 'no')!!}>
                            No</label>
                        <br>
                        <label></label></td>
                    <td valign="top"><textarea name="surgery_details" cols="30" rows="4"
                                               id="surgery_details">{{old('surgery_details')}}</textarea></td>
                </tr>
                <tr>
                    <td valign="top" {!!error_class(
                    'injury_yes_no', $errors) !!}> Do you have any injuries?</td>
                    <td valign="top">
                        <label>
                            <input type="radio" name="injury_yes_no" value="yes" {!!ticked('injury_yes_no', 'yes')!!}>
                            Yes</label>
                        <label> <br/>
                            <input type="radio" name="injury_yes_no" value="no" {!!ticked('injury_yes_no', 'no')!!} >
                            No</label>
                        <br>
                        <label></label></td>
                    <td valign="top"><textarea name="injury_details" cols="30" rows="4"
                                               id="injury_details">{{old('injury_details')}}</textarea></td>
                </tr>
                <tr>
                    <td valign="top">Have you practised yoga before?</td>
                    <td valign="top">
                        <label>
                            <input type="radio" name="practiced_yes_no" value="yes" {!!ticked('practiced_yes_no',
                            'yes')!!} >
                            Yes</label>
                        <label> <br/>
                            <input type="radio" name="practiced_yes_no" value="no" {!!ticked('practiced_yes_no',
                            'no')!!} >
                            No</label>
                        <br>
                        <label></label></td>
                    <td valign="top"><textarea name="practiced_details" cols="30" rows="4"
                                               id="practiced_details">{{old('practiced_details')}}</textarea>
                    </td>
                </tr>
                <tr>
                    <td valign="top" {!!error_class(
                    'adjust_yes_no', $errors) !!} >During the yoga class I may come round and gently adjust you to a
                    better yoga position, do you have any objection to being touched by me?</td>
                    <td valign="top">
                        <label>
                            <input type="radio" name="adjust_yes_no" value="yes" {!!ticked('adjust_yes_no', 'yes')!!} >
                            Yes</label>
                        <label> <br/>
                            <input type="radio" name="adjust_yes_no" value="no" {!!ticked('adjust_yes_no', 'no')!!} >
                            No</label>
                        <br>
                        <label></label></td>
                    <td valign="top"><textarea name="adjust_details" cols="30" rows="4"
                                               id="adjust_details">{{old('adjust_details')}}</textarea></td>
                </tr>
                <tr>
                    <td valign="top">Is there anything else I should know, that may affect your yoga practice?</td>
                    <td valign="top">
                        <label>
                            <input type="radio" name="anything_else_yes_no" value="yes" {!!ticked('anything_else_yes_no',
                            'yes')!!} >
                            Yes</label>
                        <label> <br/>
                            <input type="radio" name="anything_else_yes_no" value="no" {!!ticked('anything_else_yes_no',
                            'no')!!} >
                            No</label>
                        <br>
                        <label></label></td>
                    <td valign="top"><textarea name="anything_else_details" cols="30" rows="4"
                                               id="anything_else_details">{{old('adjust_details')}}</textarea>
                    </td>
                </tr>
            </table>
        </fieldset>
        <br/>
        <fieldset class="apply_form">
            <legend>What do you want to gain from the class ?</legend>
            <table border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td valign="top">Tick all that apply</td>
                    <td><label>
                            <input name="Strength" type="checkbox" id="Strength" value="Strength" {!!ticked('Strength',
                            'Strength')!!} />
                        </label>
                        Strength<br/>
                        <label>
                            <input type="checkbox" name="Flexiblity" value="Flexiblity" {!!ticked('Flexiblity',
                            'Flexiblity')!!} />
                            Flexiblity </label>
                        <br/>
                        <label>
                            <input type="checkbox" name="Relaxation" value="Relaxation" {!!ticked('Relaxation',
                            'Relaxation')!!} />
                            Relaxation </label>
                        <br/>
                        <label>
                            <input type="checkbox" name="Philosophy" value="Philosophy" {!!ticked('Philosophy',
                            'Philosophy')!!} />
                            Philosophy of yoga </label>
                        <br/>
                        <label>
                            <input type="checkbox" name="Meditation" value="Meditation" {!!ticked('Meditation',
                            'Meditation')!!} />
                            Meditation</label>
                        <br>
                        <label>
                            <input type="checkbox" name="Concentration"
                                   value="Concentration" {!!ticked('Concentration', 'Concentration')!!} />
                            Improved Concentration</label>
                        <br>
                        <label>
                            <input type="checkbox" name="vitality" value="vitality" {!!ticked('vitality', 'vitality')!!}
                            />
                            Better vitality<br>
                            <input type="checkbox" name="Other_reason" value="Other_reason" {!!ticked('Other_reason',
                            'Other_reason')!!} />
                            Other (please give details down below)</label>
                    </td>
                </tr>
                <tr>
                    <td valign="top">&nbsp;</td>
                    <td><label>
                            <textarea name="other_reason_details" cols="55"
                                      rows="5">{{old('other_reason_details')}}</textarea>
                        </label></td>
                </tr>
                <tr>
                    <td valign="top">&nbsp;</td>
                    <td><input type="submit" name="Submit" value="Submit"/></td>
                </tr>
            </table>
        </fieldset>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

    </form>

@endsection
