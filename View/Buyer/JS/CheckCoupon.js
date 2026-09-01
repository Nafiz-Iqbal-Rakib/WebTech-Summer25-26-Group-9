function CheckCoupon()
{
    let coupon=document.getElementById("coupon").value.trim();

    let xhttp=new XMLHttpRequest();

    xhttp.onreadystatechange=function()
    {
        if(this.readyState==4 && this.status==200)
        {
            document.getElementById("couponresponse").innerHTML=this.responseText;
        }
    };

    xhttp.open(
        "POST",
        "../../../Controller/CheckCoupon.php",
        true
    );

    xhttp.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
    );

    xhttp.send("coupon="+encodeURIComponent(coupon));
}
