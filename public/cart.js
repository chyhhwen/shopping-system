const shop = {
    list: {},
    add: function (ID, Name, Price, Amount,Max_Amount)
    {
        if (this.list.hasOwnProperty(ID))
        {
            this.list[ID]["Amount"] = parseInt(this.list[ID]["Amount"]) + parseInt(Amount);
        }
        else
        {
            shop.init(ID, Name, Price, Amount,Max_Amount);
        }
    },
    init: function (ID, Name, Price, Amount,Max_Amount, overwrite = true)
    {
        if (overwrite) this.list[ID] = {"Name": Name, "Price": Price, "Amount": Amount,"Max_Amount":Max_Amount};
    },
    del: function (ID)
    {
        delete this.list[ID];
        var url = "order.php?del=1&token=" + ID;
        location.href=url;
    },
    total: () =>
    {
        let price = 0;
        Object.entries(shop.list).forEach(([key, value]) =>
        {
            price += (parseInt(value["Price"]) * parseInt(value["Amount"]));
        });
        return price;
    },
};

/**
 * 物品刪除
 * @param key
 */
delItem = (key) =>
{
    shop.del(key);
    details();
}

/**
 * 呼叫資料
 * @param ItemID
 */
callItem = (ItemID) =>
{

}
/**
 * 新增物品
 * @param e1 物品名稱
 * @param e2 物品價錢
 * @param e3 物品ID
 */
addItem = (e1, e2, e3) =>
{
    let inputname_el = document.querySelector(e1);
    let inputname = inputname_el.value;
    let inputprice_el = document.querySelector(e2);
    let inputprice = inputprice_el.value;
    shop.add(e3,inputname,inputprice,1);
    alert('新增成功');
}
set = (s) =>
{
    document.querySelector("#one").style = "color: black";
    document.querySelector("#three").style = "color: black";
    document.querySelector("#four").style = "color: black";
    document.querySelector("#five").style = "color: black";
    document.querySelector(s).style = "color: #bb5a3a;";
}
curret = () =>
{
    set('#five');
    var view="";
    view += "<div id=title><h2>"+ list[4] +"</h2>";
    view += "</div><div id=item>";
    view += "<h2>訂單已完成</h2></div>";
    document.getElementById('list').innerHTML = view;
}
usepay = () =>
{
    set('#four');
    var view="";
    var input_id = ['name','card','access'];
    view += "<div id=title><h2>"+ list[3] +"</h2></div>";
    view += "<form action=deliver.php method=POST>";
    for(var i=0;i<3;i++)
    {
        view += "<div id=input>";
        view += "<h2>"+ pay[i] +"</h2>";
        view += "<input type=text name="+ input_id[i] + "></div>";
    }
    view += "<div id=input>";
    view += "<input type=submit value=確認></div>";
    view += "</form>";
    document.getElementById('list').innerHTML = view;
}
check = () =>
{
    set('#three');
    var view="";
    view += "<div id=title><h2>"+ list[2] +"</h2></div>";
    Object.entries(shop.list).forEach(([key, value]) =>
    {

        view += "<div id=item>";
        view += "<h2>書名:"+value["Name"]+" ";
        view +=" 數量:"+ value["Amount"];
        view += " 金額:$"+(value["Price"] * value["Amount"]) +"</h2></div>"
    });
    view += "<div id=item>";
    view += "<h2>總金額:";
    view += "  $" + shop.total() + "</h2></div>";
    view += "<div id=input>";
    view += "<input type=submit value=確認 ";
    view +=  "onclick=\"location.href=\'index.php?page=cart&stage=3\'\"></div>";
    document.getElementById('list').innerHTML = view;
}
upgrape = (bid) =>
{
    let amount_el = document.getElementById(bid);
    var choose_amoubt = parseInt(amount_el.selectedIndex) + 1;
    var url = "order.php?upgrape=1&bid=";
    url += bid;
    url += "&amount=";
    url += choose_amoubt;
    location.href=url;
}
details = () =>
{
    set('#one');
    var view="";
    view += "<div id=title><h2>"+ list[0] +"</h2></div>";
    Object.entries(shop.list).forEach(([key, value]) =>
    {

        view += "<div id=item>";
        view += "<div class=text><h2>書名:"+value["Name"]+" ";
        view += " 數量:";
        view += "<select name="+ value["Amount"] +" onblur=javascript:upgrape(\'"+ key +"\') id="+ key +" ";
        view +=" style=height:80%;font-size:90%;border:1px solid rgb(202, 201, 201);>";
        for(var i = 1;i<= parseInt(value["Max_Amount"]);i++)
        {
            if(i == parseInt(value["Amount"]))
            {
                view += "<option value="+ i +" selected>"+ i +"</option>";
            }
            else
            {
                view += "<option value="+ i +">"+ i +"</option>";
            }
        }
        view += "</select>";
        view += " 金額:$"+(value["Price"] * value["Amount"]) +"</h2></div>";
        view += "<div class=del><a href='javascript:delItem(\"" + key + "\")'><h2>X</h2></a></div></div>";
    });
    view += "<div id=input>";
    view += "<input type=submit value=確認 ";
    view +=  "onclick=\"location.href=\'index.php?page=cart&stage=2\'\"></div>";
    document.getElementById('list').innerHTML = view;
}
add = (max) =>
{
    let amount_el = document.querySelector("#amount");
    let amount = amount_el.value;
    if((parseInt(amount) + 1) > max)
    {
        alert("所需數量超出庫存");
    }
    else
    {
        amount_el.value = String(parseInt(amount) + 1);
    }
}

sub = () =>
{
    let amount_el = document.querySelector("#amount");
    let amount = amount_el.value;
    if((parseInt(amount) - 1) == 0)
    {
        alert("最低購買為1本");
    }
    else
    {
        amount_el.value = String(parseInt(amount) - 1);
    }
}