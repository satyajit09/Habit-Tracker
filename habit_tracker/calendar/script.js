
var months=[ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var username=document.getElementById('username').value;
var habit=document.getElementById('habit').value;
var d=new Date();
var month=d.getMonth();
var year=d.getFullYear();
var data;
var successPercentage;
function fillTable(month)
{   
    var month_no= month.toString();
    var colour;
    $.ajax({
        type:"POST",
        url:"setget.php",
        data:{month_no:month_no,habit:habit,username:username},

        success:function (data) 
        {
            colour=data;
            var tbl=document.getElementById("tbl");
            let date = 1;
            var totalDays = 32 - (new Date(year, month, 32)).getDate();
            var firstDay=(new Date(year,month)).getDay();

            for (let i = 0; i < 6; i++) {
                // creates a table row
                let row = document.createElement("tr");

                //creating individual cells, filing them up with data.
                for (let j = 0; j < 7; j++) {
                    if (i == 0 && j < firstDay) {
                        cell = document.createElement("td");
                        cellText = document.createTextNode("");
                        cell.appendChild(cellText);
                        cell.id=7*i+j;
                        if(colour.charAt(7*i+j).toString()==='0') {cell.style.backgroundColor="#2a8f9f";}
                        row.appendChild(cell);
                    }
                    else if (date > totalDays) {
                        cell = document.createElement("td");
                        cellText = document.createTextNode("");
                        cell.appendChild(cellText);
                        cell.id=7*i+j;
                        if(colour.charAt(7*i+j).toString()==='0') {cell.style.backgroundColor="#2a8f9f";}
                        row.appendChild(cell);  
                    }

                    else {
                        cell = document.createElement("td");
                        cellText = document.createTextNode(date);
                        cell.appendChild(cellText);
                        cell.id=7*i+j;
                        if(colour.charAt(7*i+j).toString()==='0') {cell.style.backgroundColor="#2a8f9f";}
                        row.appendChild(cell);
                        date++;
                    }
                }

                var c=row.childNodes;
                c.forEach(element => {element.setAttribute("onclick",'changeColor(this)')});
                tbl.appendChild(row); // appending each row into calendar body.
            }

        }
    });
    document.getElementById("month").innerHTML=String(months[month])+" "+String(year);
}

fillTable(month);
function clearTable()
{
    var tbl=document.getElementById("tbl");
    for(var i=0;i<6;i++)tbl.deleteRow(1);

}

function prev()
{
    clearTable();
    if(month==0)year--;
    month=(--month+12)%12;
    fillTable(month);
}

function next()
{
    clearTable();
    year=year+Math.floor((month+1)/12)
    month=(month+1)%12;
    fillTable(month);
}

function changeColor(c)
{
    var cell_id=c.id;
    var month_no= month.toString();
    $.ajax({
        type:"POST",
        url:"colorchange.php",
        data:{id:cell_id, month_no:month_no,habit:habit,username:username},
        success:function (data) 
        {
            if(data=='1')c.style.backgroundColor="#e9c46a";
            else c.style.backgroundColor="#2a8f9f";
        }  
    });
}
function goback()
{
    window.location.replace("../homepage");
}
function getdata(){
    var totalDays = 32 - (new Date(year, month, 32)).getDate();
    var firstDay=(new Date(year,month)).getDay();
    var month_no= month.toString();
    var sp;
    $.ajax({
        type: "post",
        url: "getdata.php",
        data: {month_no:month_no,habit:habit,username:username},
        success: function (resp) {
            var progress=[];
            var days=[];
            for(var i=1;i<=totalDays;i++)
            {
                progress.push(resp.charAt(firstDay+i-1)=='0'?1:0);
                days.push(i);
            }
            for(var i=1;i<totalDays;i++)
            {
                progress[i]=progress[i]+progress[i-1];
            }
            var ctx1=document.getElementById("mychart");
            var mychart= new Chart(ctx1,{
                type:'line',
                data:{
                    labels:days,
                    datasets:[
                        {
                            data:progress,
                            label:"Progress",
                            borderColor:"#ae55cd",
                            fill:false
                        }
                    ]
                }
            });
            var ctx2=document.getElementById("donut");
            var donut=new Chart(ctx2,{
                type:'doughnut',
                data:{
                    labels:['Success','Failure'],
                    datasets:[
                        {
                            data:[progress[totalDays-1],totalDays-progress[totalDays-1]],
                            backgroundColor:['#ffbe0b','#8338ec']
                        }
                    ]
                },
                options:{
                    title:{
                        text:"SUCCESS RATIO",
                        fontColor:'orange',
                        display:true
                    }
                }
            });
        }
    });
}
var toggle=0;
document.getElementById("graphs").style.display='none';
//getdata();
function showGraph()
{
    if(toggle==0)
    {
        getdata()
        document.getElementById("graphs").style.display='block';
        toggle=1;
    }
    else{
        document.getElementById("graphs").style.display='none';
        toggle=0;  
    }
}

function mailstats()
{
    
    console.log("hello");
    var canvas=document.getElementById('mychart');
    var dataURL = canvas.toDataURL();
    
    console.log(dataURL);
    $.ajax({
        type: "POST",
        url: "sendmail.php",
        data: {username:username,dataURL:dataURL},
        success: function (response) {
            console.log(response);
        }
    });

}
