
var username=document.getElementById('username').value;
function createHabit(x)
{
    var newDiv=document.createElement("div");
    newDiv.className="goals";
    var goalName=document.createElement("div");
    goalName.className="goalHeader";
    goalName.innerHTML=x;
    var but=document.createElement("button");
    but.className="cancleButton";
    but.innerHTML="X";
    but.setAttribute("onmouseover",'deleteGoal(this)');
    newDiv.appendChild(goalName);
    newDiv.appendChild(but);
    newDiv.setAttribute("onclick","gotoCalendar(this)");
    document.getElementById("panels").appendChild(newDiv);
}
function loadhome()
{
    $.ajax({
        type: "post",
        url: "gethabits.php",
        data: {username:username},
        success: function (data) {
            data=JSON.parse(data);
            $.each(data,function(key,value){
                createHabit(value.habit);
            });
        }
    });
}
function createGoal()
{
    var x=document.getElementById("newGoal").value;
    console.log(x);
    $.ajax({
        type: "post",
        url: "storehabit.php",
        data: {habit:x,username:username},
        success: function (response) {
            if(response=='1')
            {
                createHabit(x);
            }
        }
    });
}

function deleteGoal(id)
{
    var pele=id.parentNode;
    var c=pele.childNodes;
    var habit=c[0].innerHTML;
    if(confirm("do you want to delete"+habit+" log")){
        $.ajax({
            type: "post",
            url: "deletehabit.php",
            data: {habit:habit,username:username},
            success: function (response) {
                if(response=='1')
                {
                    var pan=document.getElementById("panels");
                    pan.removeChild(pele);
                }
            }
        });
    }
    else return;
}

function gotoCalendar(id)
{
    var c=id.childNodes;
    var habit=c[0].innerHTML; 
    $.ajax({
        type: "post",
        url: "gotocal.php",
        data: {habit:habit,username:username},
        success: function (data) {
            window.location.replace("../calendar/calendar.php");
        }
    });

}

function logout()
{
   $.ajax({
       type: "post",
       url: "logout.php",
       success: function (response) {
        window.location.replace("../login-signup/login.php");
       }
   }); 
}