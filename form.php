<html>
<head></head>
<body onload="preFill()">
<form name="ProfileForm" onsubmit="return CheckInputs();" action="https://demo.emarsys.net/u/register.php" method=get>
<input type=hidden name="CID" value="210036400"><input type=hidden name="SID" value=""><input type=hidden name="UID" value=""><input type=hidden name="f" value="100001915"><input type=hidden name="p" value="2"><input type=hidden name="a" value="ccs"><input type=hidden name="el" value=""><input type=hidden name="endlink" value=""><input type=hidden name="llid" value=""><input type=hidden name="c" value=""><input type=hidden name="counted" value=""><input type=hidden name="RID" value="100000032"><input type=hidden name="mailnow" value="">First Name:<input type=text maxlength=255 name="inp_1" value=""><br>
Last Name:<input type=text maxlength=255 name="inp_2" value=""><br>
E-Mail:<input type=text maxlength=255 name="inp_3" value=""><br>
mobile phone number:<input type=text maxlength=255 name="inp_100002593" value=""><br>
Mobile SMS Opt-In:<select name="inp_100002609" size=1><option value=""> </option><option value="1">True</option><option value="2">False</option></select><br>
Mobile:<input type=text maxlength=255 name="inp_37" value=""><br>
*Subject:<input type=text name="subject" maxlength=100><br>
*Message:<textarea name="msg" wrap=virtual></textarea><br>
<input type=button onclick="javascript:MailIt()" name="submit1" value="Contact"></form>
<script language="javascript">
<!--
function onbeforesubmit()
{
return true;
}
//-->
</script>
<script language="javascript">
<!--
	var error;
var form_lanuage = 'en';
function is_3_valid(input)
{
	if(input == "")
	{
		error += "E-Mail: missing data!\n";
		return false;
	}

	return true;
}

function CheckInputs()
{
	var check_ok = true;
	error = "Wrong input!\n";
	check_ok = (is_3_valid(document.ProfileForm.inp_3.value) && check_ok);
	if(check_ok == false)
		alert(error);
	return check_ok;
}
//-->
</script>


<script language="javascript">
function SubmitIt(){
                if(CheckInputs() == true){
                                if(window.onbeforesubmit)
                                                onbeforesubmit();
                                document.ProfileForm.submit();
                }
}

function MailIt(){
                if(CheckInputs()){
                                if((document.ProfileForm.subject.value=='') || (document.ProfileForm.msg.value==''))
                                                alert('Bitte f\u00fcr Sie die Nachrichtenfelder aus!');
                                else
                                                document.ProfileForm.submit();
    }
}

function FieldWithName(frm, fieldname, numofield)
{
    if(!numofield)
        numofield = 0;
    field_count = 0;
    for(i = 0; i < frm.elements.length; ++i)
    {
        if(frm.elements[i].name == fieldname)
        {
            if(field_count == numofield)
                return frm.elements[i];
            else
                field_count++;
        }
    }
}
function NumChecked(frm, fieldname)
{
		var count = 0;
		for(i = 0; i < frm.elements.length; ++i)
		{
				if(frm.elements[i].name == fieldname && frm.elements[i].checked == true)
						++count;
		}
		return count;
}
function NumSel(field)
{
    var count = 0;
    for(i = 0; i < field.length; ++i)
        if(field[i].selected == true) ++count;
    return count;
}
</script>

<script language="javascript">
var multiFields = new Array();
var dateFields = new Array();
multiFields["interest[]"] = "interest"
multiFields["optin"] = "optin"
var arr_interest = new Array();
arr_interest["I like 2 shoes"] = "1";
arr_interest["Bags"] = "2";
arr_interest["Coats"] = "3";
</script>
<script language="javascript" src="https://demo.emarsys.net/u/nprefill.js" type="text/javascript"></script>
</body>
</html>
