function CheckCoupon()
{
    let coupon=document.getElementById("coupon").value.trim();
    let response=document.getElementById("couponresponse");
    let xhttp=new XMLHttpRequest();

    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200)
        {
            response.innerHTML=this.responseText;
        }
        else
        {
            document.getElementById("couponresponse").innerHTML=this.status;
        }
    }

    xhttp.open("POST", "../../../Controller/CheckCoupon.php", true);
    xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhttp.send("coupon=" +encodeURIComponent(coupon));
}
